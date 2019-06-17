<?php
session_start();

if(!isset($_SESSION['user']) || !isset($_SESSION['admin']))
{
    
	header("Location: view/loginView.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	header("Location: view/index.php");
}
?>