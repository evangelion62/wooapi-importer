<?php
/*
 * fonction qui importe les produit à partir d'un fichier csv et des associations CsvAssociate
 */
function productsImportStart(Csv $csv,array $csvAssociates,WC_API_Client $client) {
	/*
	 * on essai d'ouvrir le csv
	 */
	if ($file = fopen('web/csv/'.$csv->name(),'r')) 
	{
		ob_start();
		/*
		 * on parcoure le csv à importé
		 */
		$cmpt = 0;
		$imagesCmpt = 0;
		$resultTab = array();
		while (($ligne = fgetcsv($file,0,$csv->separateur(),'"')) && $cmpt < 1000){

			/*
			 * on prepar l'array product qui contient toutes les propriété du porduit
			 */
			$product = array('status' => 'draft',
						'enable_html_description'=>true);
			
			/*
			 * on ajout les propriéte produit
			* */
			foreach ($csvAssociates as $csvAssociate) {
				$attribute = explode('|', $csvAssociate->attribute());

				/*
				 * Products Properties
				*/
				if ($attribute[0] == 'Products Properties'){
					$key = $attribute[1];
					$value = $ligne[$csvAssociate->rowid()];
					if ($csvAssociate->type() == 'float'){
						$value = str_replace(',', '.', $value);
					}
					settype($value, $csvAssociate->type());
					$product[$key] = $value;
				}
				
				/*
				 * Images Properties
				 */
				if ($attribute[0] == 'Images Properties'){
					$key = $attribute[1];
					$value = $ligne[$csvAssociate->rowid()];
					
					if (NULL != $csvAssociate->opt() && $key == 'src'){
						$values = explode($csvAssociate->opt(), $value);
						foreach ($values as $index => $value) {
							$temp[$key] = $value;
							$temp['position']=$index;
							$product['images'][]=$temp;
						}
					}else {

						$temp[$key] = $value;
						$temp['position']=0;
						$product['images'][]=$temp;
					}
				}
				
				/*
				 * Dimensions Properties
				 */
				if ($attribute[0] == 'Dimensions Properties'){
					$key = $attribute[1];
					$value = $ligne[$csvAssociate->rowid()];
					$product['dimensions'][$key]=$value;
				}
			}
				
			//echo $cmpt;	
			//var_dump($product);
			/*
			 * si c'est un produit simple on créer le produit
			*/
			if (array_key_exists('type', $product) ){
				if (stristr($product['type'],'simple')){
					
					$result=$client->products->create($product);
					$result = json_decode($result->http->response->body);
					
					$resultTab[] = array(	'title'=> $result->product->title,
											'id'=> $result->product->id,
											'csvligne' => $cmpt
										);
 					
				}
			}else{
				$client->products->create($product);
			}
			
			$cmpt++;
		}
		
		var_dump( $resultTab);
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
	}
	else
	{
		return 'open file failed';
	}
}

function importation($importID,$bdd) {
	
	/*
	 * recuperation des entitée nessécaire à l'import
	 * */
	$importManager = new ImportManager($bdd);
	$csvManager = new CsvManager($bdd);
	$apiManager = new ApiManager($bdd);
	$csvAssociateManager = new CsvAssociateManager($bdd);
	
	$import = $importManager->get($importID);
	$csv = $csvManager->get($import->csvid());
	$api = $apiManager->get($import->apiid());
	$csvAssociates = $csvAssociateManager->get($import->csvid(),'csvid',true);
	
	
	/*
	 * lib api woo include et paramétrage
	 */
	require_once( 'lib/woocommerce-api.php' );
	
	$options = array(
			'debug'           => true,
			'return_as_array' => false,
			'validate_url'    => false,
			'timeout'         => 120,
			'ssl_verify'      => $api->sslverify(),
	);
	
	/*
	 * on tente l'import
	 */
	try {
		
		/*
		 * conection à l'api
		 */
		$client = new WC_API_Client( $api->url(),$api->ck(),$api->cs(), $options );

		/*
		 * on essai d'ouvrir le csv
		 */
		if (is_file('web/csv/'.$csv->name())) {
			
			productsImportStart($csv,$csvAssociates,$client);
		}else{
			return 'no file web/csv/'.$csv->name();
		}	
			
	} catch ( WC_API_Client_Exception $e ) {
		ob_start();
		echo '<pre>';
			
		echo $e->getMessage() . PHP_EOL;
		echo $e->getCode() . PHP_EOL;
	
		if ( $e instanceof WC_API_Client_HTTP_Exception ) {
	
			print_r( $e->get_request() );
			print_r( $e->get_response() );
		}
			
		echo '</pre>';
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
	}
	
	
	
	return true;
}

