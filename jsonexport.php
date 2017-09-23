<?php require('includes/config.php'); 

$result = $db->prepare("SELECT `game_sessions`.* ,`members`.`USR_FName`,`members`.`USR_LName`
						FROM `game_sessions`
						INNER JOIN `members` ON `game_sessions`.`user_id` =  `members`.`memberID`                                               
						WHERE `game_sessions`.`game_id`=1");
			
$result->execute();
$array = $result->fetchAll( PDO::FETCH_ASSOC );

header('Content-disposition: attachment; filename= Game1_logs.json');
header('Content-type: application/json');
echo json_encode($array, JSON_PRETTY_PRINT);






