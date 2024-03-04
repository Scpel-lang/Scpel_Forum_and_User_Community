<?php

require_once "../utils/header.php";

$main_table = "scpel_forum";

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM ".$main_table;
        $query = mysqli_query($db,$sql);
        $forums = array();
        while ($fetch = mysqli_fetch_assoc($query)) {
            $forums[] = $fetch;
        }
        $response = json_encode($forums);
        print($response);
    
}

?>