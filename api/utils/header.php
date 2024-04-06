<?php
require_once  __DIR__ ."../../../db/connections.php";


header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");		// CORS
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");
$method = $_SERVER['REQUEST_METHOD'];

?>