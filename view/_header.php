<?php
if(!isset($_SESSION)){
	session_start();
}
require_once"view/config.php";
require_once"app/model/DBConnect.php";
require_once"app/model/mainModel.php";

$model = new mainModel;
?>