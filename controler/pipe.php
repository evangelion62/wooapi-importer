<?php
switch ($action) {
	
	case 'add':
		if (!empty($_POST['name'])&&!empty($_POST['baseurl'])){
			$pipeManager = new PipeManager($bdd);
			$pipe = new Pipe($_POST);
			$pipeManager->add($pipe);
			
			header('Location: ?controler=pipe&action=list');
		}else{
			ob_start();
			require_once 'view/pipe/addpipe.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
	break;
	
	case 'list':
		$pipeManager = new PipeManager($bdd);
		$pipes=$pipeManager->getList();
		ob_start();
		require_once 'view/pipe/list.php';
		$content = ob_get_contents();
		ob_end_clean();
		require_once 'view/layout/layout.php';
	break;
	
	case 'del':
		if(isset($_GET['id'])){
			$pipeManager = new PipeManager($bdd);
				
			$pipeManager->delete($_GET['id']);
			header('Location: ?controler=pipe&action=list');
		}else{
			header('Location: ?controler=pipe&action=list');
		}
	break;
	
	case 'edit':
		if (isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['id'])){
			$_POST['pass'] = sha1 ($_POST['pass']);
			$pipeManager = new UserManager($bdd);
			$pipe = new User($_POST);
				
			$pipeManager->update($pipe);
				
			header('Location: ?controler=pipe&action=list');
		}elseif(isset($_GET['id'])){
			$pipeManager = new PipeManager($bdd);
			$pipe = $pipeManager->get($_GET['id']);
				
			ob_start();
			require_once 'view/pipe/edit.php';
			$content = ob_get_contents();
			ob_end_clean();
			require_once 'view/layout/layout.php';
		}
		break;
	default:
		;
	break;
}