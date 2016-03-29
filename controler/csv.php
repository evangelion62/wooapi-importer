<?php

$adminLvlThisControler=4;
require_once 'lib/checkRights.php';

$util = new Util();
$userid=$util->getUserId($_SESSION['token'], $bdd);

switch ($action) {

	case 'upload':
		if (isset($_POST['submit'])&&isset($_POST['separateur'])){
			if ( isset($_FILES["file"])) {
			
				//if there was an error uploading the file
				if ($_FILES["file"]["error"] > 0) {
					
					ob_start();
					echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					$content = ob_get_contents();
					ob_end_clean();
					require_once 'view/layout/layout.php';
			
				}
				else {
					ob_start();
					//Print file details
					echo "Upload: " . $_FILES["file"]["name"] . "<br />";
					echo "Type: " . $_FILES["file"]["type"] . "<br />";
					echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
					echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			
					//if file already exists
					if (file_exists("web/csv/" . $_FILES["file"]["name"])) {
						echo $_FILES["file"]["name"] . " already exists. ";
					}elseif ($_FILES["file"]["type"]!='application/octet-stream'&&$_FILES["file"]["type"]!='text/csv'){
						echo $_FILES["file"]["name"] . " not csv file. ";
					}
					else {
						//Store file in directory "upload" with the name of "uploaded_file.txt"
						$storagename = $_FILES["file"]["name"];
						move_uploaded_file($_FILES["file"]["tmp_name"], "web/csv/" . $storagename);
						$csvManager = new CsvManager($bdd);
						$data = array('name'=>$storagename,'userid'=>$userid,'separateur'=>$_POST['separateur']);
						$csv = new Csv($data);
						$csvManager->add($csv);
						echo "Stored in: " . "web/csv/" . $_FILES["file"]["name"] . "<br />";
					}
					$userError[] = ob_get_contents();
					ob_end_clean();
					require_once 'view/layout/layout.php';
				}
			} else {
				ob_start();
				echo "No file selected <br />";
				$content = ob_get_contents();
				ob_end_clean();
				require_once 'view/layout/layout.php';
			}
		}else{
			ob_start();
			require_once 'view/csv/csvupload.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
	break;
	
	case 'del':
		if (!empty($_GET['id'])){
			$csvManager = new CsvManager($bdd);
			$csv = $csvManager->get($_GET['id']);
			if (is_file('web/csv/'.$csv->name())){
				unlink('web/csv/'.$csv->name());
			}
			$csvManager->delete($_GET['id']);
			header('Location: ?controler=csv&action=list');
		}
	break;
	
	case 'list':
		$csvManager = new CsvManager($bdd);
		$csvtab = $csvManager->get($userid,'userid',TRUE);
		
		ob_start();
		require_once 'view/csv/list.php';
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
	break;
	
	case 'verify':
		if (!empty($_GET['id'])){
			$csvManager = new CsvManager($bdd);
			$csv = $csvManager->get($_GET['id']);
			if ($file = fopen('web/csv/'.$csv->name(),'r')){
				$firstligne = fgetcsv($file,0,$csv->separateur(),'"');
				$colonne = '';
				
				foreach ($firstligne as $row){
					$colonne = $colonne.$row.'|';
				}
				$csv->setRow($colonne);
				$csvManager->update($csv);
			}
			header('Location: ?controler=csv&action=list');
		}else{
			header('Location: ?controler=csv&action=list');
		}
		
	break;
	
	case 'associate':
		if (!empty($_GET['id'])&&isset($_POST['rowid'])&&!empty($_POST['attribute'])){
				$csvassociateManager = new CsvAssociateManager($bdd);
				$tab = explode('|', $_POST['attribute']);
				$data = array('rowid'=>$_POST['rowid'],'attribute'=>$tab[0],'type'=>$tab[1],'csvid'=>$_GET['id']);
				$csvassociate = new CsvAssociate($data);
				$csvassociateManager->add($csvassociate);
				
				header('Location: ?controler=csv&action=csvassociatelist&id='.$_GET['id']);
			}elseif(!empty($_GET['id'])){
				$csvManager = new CsvManager($bdd);
				$csv = $csvManager->get($_GET['id']);
				$csv->setRow(explode('|', $csv->row()));
				$csvRow = $csv->row();
				
				ob_start();
				require_once 'view/csv/csvassociate.php';
				$content = ob_get_contents();
				ob_end_clean();
				require_once 'view/layout/layout.php';
			}else{
			
			}
	break;

	case 'associatedel':
		if (!empty($_GET['id'])){
			$csvassociateManager = new CsvAssociateManager($bdd);
			$csvassociate =$csvassociateManager->get($_GET['id']);
			
			$csvassociateManager->delete($_GET['id']);
			
			header('Location: ?controler=csv&action=csvassociatelist&id='.$csvassociate->csvid());
		}
	break;
	
	case 'csvassociatelist':
		if (!empty($_GET['id'])){
			$csvassociateManager = new CsvAssociateManager($bdd);
			$csvassociates = $csvassociateManager->get($_GET['id'],'csvid',TRUE);
			$csvManager = new CsvManager($bdd);
			$csv = $csvManager->get($_GET['id']);
			$rows = explode('|', $csv->row());
			
			ob_start();
			require_once 'view/csv/csvassociatelist.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
	break;
	
	default:
		echo 'default';
	break;
}