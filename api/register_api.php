<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method:POST");
header("Access-Control-Max-Age:3600");

include_once './../connect_db.php';
include_once './../model/user.php';


$conn_DB = new ConnectDB();
$useracces = new User($conn_DB->getConnectionDB());



$data = json_decode(file_get_contents("php://input"));




$useracces->userName = $data->userName;
$useracces->userAddress = $data->userAddress;
$useracces->userPhone = $data->userPhone;
$useracces->userPassword = $data->userPassword;
$useracces->userProductId = $data->userProductId;
$useracces->userEmail = $data->userEmail;



$stmt_count_email = $useracces->GET_VALIDATE_EMAIL();
$stmt_count_phone = $useracces->GET_VALIDATE_PHONE();
$stmt_count_user_productkey = $useracces->GET_VALIDATE_USER_PRODUCT();
$stmt_count_productkey = $useracces->GET_VALIDATE_PRODUCT();

$count_array = array();


if (($stmt_count_email->rowCount() == 0)
    && ($stmt_count_user_productkey->rowCount() == 0) &&
    ($stmt_count_phone->rowCount() == 0) &&
    ($stmt_count_productkey->rowCount() == 1)
) { //เช็คเงื่อนใข
    if ($useracces->INSERT_USER()) {
        while ($useracces->INSERT_FIRST_TIME()) {
            echo json_encode('1');
            break;
        }
    }
} else {
    http_response_code(503);
    echo json_encode('-1');
}
