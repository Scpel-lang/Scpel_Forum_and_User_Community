<?php
require_once __DIR__."../../../db/connections.php";

function validate($data)
{
    global $db;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data= mysqli_real_escape_string($db,$data);
    return $data;
}

?>