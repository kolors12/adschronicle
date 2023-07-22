<?php
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','adschronicle2');
define('DB_USER','root');
define('DB_PASS','');
$db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
return($db);

