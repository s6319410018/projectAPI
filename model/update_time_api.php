<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/control.php';

$conn_DB = new ConnectDB();
$data_access_time = new CONTROL_TIME($conn_DB->getConnectionDB());
$data_access_ai = new CONTROL_AI($conn_DB->getConnectionDB());
$data_access_solenoid = new CONTROL_SOLENOID($conn_DB->getConnectionDB());


$data = json_decode(file_get_contents("php://input"));
//time in put
$data_access_time->userEmail = $data->userEmail;
$data_access_time->userPassword = $data->userPassword;
$data_access_time->control_Date_On = $data->control_Date_On;
$data_access_time->control_Time_On = $data->control_Time_On;
$data_access_time->control_Date_OFF = $data->control_Date_OFF;
$data_access_time->control_Time_OFF = $data->control_Time_OFF;

//ai in put
$data_access_ai->control_Ai = $data->control_Ai;
$data_access_solenoid->control_Solenoid = $data->control_Solenoid;


$stmt_user = $data_access_time->GET_USER_CONTROL_FOR_EMAIL();


if ($stmt_user->rowCount() > 0) {
    $result = $stmt_user->fetch(PDO::FETCH_ASSOC);
    $user_id = $result["user_Id"];
    $user_Product_ID = $result["user_Product_ID"];

    $data_access_time->productkey = $user_Product_ID;
    $stmt_status = $data_access_time->GET_STATUS();
    $result_stmt_status = $stmt_status->fetch(PDO::FETCH_ASSOC);
    $realtime_Solenoid = $result_stmt_status["realtime_Solenoid"];
    $realtime_AI = $result_stmt_status["realtime_AI"];

    if ($realtime_Solenoid == 1) {
        http_response_code(200);
        echo json_encode("2");
    } elseif ($realtime_AI == 1) {
        http_response_code(200);
        echo json_encode("3");
    } else {

        $data_access_time->user_control_Time_Id = $user_id;
        $data_access_ai->user_control_Ai_Id = $user_id;
        $data_access_solenoid->user_control_Solenoid_Id = $user_id;



        if ($data_access_time->UPDATE_CONTROL_TIME() && $data_access_ai->UPDATE_CONTROL_AI() && $data_access_solenoid->UPDATE_CONTROL_SOLENOID()) {
            http_response_code(200);
            echo json_encode('1');
        } else {
            http_response_code(503);
            echo json_encode('0');
        }
    }
}
