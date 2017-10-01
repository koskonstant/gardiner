<?php 
require('../includes/config.php'); 
$level=$_SESSION['difficulty-levels'];
$result = ''; 
switch($level) {
    case ($level==1):
      $result = "LIMIT 5";
      break;  
    case ($level==2):
      $result = "LIMIT 10";
      break; 
    case ($level==3):
      $result = "LIMIT 15";
      break; 
}

$smtp = $db->prepare("SELECT `artifact_instances_locale`.* 
                      FROM `artifact_instances_locale`
                      WHERE `artifact_cat`='faces' 
                      $result ");				
$smtp->execute();

$results = $smtp->fetchAll( PDO::FETCH_ASSOC );

echo json_encode($results);
?>