<?php define('DIRECTACCESS', TRUE); require_once 'functions.php';

switch(@$_GET['q']){
	case 'add':
		echo add($_POST['name'],$_POST['email'],$_POST['pass']);
	break;
	case 'delete':
		echo delete($_POST['id']);
	break;
	case 'edit':
		sleep(1);echo edit($_POST['id'],$_POST['name'],$_POST['eid'],$_POST['pass']);
	break;
	case 'login':
		echo login($_POST['pass']);
	break;
	case 'newpass':
		echo changePass($_POST['newpass']);
	break;
	case 'logout':
		logout();
	break;
	default:
		header('Location:index.php');
	break;
}







?>