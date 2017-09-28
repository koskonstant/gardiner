<?php require('../includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
//include header template

$user_session_id=$_SESSION['memberID'];	
$smtp1 = $db->prepare("SELECT * FROM `members` WHERE `memberID`=$user_session_id");		
$smtp1->execute();
$row1 = $smtp1->fetch();
$is_admin=$row1['is_admin'];  
$show_admin = ($is_admin==1) ? '1':'';


$game_level = $_GET['game_level'];
$game_category = $_GET['game_category'];
$game_clicks = $_GET['game_clicks'];
$game_moves = $_GET['game_moves'];
$game_time_finished = $_GET['game_time_finished'];
$date = date('Y-m-d H:i:s');

$smtp = $db->prepare("INSERT INTO `game_sessions` 
            (`user_id`, `game_session_id`, `locale_id`, `game_level`, `game_category`, `game_clicks`, `game_moves`, `game_time_finished`, `is_admin`, `game_id`)
            VALUES ('".$user_session_id."','','".$date."','".$game_level."','".$game_category."','".$game_clicks."','".$game_moves."','".$game_time_finished."','".$show_admin."','2')");						
$smtp->execute();

?>

