<?php

include "utils/header.php";

$main_table = "scpel_users";

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM ".$main_table;
        $query = mysqli_query($db,$sql);
        $data = array();
        while ($fetch=mysqli_fetch_assoc($query)) {
            $data[]=$fetch;
        }
        
        break;
    
    default:
        # code...
        break;
}

?>