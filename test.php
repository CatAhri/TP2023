<?php

$db= new Database();
$db->prepare("SELECT * from doctors");
$db->execute();

?>