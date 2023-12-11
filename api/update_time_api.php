<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/control.php';

$conn_DB = new ConnectDB();
$data_access = new CONTROL_TIME($conn_DB->getConnectionDB());


$data = json_decode(file_get_contents("php://input"));
$data_access->userEmail = $data->userEmail;
$data_access->userPassword = $data->userPassword;
$data_access->control_Date_On = $data->control_Date_On;
$data_access->control_Time_On = $data->control_Time_On;
$data_access->control_Date_OFF = $data->control_Date_OFF;
$data_access->control_Time_OFF = $data->control_Time_OFF;


$stmt_user = $data_access->GET_USER_CONTROL_FOR_EMAIL();


if($stmt_user->rowCount() > 0){
    $result = $stmt_user->fetch(PDO::FETCH_ASSOC);
    $user_id = $result["user_Id"];
    $user_Product_ID = $result["user_Product_ID"];

    $data_access->productkey = $user_Product_ID;
    $stmt_status = $data_access->GET_STATUS();
    $result_stmt_status = $stmt_status->fetch(PDO::FETCH_ASSOC);
    $realtime_Solenoid = $result_stmt_status["realtime_Solenoid"];
    $realtime_AI = $result_stmt_status["realtime_AI"];

    if($realtime_Solenoid == 1){
        http_response_code(200);
        echo json_encode("2");

    }elseif( $realtime_AI == 1){
        http_response_code(200);
        echo json_encode("3");

    }else{
        $data_access->user_control_Time_Id = $user_id;

        if ($data_access->UPDATE_CONTROL_TIME()) {
            http_response_code(200);
            echo json_encode('1');
        } else {
            http_response_code(503);
            echo json_encode('0');
        }

    
    
    }

}


?>

