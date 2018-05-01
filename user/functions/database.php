<?php

/**
 * Created by PhpStorm.
 * User: A's
 * Date: 26/03/2018
 * Time: 17:26
 *
 * This file is used to store all the functions used to communicate with DB.
 */

// Contains information to connect to DB.
require ($_SERVER['DOCUMENT_ROOT']."/Project/user/includes/config.php");


    /**
     * @param $id - The id of the User, where the dog is saved to.
     * @return array - Returns array of dogs registered to user.
     */
    function getDogs($id){

        global $db;

        $sql_query = "SELECT * FROM doginfo WHERE user_id = '$id' ";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $dogs_id = $row["user_id"];
        $dogs_name = $row["dog_name"];
        $dogs_age = $row["dog_age"];
        $dogs_weight = $row["dog_weight"];

        return array($dogs_id,$dogs_name,$dogs_age,$dogs_weight);
    }

    /**
     * @param $id - The ID of the dog, used to retrieve all data for the dog
     * @return array - Returns array of data for the dog.
     */
    function getDogsInfoForToday($id){

        global $db;

        $date = date(date("Y/m/d"));

        $sql_query = "SELECT * FROM data WHERE user_id = '$id' AND timestamp = '$date'";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $dogs_info_dogs_identifier = $row["user_id"];
        $dogs_hourly_average = $row["hourly_average"];
        $dogs_min_play = $row["min_play"];
        $dogs_min_active = $row["min_active"];
        $dogs_min_rest = $row["min_rest"];
        $dogs_date = $row["timestamp"];

        return array($dogs_info_dogs_identifier,$dogs_hourly_average,$dogs_min_play,$dogs_min_active,
            $dogs_min_rest,$dogs_date);
    }

    /**
     * @param $id - The ID of the dog, used to retrieve all data for the dog
     * @return array - Returns array of data for the dog.
     */
    function getDogsMinPlayToday($id){

        global $db;

        $sql_query = "SELECT * FROM data WHERE user_id = '$id' AND date(timestamp) = curdate() order by timestamp desc limit 1";

        $result = mysqli_query($db,$sql_query);

        if ($result === FALSE){
            $sum = -1;
        }else{

            $row = mysqli_fetch_row($result);
            $sum = $row[2];
        }

        return $sum;
    }

    function getDogsMinActiveToday($id){

        global $db;

        $sql_query = "SELECT * FROM data where user_id = '$id' and date(timestamp) = curdate() order  by timestamp desc limit 1";

        $result = mysqli_query($db,$sql_query);

        if ($result === FALSE){
            $sum = -1;
        }else{

            $row = mysqli_fetch_array($result);
            $sum = $row[3];

        }

        return $sum;

    }

    function getDogsMinRestToday($id){

        global $db;

        $sql_query = "SELECT * FROM data WHERE user_id = '$id' AND date(timestamp) = curdate() order by timestamp desc limit 1";

        $result = mysqli_query($db,$sql_query);

        if ($result === FALSE){
            $sum = -1;
        }else{

            $row = mysqli_fetch_row($result);
            $sum = $row[4];
        }

        return $sum;

    }

    function getDogsData($id,$noOfDays){

        global $db;

        $array[0] = -1;

        for ($index = 0; $index < $noOfDays; $index++){

            $sql_query = "SELECT * FROM data WHERE user_id = '$id' AND date(timestamp) = DATE_ADD(curdate(), INTERVAL  - '$index' DAY ) ORDER BY timestamp desc limit 1";

            $result = mysqli_query($db,$sql_query);

            if ($result === FALSE){
                echo "-1";
            }else{

                $row = mysqli_fetch_row($result);

                if (!empty($row)){

                    $array[$index] = $row;
                }
            }
        }

        return $array;

    }


    /**
     * @param $id - the user id associated with the account.
     * @return mixed - returns the users name save on database.
     */
    function getNameFromDB($id){

        global $db;

        $sql_query = "SELECT * FROM user WHERE user_id =  '$id' ";
        $result = mysqli_query($db,$sql_query);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if ($row > 0){

            $users_name = $row["name"];

            return $users_name;

        }else{

            return "null";
        }

    }

    function getEmailFromDB($id){

        global $db;

        $sql_query = "SELECT * FROM user WHERE user_id =  '$id' ";
        $result = mysqli_query($db,$sql_query);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if ($row > 0){

            $users_email = $row["email"];

            return $users_email;

        }else{

            return "null";
        }

    }


    function getIDFromDB($email_address){

        global $db;

        $sql_query = "SELECT * FROM user WHERE email =  '$email_address' ";
        $result = mysqli_query($db,$sql_query);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if ($row > 0){

            $users_id = $row["user_id"];

            return $users_id;

        }else{

            return "null";
        }
    }

    function insertNewName($id,$name){

        global $db;

        $sql_query = "UPDATE user SET name = '$name' WHERE user_id = '$id'";

        mysqli_query($db,$sql_query);
    }

    function insertNewPass($id,$pass){

        global $db;

        $sql_query = "UPDATE user SET password = '$pass' WHERE user_id = '$id'";

        mysqli_query($db,$sql_query);
    }

    function insertNewEmail($id,$new_email){

        global $db;

        $sql_query = "UPDATE user SET email = '$new_email' WHERE  user_id = '$id'";

        mysqli_query($db,$sql_query);
    }

    function insertDogName($id, $dogs_name){

        global $db;

        $sql_query = "UPDATE doginfo SET dog_name = '$dogs_name' WHERE  user_id = '$id'";

        mysqli_query($db,$sql_query);
    }

    function insertDogAge($id, $dogs_age){

        global $db;

        $sql_query = "UPDATE doginfo SET dog_age = '$dogs_age' WHERE  user_id = '$id'";

        mysqli_query($db,$sql_query);
    }

    function insertDogWeight($id, $dogs_weight){

        global $db;

        $sql_query = "UPDATE doginfo SET dog_weight = '$dogs_weight' WHERE user_id = '$id'";

        mysqli_query($db,$sql_query);
    }


