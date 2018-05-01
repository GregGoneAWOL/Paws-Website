<?php
	
	//This needs to be changed back - but just show it works on https://jsonlint.com/
	
    $userID = $_POST["userID"];
    $con = mysqli_connect("localhost", "okwtbzob_user", "LoLxd12312", "okwtbzob_db123");
    $sql = "SELECT * FROM data WHERE user_id = '".$userID."'";
	//$sql = "SELECT * FROM data WHERE user_id = 1";

    $result = mysqli_query($con, $sql);	
    
    $response = array();
    
    while ($row = mysqli_fetch_array($result)) {
    
    array_push($response,array("user_id"=>$row[0],"hourly_average"=>$row[1],"min_play"=>$row[2],"min_active"=>$row[3],"min_rest"=>$row[4],"timestamp"=>$row[5]));   
    
    }	
		
	echo json_encode(array("server_response"=>$response));
	mysqli_close($con);
    //echo json_encode(array('user_id'=>$row['user_id'],'hourly_average'=>$row['hourly_average'], 'min_play'=>$row['min_play'], 'min_active'=> $row['min_active'],'min_rest'=> $row['min_rest']));
		
		

?>