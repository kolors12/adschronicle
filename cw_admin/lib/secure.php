<?php
require "path.php";
session_start();
if(empty($_SESSION['adc_authenticate']))
{
	//session_destroy();
	header('location: '.URL.'logout.php');
}