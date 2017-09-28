<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','gardadmin');
define('DBPASS','g@rd@n1l3');
define('DBNAME','gardiner_db');

//application address
define('DIR','game.local');
define('SITEEMAIL','noreply@domain.com');


try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

$path = $_SERVER['DOCUMENT_ROOT']. '/gardiner/';
//include the user class, pass in the database connection
include($path.'classes/user.php');
include($path.'classes/phpmailer/mail.php');
$user = new User($db);
?>
