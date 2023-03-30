<?php
require_once('app/librairies/Database.php');
$db= new Database();
$db->prepare("SELECT * from doctors");
$db->execute();

?>