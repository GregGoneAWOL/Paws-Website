<?php
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $statement = mysqli_prepare($con, "UPDATE user SET password = ? WHERE username = ?");
    mysqli_stmt_bind_param($statement, "ss", $password, $username);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
