<?php 
require('../includes/config.php'); 

$quizdat = $_REQUEST["qdat"];
$level = $_REQUEST["level"];
$quizdatarray = json_decode($quizdat);

// echo '<pre>';
// var_dump($level);
// echo '</pre>';
// echo '<pre>';
// var_dump($quizdatarray);
// echo '</pre>';
// die();

$hint_clicks = 0;
$game_time_finished = 0;

foreach ($quizdatarray as $value) {

    $hint_clicks = $hint_clicks + $value->helps ;
    $game_time_finished = $game_time_finished + $value->time;
}

// echo $hint_clicks."<p></p>";
// echo $game_time_finished;

$user_session_id=$_SESSION['memberID'];
$date = date('Y-m-d H:i:s');

$smtp1 = $db->prepare("SELECT * FROM `members` WHERE `memberID`=$user_session_id");		
$smtp1->execute();
$row1 = $smtp1->fetch();
$is_admin=$row1['is_admin'];  
$show_admin = ($is_admin==1) ? '1':'';

$smtp = $db->prepare("INSERT INTO `ser_game`.`game_sessions` 
    (`user_id`, `game_session_id`, `locale_id`, `game_level`, `game_clicks`, `game_time_finished`, `is_admin`, `game_id`)
    VALUES ('".$user_session_id."','','".$date."','".$level."','".$hint_clicks."','".$game_time_finished."','".$show_admin."','1')");						
$smtp->execute();

echo 'Data inserted to db successfully!!';

header("Location: ../game1.php");
die();
