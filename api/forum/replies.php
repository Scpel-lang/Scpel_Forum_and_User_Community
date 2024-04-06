<?php

require_once "../utils/header.php";

$main_table = "scpel_threads";

switch ($method) {
    case 'GET':
        if (!isset($_GET['ThreadID']) or empty($_GET['ThreadID'])) {
            http_response_code(400);
            $response = json_encode(array(
                "error" => 400,
                "message" => "ID not found"
            ));
            return print($response);
        }
        return get_all_forum_replies_for_id(validate($_GET['ID']));
    
    case 'POST':
        if (!isset($_GET['reply_thread_id']) or empty($_GET['reply_thread_id'])) {
            http_response_code(400);
            $response = json_encode(array(
                "message" => "forum not found"
            ));
            return print($response);
        }
        return reply_thread_of($_POST['reply_thread_id']);
    default:
        http_response_code(404);
        $response = json_encode(array(
            "error" => 404,
            "message" => "Not found"
        ));
        return print($response);
}


function get_all_forum_replies_for_id($id){
    global $main_table;
    global $db;

    $sql = "SELECT * FROM ".$main_table." WHERE ID=".$id;
    $query = mysqli_query($db,$sql);
    $forums = array();
    while ($fetch = mysqli_fetch_assoc($query)) {
        $forums[] = $fetch;
    }
    $response = json_encode($forums);
    return print($response);
}

function reply_thread_of($id){
    global $main_table;
    global $db;

    $name= validate($_POST['name']);
    $email= validate($_POST['email']);
    $message= validate($_POST['message']);
    $subject= validate($_POST['subject']);

    if (empty($name) || empty($email) || empty($message) || empty($subject)) {
        http_response_code(400);
        $response = json_encode(array(
            "error" => 400,
            "message" => "Fields are all required (username,email,subject and message)"
        ));
        return print($response);
    }
    else{
        $query = mysqli_query($db,"INSERT INTO ".$main_table." (`USER_NAME`,`USER_EMAIL`,`SUBJECT`,`MESSAGE`,`FORUM_ID`) values('$name','$email','$subject','$message','".$id."')  ");
        $row = mysqli_fetch_row($query);

        if ($row >0) {
            http_response_code(201);
            $response = json_encode(array(
                "message" => "Succesfully Added"
            ));
            return print($response);
        }
        else{
            
            http_response_code(400);
            $response = json_encode(array(
                "message" => "Something gone wrong!! check your request and try again"
            ));
            return print($response);
        }
    }


}

?>