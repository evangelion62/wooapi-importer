<?php
switch ($action) {
	case 'index':
		
		/*création des tables*/
		$userManager = new UserManager($bdd);
		$userManager->createTable();
		$userRightsManager = new UserrightsManager($bdd);
		$userRightsManager->createTable();
		$tokenManager = new TokenManager($bdd);
		$tokenManager->createTable();
		$apiManager = new ApiManager($bdd);
		$apiManager->createTable();
		$csvManager = new CsvManager($bdd);
		$csvManager->createTable();
		$csvAssociateManager = new CsvAssociateManager($bdd);
		$csvAssociateManager->createTable();
		$importManager = new ImportManager($bdd);
		$importManager->createTable();
		
		/*redirection*/
		header('Location: ?controler=install&action=firstuser');
	break;
	
	case 'firstuser':
		$userManager = new UserManager($bdd);
		if ($userManager->count()>0){
			header('Location: ?controler=index');
		}else{
			if (isset($_POST['login'])&&isset($_POST['pass'])){
				$_POST['pass'] = sha1($_POST['pass']);
				$userManager = new UserManager($bdd);
				$user = new User($_POST);
				
				$userManager->add($user);
				$user = $userManager->get($_POST['login'],'login');
				$userRights = new UserRights(array('userid'=>$user->id(),'adminlvl'=>'4'));
				$userRightsManager = new UserRightsManager($bdd);
				$userRightsManager->add($userRights);
				
				header('Location: ?controler=user&action=list');
			}else{
				ob_start();
				require_once 'view/user/addfirstuser.php';
				$content = ob_get_contents();
				ob_end_clean();
				require_once 'view/layout/layout.php';
			}
		}
	break;
	
	default:
		;
	break;
}