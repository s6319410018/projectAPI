<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/nodemcu_write.php';

// Define the path to the log file
$logFilePath = __DIR__ . "/../log/Esp_write.log";

// Logging Function
function writeToLog($message, $logFilePath, $ipAddress) {
    $logMessage = "\n[" . date("Y-m-d H:i:s") . "] IP: $ipAddress - $message \n";
    error_log($logMessage, 3, $logFilePath);
}

$conn_DB = new ConnectDB();
$nodemcuaccess = new NODEMCU_WRITE($conn_DB->getConnectionDB());

date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d");
$time = date("H:i:s");

$data = json_decode(file_get_contents("php://input"));

$nodemcuaccess->espkey = $data->espkey;
$nodemcuaccess->flowrate = $data->flowrate;
$nodemcuaccess->pressure = $data->pressure;
$nodemcuaccess->solenoid = $data->solenoid;
$nodemcuaccess->ai_status = $data->ai_status;
$nodemcuaccess->time_status = $data->time_status;
$nodemcuaccess->d_totalwater = $data->d_totalwater;
$nodemcuaccess->m_totalwater = $data->m_totalwater;
$nodemcuaccess->date = $date;
$nodemcuaccess->time = $time;

// Get client IP address
$clientIpAddress = $_SERVER['REMOTE_ADDR'];





if( $stmt_productKey = $nodemcuaccess->NODE_GET_PRODUCT_KEY()){
    if ($stmt_productKey->rowCount()>0) {

     if($stmt_userID = $nodemcuaccess->NODE_MCU_GET_ID()){
           
        $result = $stmt_userID->fetch(PDO::FETCH_ASSOC);
        $result_user_id = $result["user_Id"];
        $nodemcuaccess->userId = $result_user_id;
        if($stmt_userID->rowCount()>0){
            $stmt_insert = $nodemcuaccess->NODE_MCU_INSERT_DATA();
            if ($stmt_insert === true) {
                http_response_code(200);
                echo "Insert successful"; // แสดงข้อความ
            } else {
                http_response_code(500);
                echo "Insert failed"; // เแสดงข้อความ
                writeToLog("Error: Failed to insert data : " . json_encode($data), $logFilePath, $clientIpAddress);
            }
        }else{
            http_response_code(503);
            echo "dont have user ID"; // เแสดงข้อความ
            writeToLog("Error: Failed to insert data : " . json_encode($data), $logFilePath, $clientIpAddress);
        }
     }
    } else {
        $nodemcuaccess->NODE_INSERT_PRODUCT_KEY();
    }
}else{
    http_response_code(503);
    echo json_encode(array("message" => "Error processing data. User not found."));
    writeToLog("Error: User not found. Details :". json_encode($data), $logFilePath, $clientIpAddress);
}



