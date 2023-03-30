<?php
$db = new Database();
$user = new User($db);
$user->create();
?>
