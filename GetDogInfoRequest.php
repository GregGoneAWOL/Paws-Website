<?php
	
	//This needs to be changed back - but just show it works on https://jsonlint.com/
	
    $userID = $_POST["userID"];
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    $sql = "SELECT * FROM doginfo WHERE user_id = '".$userID."'";
	//$sql = "SELECT * FROM doginfo WHERE user_id = 1";

    $result = mysqli_query($con, $sql);	
    
    $response = array();
    
    while ($row = mysqli_fetch_array($result)) {
    
    array_push($response,array("user_id"=>$row[0],"dog_name"=>$row[1],"dog_age"=>$row[2],"dog_weight"=>$row[3]));   
    
    }	
		
	echo json_encode(array("server_response"=>$response));
	mysqli_close($con);		
		

?>