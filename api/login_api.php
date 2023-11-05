<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/user.php';

$conn_DB = new ConnectDB();
$useracces = new User($conn_DB->getConnectionDB());

$data = json_decode(file_get_contents("php://input"));

$useracces->userEmail = $data->userEmail;
$useracces->userPassword = $data->userPassword;

if ($useracces->LOGIN_USER()) {
    http_response_code(200);
    echo json_encode('1');
} else {
    http_response_code(503);
    echo json_encode('-1');
}
