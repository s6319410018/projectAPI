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

$data_array = array();
date_default_timezone_set('Asia/Bangkok');
$Date_Back_7 = date("Y-m-d", strtotime("-7 day"));
$Date_Back_14 = date("Y-m-d", strtotime("-14 day"));
$Date_Back_21 = date("Y-m-d", strtotime("-21 day"));
$Date_Back_28 = date("Y-m-d", strtotime("-28 day"));
//เวลาย้อนหลัง
$Time_Back_10 = date("H:i:s", strtotime("-10 minutes"));
$Time_Back_20 = date("H:i:s", strtotime("-20 minutes"));
$Time_Back_30 = date("H:i:s", strtotime("-30 minutes"));
$Time_Back_40 = date("H:i:s", strtotime("-40 minutes"));
$Time_Back_50 = date("H:i:s", strtotime("-50 minutes"));
$Time_Back_60 = date("H:i:s", strtotime("-60 minutes"));
$Time_Back_70 = date("H:i:s", strtotime("-70 minutes"));
$Time_Back_80 = date("H:i:s", strtotime("-80 minutes"));
//แปลงวันที่เป็นข้อความ
$Date_Back_7 = (string)$Date_Back_7;
$Date_Back_14 = (string)$Date_Back_14;
$Date_Back_21 = (string)$Date_Back_21;
$Date_Back_28 = (string)$Date_Back_28;
//แปลงเวลาเป็นข้อความ
$Time_Back_10 = (string)$Time_Back_10;
$Time_Back_20 = (string)$Time_Back_20;
$Time_Back_30 = (string)$Time_Back_30;
$Time_Back_40 = (string)$Time_Back_40;
$Time_Back_50 = (string)$Time_Back_50;
$Time_Back_60 = (string)$Time_Back_60;


$nodemcuaccess->Date_Back_7 = $Date_Back_7;
$nodemcuaccess->Date_Back_14 = $Date_Back_14;
$nodemcuaccess->Date_Back_21 = $Date_Back_21;
$nodemcuaccess->Date_Back_28 = $Date_Back_28;

$nodemcuaccess->Time_Back_10 = $Time_Back_10;
$nodemcuaccess->Time_Back_20 = $Time_Back_20;
$nodemcuaccess->Time_Back_30 = $Time_Back_30;
$nodemcuaccess->Time_Back_40 = $Time_Back_40;
$nodemcuaccess->Time_Back_50 = $Time_Back_50;
$nodemcuaccess->Time_Back_60 = $Time_Back_60;



$stmt_TIMEBACK_TEN_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_ONEWEEK();
$stmt_TIMEBACK_TWENTY_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK();
$stmt_TIMEBACK_THIRTY_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK();
$stmt_TIMEBACK_FORTY_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK();
$stmt_TIMEBACK_FIFTY_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK();
$stmt_TIMEBACK_SIXTY_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK();

$stmt_TIMEBACK_TEN_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_TWOWEEK();
$stmt_TIMEBACK_TWENTY_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK();
$stmt_TIMEBACK_THIRTY_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK();
$stmt_TIMEBACK_FORTY_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK();
$stmt_TIMEBACK_FIFTY_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK();
$stmt_TIMEBACK_SIXTY_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK();

$stmt_TIMEBACK_TEN_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_THREEWEEK();
$stmt_TIMEBACK_TWENTY_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK();
$stmt_TIMEBACK_THIRTY_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK();
$stmt_TIMEBACK_FORTY_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK();
$stmt_TIMEBACK_FIFTY_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK();
$stmt_TIMEBACK_SIXTY_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK();

$stmt_TIMEBACK_TEN_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_FOURWEEK();
$stmt_TIMEBACK_TWENTY_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK();
$stmt_TIMEBACK_THIRTY_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK();
$stmt_TIMEBACK_FORTY_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK();
$stmt_TIMEBACK_FIFTY_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK();
$stmt_TIMEBACK_SIXTY_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK();

$average_4_week_time_back_10 = array(
    $stmt_TIMEBACK_TEN_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TEN_ONEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TEN_TWOWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TEN_THREEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TEN_FOURWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_20 = array(
    $stmt_TIMEBACK_TWENTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_ONEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_TWOWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_THREEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_FOURWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_30 = array(
    $stmt_TIMEBACK_THIRTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_ONEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_TWOWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_THREEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_FOURWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_40 = array(
    $stmt_TIMEBACK_FORTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_ONEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_TWOWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_THREEWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_FOURWEEK->fetch_assoc()["Product_Details_Month_Pressure"] : 0,
);

$stmt_USERID = $nodemcuaccess->NODE_MCU_GET_ID();

if ($stmt_USERID->rowCount() > 0) {

    $result = $stmt_USERID->fetch(PDO::FETCH_ASSOC);
    $result_user_id = $result["user_Id"];

    $nodemcuaccess->userId = $result_user_id;
    $realtime_data = $nodemcuaccess->NODE_MCU_GET_REALTIME();
    $realtime_data->fetch(PDO::FETCH_ASSOC);
    echo json_encode($realtime_data);
    if ($realtime_data->rowCount() > 0) {
        echo json_encode("success");
    }
} else {
    echo json_encode("not success");
}

http_response_code(200);
