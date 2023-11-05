<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json; charset-UTF-8");
header("Access-Control-Allow-Method:POST");
header("Access-Control-Max-Age:3600");

include_once './../connect_db.php';
include_once './../model/user.php';


$conn_DB = new ConnectDB();
$useracces = new User($conn_DB->getConnectionDB());



$data = json_decode(file_get_contents("php://input"));


$useracces->userEmail = $data->userEmail;
$useracces->userName = $data->userName;
$useracces->userAddress = $data->userAddress;
$useracces->userPhone = $data->userPhone;
$useracces->userPassword = $data->userPassword;
$old_userPassword = $data->old_userPassword;

$hash_password=md5($old_userPassword);


$stmt_email = $useracces->GET_USER_CHANG_FOR_EMAIL();


if ($stmt_email->rowCount() > 0) {
    $result = $stmt_email->fetch(PDO::FETCH_ASSOC);
    $user_id = $result["user_Id"];
    $useracces->userId = $user_id;
    $stmt_old_password = $useracces->GET_CHANG_OLD_PASSWORD();

    if($stmt_old_password->rowCount()>0){
        $result = $stmt_old_password->fetch(PDO::FETCH_ASSOC);
        $old_password= $result["user_Password"];
        if($old_password==$hash_password){
            if($useracces->UPDATE_USER()){
                http_response_code(200);
                echo json_encode('1');
            }
        }else{
            http_response_code(503);
            echo json_encode('0');
        }

    }else{
            http_response_code(503);
            echo json_encode('0');
    }
   
}
