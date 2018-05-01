<?php
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = mysqli_prepare($con, "INSERT INTO user (name, username, email, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "ssss", $name, $username, $email, $password);
    mysqli_stmt_execute($statement);
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $username, $email, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true; 
        $response["user_id"] = $userID; 
        $response["name"] = $name;
        $response["username"] = $username;
        $response["email"] = $email;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>