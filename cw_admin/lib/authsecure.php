<?php
require "path.php";
session_start();
if($_SESSION['loginRole']=='adminuser')
{
	//session_destroy();
	header('location: '.URL.'home.php');
}