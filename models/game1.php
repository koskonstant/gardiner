<?php 
require('../includes/config.php'); 

$quizdat = $_REQUEST["qdat"];
print_r($_REQUEST);
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

$length = count($quizdatarray);
$hints_msg='';
for ($i = 0; $i < $length; $i++) {
  $prev=$quizdatarray[$i-1]->time;
  $next=$quizdatarray[$i]->time;
  $time=$next-$prev;
  $hints_msg .= $quizdatarray[$i]->name.': '.$quizdatarray[$i]->helps .' Hints in '.$time.' sec</br>';  
}

foreach ($quizdatarray as $value) {
$lastKey = count($quizdatarray)-1;
$lastKeyValue = $quizdatarray[$lastKey];
// var_dump($lastKeyValue->time);
    $hint_clicks = $hint_clicks + $value->helps ;
    $game_time_finished = $game_time_finished + $value->time;
}

$sum_hints = $quizdatarray[$length-1]->helps;
$sum_time = $quizdatarray[$length-1]->time;
$sum_hints_time = $hint_clicks.' / '.$sum_time;
// echo $hint_clicks."<p></p>";
// echo $game_time_finished;

$user_session_id=$_SESSION['memberID'];
$date = date('Y-m-d H:i:s');

$smtp1 = $db->prepare("SELECT * FROM `members` WHERE `memberID`=$user_session_id");		
$smtp1->execute();
$row1 = $smtp1->fetch();
$is_admin=$row1['is_admin'];  
$show_admin = ($is_admin==1) ? '1':'2';

$smtp = $db->prepare("INSERT INTO `game_sessions` 
    (`user_id`,`start_datetime`,`game_level`, `game_clicks`, `game_time_finished`, `is_admin`, `game_id`)
    VALUES ('".$user_session_id."','".$date."','".$level."','".$hints_msg."','".$sum_hints_time."','".$show_admin."','1')");						
$smtp->execute();

echo 'Data inserted to db successfully!!';

header("Location: ../game1.php");

?>