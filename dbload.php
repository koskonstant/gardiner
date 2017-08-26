<?php

    require_once('includes/config.php');

    $questions = $user->showLevelQuestions(1);

    header('Content-type: application/json');
    echo json_encode($questions);   
