<?php

function validate($data)
{
    require("connection.php");
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data= mysqli_real_escape_string($connection,$data);
    return $data;
}

?>