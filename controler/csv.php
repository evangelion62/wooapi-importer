<?php

$adminLvlThisControler=4;
require_once 'lib/checkRights.php';

$util = new Util();
$userid=$util->getUserId($_SESSION['token'], $bdd);

switch ($action) {
	case 'questexport':
		$questionManager = new QuestionManager($bdd);
		$questions=$questionManager->getList();
		
		$chemin = 'web/csv/questexport.csv';
		$delimiteur = ';';
		
		if($fichier_csv = fopen($chemin,'w+'))
		{
		fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));
		
		foreach ($questions as $question){
			$questarray[] = $question->question();
			$questarray[] = $question->rep1();
			$questarray[] = $question->rep2();
			$questarray[] = $question->rep3();
			$questarray[] = $question->rep4();
			$questarray[] = $question->rep();
			
			fputcsv($fichier_csv, $questarray , $delimiteur);
			unset($questarray);
		}
		
		fclose($fichier_csv);
		
		ob_start();
		require_once 'view/csv/csvexport.php';
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
		}
	break;
	
	case 'questimport':
		$questionManager = new QuestionManager($bdd);
		
	break;
	
	case 'upload':
		if (isset($_POST['submit'])){
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
					}elseif ($_FILES["file"]["type"]!='application/octet-stream'){
						echo $_FILES["file"]["name"] . " not csv file. ";
					}
					else {
						//Store file in directory "upload" with the name of "uploaded_file.txt"
						$storagename = $_FILES["file"]["name"];
						move_uploaded_file($_FILES["file"]["tmp_name"], "web/csv/" . $storagename);
						$csvManager = new CsvManager($bdd);
						$data = array('name'=>$storagename,'userid'=>$userid);
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
				$firstligne = fgetcsv($file,0,';','"');
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
	
	default:
		;
	break;
}