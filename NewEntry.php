<?php
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    
    $userID= $_POST["userID"];
    $hourly_average = $_POST["hourly_average"]; 
    $min_play = $_POST["min_play"]; 
    $min_active = $_POST["min_active"]; 
    $min_rest = $_POST["min_rest"]; 

    $statement = mysqli_prepare($con, "INSERT INTO data (user_id, hourly_average, min_play, min_active, min_rest) VALUES ('".$userID."', '".$hourly_average."', '".$min_play."', '".$min_active."', '".$min_rest."');");
    //mysqli_stmt_bind_param($statement, "iiiii", $userID, $hourly_average, $min_play, $min_active, $min_rest);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
