<?php
/*controles authentification*/
$adminLvlThisControler=3;
require_once 'lib/checkRights.php';

$util = new Util();
$userid=$util->getUserId($_SESSION['token'], $bdd);

switch ($action) {
	case 'list':
		
		$apiManager = new ApiManager($bdd);
		$apitab = $apiManager->get($userid,'userid',TRUE);
		
		ob_start();
		require_once 'view/api/list.php';
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
	break;
	
	case 'add':
	
		if (!empty($_POST['url'])&&!empty($_POST['ck'])&&!empty($_POST['cs'])){
			if (!empty($_POST['sslverify'])){
				if ($_POST['sslverify'] == 1){
					$_POST['sslverify'] = 1;
				}
			}else{
				$_POST['sslverify'] = 0;
			}
			$apiManager = new ApiManager($bdd);
			$api = new Api($_POST);
			require_once 'lib/Util.class.php';
			$api->setUserid($userid);
			
			$apiManager->add($api);
			
			header('Location: ?controler=api&action=list');
		}else{
			ob_start();
			require_once 'view/api/add.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
		
		
	break;
	
	case 'del':
		if(!empty($_GET['id'])){
			$apiManager = new ApiManager($bdd);
			$api = $apiManager->get($_GET['id']);
			
			if ($userid == $api->userid()){
				$apiManager = new ApiManager($bdd);
				$apiManager->delete($_GET['id']);
					
			}
			
			header('Location: ?controler=api&action=list');
		}else{
			header('Location: ?controler=api&action=list');
		}
	break;
	
	case 'edit':
		
		if (!empty($_POST['url'])&&!empty($_POST['ck'])&&!empty($_POST['cs'])&&!empty($_GET['id'])){
			$apiManager = new ApiManager($bdd);
			$api = $apiManager->get($_GET['id']);
				
			if ($userid == $api->userid()){
				
			
				if (!empty($_POST['sslverify'])){
					if ($_POST['sslverify'] == 1){
						$_POST['sslverify'] = 1;
					}
				}else{
					$_POST['sslverify'] = 0;
				}
				$apiManager = new ApiManager($bdd);
				$apiedit = new Api($_POST);
				$apiedit->setId($_GET['id']);
				$apiedit->setUserid($userid);
					
				$apiManager->update($apiedit);
			}
			header('Location: ?controler=api&action=list');
			
		}elseif (!empty($_GET['id'])){
			$apiManager = new ApiManager($bdd);
			$api = $apiManager->get($_GET['id']);
			
			ob_start();
			require_once 'view/api/edit.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}else{
			header('Location: ?controler=api&action=list');
		}
		
	break;
	
	case 'verify':
		if (!empty($_GET['id'])){
			
			$apiManager = new ApiManager($bdd);
			$api = $apiManager->get($_GET['id']);
			if ($api->sslverify() == 1){
				$sslverify=true;
			}else{
				$sslverify=false;
			}
			
			require_once( 'lib/woocommerce-api.php' );
			
			$options = array(
					'debug'           => true,
					'return_as_array' => false,
					'validate_url'    => false,
					'timeout'         => 120,
					'ssl_verify'      => $sslverify,
			);
			
			$product = array(
					'title' => 'produit test Woo api importer',
					'type' => 'simple',
					'status' => 'draft',
					'regular_price' => '0',
					'sale_price' => '0',
					'enable_html_description'=>true,
					'description' => 'description' ,
					'short_description' => 'short description',
					'downloadable' => true , 'virtual'=>true ,
					'downloads'  => (object) array(
							array(
									'name'=>'nom',
									'file'=>'url'
							)
					),
			) ;
			
			try {
			
				$client = new WC_API_Client( $api->url(),$api->ck(), $api->cs(), $options );
					
				$result = $client->products->create($product);
				
				ob_start();
				echo '<pre>';
				print_r($result);
				echo '</pre>';
				$content = ob_get_contents();
				ob_end_clean();
				require_once 'view/layout/layout.php';
					
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
			ob_start();
			require_once 'view/api/verify.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		
		}else{
			
			header('Location: ?controler=api&action=list');
		}
		
	break;
	
	default:
		;
	break;
}