<?php
require "lib/path.php";
session_start();
unset($_SESSION['adc_authenticate']);
unset($_SESSION['adc_logInUser']);
unset($_SESSION['adc_loginRole']);
header('location:'.URL);
?>