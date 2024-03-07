<?php

require_once "../utils/header.php";

$main_table = "scpel_threads";


switch ($method) {
    case 'GET':
        if (isset($_GET['thread'])) {
            return get_thread_replies(validate($_POST['thread']));
        }
    
    case 'GET':
        if (isset($_POST['thread']) && !empty($_POST['thread'])) {
            return create_thread_reply($thread);
        }

}

function create_thread_reply($thread){

    $name  = validate($_POST['name']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);
    $email = validate($_POST['email']);

}



function get_thread_replies($thread){
    global $db;
    global $main_table;

    $sql_children = "SELECT * FROM '".$main_table."' WHERE ParentThreadID = '".$thread."' ";
    $query_childrens = mysqli_query($db,$sql_children);
    while ($fetch_data = mysqli_fetch_assoc($query_childrens)) {
        ?>
        <div>
            <div class="flex flex-col my-2 bg-gray-50 gap-2 p-2 shadow-sm">
                <div class="flex px-2 bg-gray-300">
                    <a href="" class="flex-1 hover:underline flex font-bold">#<?php echo $fetch_data['ThreadID']." ".$fetch_data['Subject']; ?></a>
                    <div class="flex"><?php echo get_time_elapsed_string($fetch_data['createdAt'],false); ?></div>
                </div>
                <div class="flex ">
                    <div class="bg-[#E5E7EB] min-h-[180px] w-[200px] justify-between text-sm p-2 flex flex-col">
                        <div><?php echo $fetch_data['Name']; ?></div>
                        <div>
                            <img src="https://ui-avatars.com/api/?name=<?php echo $fetch_data['name']; ?>&background=random" alt="" srcset="">
                        </div>
                        <div class="grid">
                            <a href="#">Share Post</a>
                            <a href="#" class="hover:underline">Reply to Post</a>
                        </div>
                    </div>
                    <div class="flex-1 p-2 flex flex-col">
                        <?php echo $fetch_data['Message'] ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

// switch ($method) {
//     case 'GET':
//         if (!isset($_GET['ThreadID']) or empty($_GET['ThreadID'])) {
//             http_response_code(400);
//             $response = json_encode(array(
//                 "error" => 400,
//                 "message" => "ID not found"
//             ));
//             return print($response);
//         }
//         return get_all_forum_replies_for_id(validate($_GET['ID']));
    
//     case 'POST':
//         if (!isset($_GET['reply_thread_id']) or empty($_GET['reply_thread_id'])) {
//             http_response_code(400);
//             $response = json_encode(array(
//                 "message" => "forum not found"
//             ));
//             return print($response);
//         }
//         return reply_thread_of($_POST['reply_thread_id']);
//     default:
//         http_response_code(404);
//         $response = json_encode(array(
//             "error" => 404,
//             "message" => "Not found"
//         ));
//         return print($response);
// }


// function get_all_forum_replies_for_id($id){
//     global $main_table;
//     global $db;

//     $sql = "SELECT * FROM ".$main_table." WHERE ID=".$id;
//     $query = mysqli_query($db,$sql);
//     $forums = array();
//     while ($fetch = mysqli_fetch_assoc($query)) {
//         $forums[] = $fetch;
//     }
//     $response = json_encode($forums);
//     return print($response);
// }

// function reply_thread_of($id){
//     global $main_table;
//     global $db;

//     $name= validate($_POST['name']);
//     $email= validate($_POST['email']);
//     $message= validate($_POST['message']);
//     $subject= validate($_POST['subject']);

//     if (empty($name) || empty($email) || empty($message) || empty($subject)) {
//         http_response_code(400);
//         $response = json_encode(array(
//             "error" => 400,
//             "message" => "Fields are all required (username,email,subject and message)"
//         ));
//         return print($response);
//     }
//     else{
//         $query = mysqli_query($db,"INSERT INTO ".$main_table." (`USER_NAME`,`USER_EMAIL`,`SUBJECT`,`MESSAGE`,`FORUM_ID`) values('$name','$email','$subject','$message','".$id."')  ");
//         $row = mysqli_fetch_row($query);

//         if ($row >0) {
//             http_response_code(201);
//             $response = json_encode(array(
//                 "message" => "Succesfully Added"
//             ));
//             return print($response);
//         }
//         else{
            
//             http_response_code(400);
//             $response = json_encode(array(
//                 "message" => "Something gone wrong!! check your request and try again"
//             ));
//             return print($response);
//         }
//     }


// }

?>