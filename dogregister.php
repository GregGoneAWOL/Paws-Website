<?php
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    
    $userID = $_POST["userID"];
    $dog_name = $_POST["dog_name"]; 
    $dog_age = $_POST["dog_age"]; 
    $dog_weight = $_POST["dog_weight"]; 

    $statement = mysqli_prepare($con, "INSERT INTO doginfo (user_id, dog_name, dog_age, dog_weight) VALUES ('".$userID."', '".$dog_name."', '".$dog_age."', '".$dog_weight."');");
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
