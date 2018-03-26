<?php session_start();
if(!defined('DIRECTACCESS')) {
   die('Direct access not permitted');
}
//$sql = new mysqli('localhost','root','','passbook');
$sql = new mysqli('127.0.0.1','root','123453553','passbook');
$sql->set_charset("utf8");
if ($sql->connect_error){
    die('Connect Error ('.$sql->connect_errno.') '.$sql->connect_error);
}

?>