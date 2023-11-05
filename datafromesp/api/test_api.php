<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/nodemcu_read.php';

$conn_DB = new ConnectDB();
$nodemcuaccess = new NODEMCU($conn_DB->getConnectionDB());

$data = json_decode(file_get_contents("php://input"));

$nodemcuaccess->espkey = $data->espkey;

// Initialize $data_array
$data_array = array();

// Get user ID
$stmt_USERID = $nodemcuaccess->NODE_MCU_GET_ID();

if ($stmt_USERID->rowCount() > 0) {
    $result = $stmt_USERID->fetch(PDO::FETCH_ASSOC);
    $result_user_id = $result["user_Id"];

    $nodemcuaccess->userId = $result_user_id;
    $realtime_data = $nodemcuaccess->NODE_MCU_GET_REALTIME();

    if ($realtime_data->rowCount() > 0) {
        $row_Lasttime = $stmt_LASTTIME->fetch(PDO::FETCH_ASSOC);

        while ($row_realtime = $realtime_data->fetch(PDO::FETCH_ASSOC)) {
            $data_item = array(
                "control_Date_On" => $row_realtime['control_Date_On'],
                "control_Time_On" => $row_realtime['control_Time_On'],
                "control_Date_OFF" => $row_realtime['control_Date_OFF'],
                "control_Time_OFF" => $row_realtime['control_Time_OFF'],
                "control_Solenoid" => $row_realtime['control_Solenoid'],
                "control_Ai" => $row_realtime['control_Ai'],
                "resultSDMinus" => $resultSDMinus,
                "Product_Details_Day_Water_Use" => $row_Lasttime['Product_Details_Day_Water_Use'],
                "Product_Details_Month_Water_Use" => $row_Lasttime['Product_Details_Month_Water_Use'],
            );
            array_push($data_array, $data_item);
        }
    } else {
        $data_item = array(
            "message" => "0"
        );
        array_push($data_array, $data_item);
    }
} else {
    $data_item = array(
        "message" => "0"
    );
    array_push($data_array, $data_item);
}

echo json_encode($data_array);
http_response_code(200);
