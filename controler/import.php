<?php
/*controles authentification*/
$adminLvlThisControler=3;
require_once 'lib/checkRights.php';

$util = new Util();
$userid=$util->getUserId($_SESSION['token'], $bdd);

switch ($action) {
	case 'add':
		if (!empty($_POST['csvid'])&&!empty($_POST['apiid'])){
			$importManager = new ImportManager($bdd);
			$import = new Import($_POST);
			
			$importManager->add($import);
			header('Location: ?controler=import&action=list');
		}else{
			$csvManager = new CsvManager($bdd);
			$tabCsv = $csvManager->get($userid,'userid',true);
			$apiManager = new ApiManager($bdd);
			$tabApi = $apiManager->get($userid,'userid',true);
			
			ob_start();
			require_once 'view/import/add.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
		
	break;

	case 'list':
		$importManager = new ImportManager($bdd);
		$imports = $importManager->getList();
		
		ob_start();
			require_once 'view/import/list.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
	break;
	
	case 'del':
		if (!empty($_GET['id'])){
			$importManager = new ImportManager($bdd);
			$importManager->delete($_GET['id']);
			
			header('Location: ?controler=import&action=list');
		}
	break;
	
	case 'start':
		if(!empty($_POST['importid'])){
			require_once 'lib/importation.php';
			
			importation($_POST['importid'],$bdd);

		}else{
			$importManager = new ImportManager($bdd);
			$imports = $importManager->getList();
			
			ob_start();
			require_once 'view/import/select.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
	break;
	
	default:
		;
	break;
}