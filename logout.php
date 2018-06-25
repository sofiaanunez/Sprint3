<?php
require_once('Clases/autoload.php');
@session_start();
session_destroy();
unset($_COOKIE['id']);
header("location: index.php");
?>
