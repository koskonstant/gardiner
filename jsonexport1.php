<?php require('includes/config.php'); 

$result = $db->prepare("SELECT `game_sessions`.* ,`members`.`USR_FName`,`members`.`USR_LName`,`artifact_types`.`art_type`,`levels`.`difficulty_characterization`
						FROM `game_sessions`
						INNER JOIN `members` ON `game_sessions`.`user_id` =  `members`.`memberID`
						INNER JOIN `artifact_types` 
						ON `game_sessions`.`game_category` =  `artifact_types`.`art_id` 
						INNER JOIN `levels` 
						ON `game_sessions`.`game_level` =  `levels`.`id`                                               
						WHERE `game_sessions`.`game_id`=2");

$result->execute();
$array = $result->fetchAll( PDO::FETCH_ASSOC );

header('Content-disposition: attachment; filename= Game2_logs.json');
header('Content-type: application/json');
echo json_encode($array, JSON_PRETTY_PRINT);