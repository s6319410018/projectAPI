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

date_default_timezone_set('Asia/Bangkok');
//วันย้อนหลัง
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


//นำตัวแปรที่เป็นjson ส่งไปให้ตัวแปรที่อยู่ใน Class
$nodemcuaccess->espkey = $data->espkey;

//นำตัวแปรจาก TIME SERVER ส่งไปให้ตัวแปรที่อยู่ใน Class
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
///////////////////////////////////////////////////////////////////////////////////
$Date_january_back_7day = date("2023-01-d", strtotime("-7 days"));
$Date_january_back_14day = date("2023-01-d", strtotime("-7 days"));
$Date_january_back_21day = date("2023-01-d", strtotime("-7 days"));
$Date_january_back_28day = date("2023-01-d", strtotime("-7 days"));
$Time_Back_10_format = date("H:i:00", strtotime("-10 minutes"));
$Time_Back_20_format = date("H:i:00", strtotime("-20 minutes"));
$Time_Back_30_format = date("H:i:00", strtotime("-30 minutes"));
$Time_Back_40_format = date("H:i:00", strtotime("-40 minutes"));
$Time_Back_50_format = date("H:i:00", strtotime("-50 minutes"));
$Time_Back_60_format = date("H:i:00", strtotime("-60 minutes"));


$Date_january_back_7day = (string)$Date_january_back_7day;
$Date_january_back_14day = (string)$Date_january_back_14day;
$Date_january_back_21day = (string)$Date_january_back_21day;
$Date_january_back_28day = (string)$Date_january_back_28day;

$Time_Back_10_format = (string)$Time_Back_10_format;
$Time_Back_20_format = (string)$Time_Back_20_format;
$Time_Back_30_format = (string)$Time_Back_30_format;
$Time_Back_40_format = (string)$Time_Back_40_format;
$Time_Back_50_format = (string)$Time_Back_50_format;
$Time_Back_60_format = (string)$Time_Back_60_format;


$nodemcuaccess->Date_Back_7_january = $Date_january_back_7day;
$nodemcuaccess->Date_Back_14_january = $Date_january_back_14day;
$nodemcuaccess->Date_Back_21_january = $Date_january_back_21day;
$nodemcuaccess->Date_Back_28_january = $Date_january_back_28day;

$nodemcuaccess->Time_Back_10_january = $Time_Back_10_format;
$nodemcuaccess->Time_Back_20_january = $Time_Back_20_format;
$nodemcuaccess->Time_Back_30_january = $Time_Back_30_format;
$nodemcuaccess->Time_Back_40_january = $Time_Back_40_format;
$nodemcuaccess->Time_Back_50_january = $Time_Back_50_format;
$nodemcuaccess->Time_Back_60_january = $Time_Back_60_format;
///////////////////////////////////////////////////////////////////////


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



$data_array = array();

$average_4_week_time_back_10 = array(
    $stmt_TIMEBACK_TEN_ONEWEEK->rowCount()     > 0 ? $stmt_TIMEBACK_TEN_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_TWOWEEK->rowCount()     > 0 ? $stmt_TIMEBACK_TEN_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TEN_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TEN_FOURWEEK->rowCount()    > 0 ? $stmt_TIMEBACK_TEN_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_20 = array(
    $stmt_TIMEBACK_TWENTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_TWENTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_TWENTY_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_30 = array(
    $stmt_TIMEBACK_THIRTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_THIRTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_THIRTY_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_40 = array(
    $stmt_TIMEBACK_FORTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FORTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FORTY_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_50 = array(
    $stmt_TIMEBACK_FIFTY_ONEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FIFTY_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FIFTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FIFTY_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FIFTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FIFTY_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_FIFTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_FIFTY_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);
$average_4_week_time_back_60 = array(
    $stmt_TIMEBACK_SIXTY_ONEWEEK->rowCount()  > 0 ? $stmt_TIMEBACK_SIXTY_ONEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_SIXTY_TWOWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_SIXTY_TWOWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_SIXTY_THREEWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_SIXTY_THREEWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
    $stmt_TIMEBACK_SIXTY_FOURWEEK->rowCount()   > 0 ? $stmt_TIMEBACK_SIXTY_FOURWEEK->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
);


//หาค่าเฉลี่ยรายรายชั่วโมง 4 สัปดาห์
$x_bar_4_week_time_back_10 = array_sum($average_4_week_time_back_10) / count($average_4_week_time_back_10);
$x_bar_4_week_time_back_20 = array_sum($average_4_week_time_back_20) / count($average_4_week_time_back_20);
$x_bar_4_week_time_back_30 = array_sum($average_4_week_time_back_30) / count($average_4_week_time_back_30);
$x_bar_4_week_time_back_40 = array_sum($average_4_week_time_back_40) / count($average_4_week_time_back_40);
$x_bar_4_week_time_back_50 = array_sum($average_4_week_time_back_50) / count($average_4_week_time_back_50);
$x_bar_4_week_time_back_60 = array_sum($average_4_week_time_back_60) / count($average_4_week_time_back_60);

//เช็คค่าที่ได้
$value_4_week = array(
    $x_bar_4_week_time_back_10 > 0 ? $x_bar_4_week_time_back_10 : 0,
    $x_bar_4_week_time_back_20 > 0 ? $x_bar_4_week_time_back_20 : 0,
    $x_bar_4_week_time_back_30 > 0 ? $x_bar_4_week_time_back_30 : 0,
    $x_bar_4_week_time_back_40 > 0 ? $x_bar_4_week_time_back_40 : 0,
    $x_bar_4_week_time_back_50 > 0 ? $x_bar_4_week_time_back_50 : 0,
    $x_bar_4_week_time_back_60 > 0 ? $x_bar_4_week_time_back_60 : 0,


);

//นำค่าที่ได้มาหาค่าเฉลี่ย
$x_bar_4_week = array_sum($value_4_week) / count($value_4_week);

$squaredDifferences = array_map(function ($value_4_week) use ($x_bar_4_week) {
    return ($value_4_week - $x_bar_4_week) ** 2;
}, $value_4_week);
$variance = array_sum($squaredDifferences) / (count($squaredDifferences) - 1);
$standardDeviation = sqrt($variance);

//ขอบบน
$resultSDPlus =   $x_bar_4_week + $standardDeviation;
//ขอบล่าง
$resultSDMinus =   $x_bar_4_week - $standardDeviation;
$resultSDMinus = round($resultSDMinus, 2);


//เรียกใช้งานFunction NODE_MCU_GET_ID เพื่อนำ user_ID  ไป Quary
$stmt_USERID = $nodemcuaccess->NODE_MCU_GET_ID();

$stmt_LASTTIME = $nodemcuaccess->NODE_MCU_GET_LAST_TIME();

if ($stmt_USERID->rowCount() > 0) {
    $result = $stmt_USERID->fetch(PDO::FETCH_ASSOC);


    $result_user_id = $result["user_Id"];
    $nodemcuaccess->userId = $result_user_id;

    if ($resultSDMinus == 0 &&  $realtime_data = $nodemcuaccess->NODE_MCU_GET_REALTIME()) {



        $stmt_TIMEBACK_TEN_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_ONEWEEK_JANUARY();
        $stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK_JANUARY();
        $stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK_JANUARY();
        $stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK_JANUARY();
        $stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK_JANUARY();
        $stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK_JANUARY();

        $stmt_TIMEBACK_TEN_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_TWOWEEK_JANUARY();
        $stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK_JANUARY();
        $stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK_JANUARY();
        $stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK_JANUARY();
        $stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK_JANUARY();
        $stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK_JANUARY();

        $stmt_TIMEBACK_TEN_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_THREEWEEK();
        $stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK_JANUARY();
        $stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK_JANUARY();
        $stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK_JANUARY();
        $stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK_JANUARY();
        $stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK_JANUARY();

        $stmt_TIMEBACK_TEN_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TEN_FOURWEEK_JANUARY();
        $stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK_JANUARY();
        $stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK_JANUARY();
        $stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK_JANUARY();
        $stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK_JANUARY();
        $stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY = $nodemcuaccess->NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK_JANUARY();




        $fetch_stmt_TIMEBACK_TEN_ONEWEEK_JANUARY = $stmt_TIMEBACK_TEN_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TEN_TWOWEEK_JANUARY = $stmt_TIMEBACK_TEN_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TEN_THREEWEEK_JANUARY = $stmt_TIMEBACK_TEN_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY = $stmt_TIMEBACK_TEN_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);


        echo json_encode($fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY);

        $average_4_week_time_back_10_january = array(
            $fetch_stmt_TIMEBACK_TEN_ONEWEEK_JANUARY != 0 ? $fetch_stmt_TIMEBACK_TEN_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_TWOWEEK_JANUARY != 0 ? $fetch_stmt_TIMEBACK_TEN_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_THREEWEEK_JANUARY != 0 ? $fetch_stmt_TIMEBACK_TEN_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY != 0 ? $fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        echo json_encode($average_4_week_time_back_10_january);

        $average_4_week_time_back_20_january = array(
            ($stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0
        );

        $average_4_week_time_back_30_january = array(
            ($stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0
        );

        $average_4_week_time_back_40_january = array(
            ($stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0
        );

        $average_4_week_time_back_50_january = array(
            ($stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0
        );

        $average_4_week_time_back_60_january = array(
            ($stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0,
            ($stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY->rowCount() > 0) ? $stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC)["Product_Details_Month_Pressure"] : 0
        );



        //หาค่าเฉลี่ยรายรายชั่วโมง 4 สัปดาห์
        $x_bar_4_week_time_back_10_january = array_sum($average_4_week_time_back_10_january) / count($average_4_week_time_back_10_january);
        $x_bar_4_week_time_back_20_january = array_sum($average_4_week_time_back_20_january) / count($average_4_week_time_back_20_january);
        $x_bar_4_week_time_back_30_january = array_sum($average_4_week_time_back_30_january) / count($average_4_week_time_back_30_january);
        $x_bar_4_week_time_back_40_january = array_sum($average_4_week_time_back_40_january) / count($average_4_week_time_back_40_january);
        $x_bar_4_week_time_back_50_january = array_sum($average_4_week_time_back_50_january) / count($average_4_week_time_back_50_january);
        $x_bar_4_week_time_back_60_january = array_sum($average_4_week_time_back_60_january) / count($average_4_week_time_back_60_january);


        //เช็คค่าที่ได้
        $value_4_week_january = array(
            $x_bar_4_week_time_back_10_january > 0 ? $x_bar_4_week_time_back_10_january : 0,
            $x_bar_4_week_time_back_20_january > 0 ? $x_bar_4_week_time_back_20_january : 0,
            $x_bar_4_week_time_back_30_january > 0 ? $x_bar_4_week_time_back_30_january : 0,
            $x_bar_4_week_time_back_40_january > 0 ? $x_bar_4_week_time_back_40_january : 0,
            $x_bar_4_week_time_back_50_january > 0 ? $x_bar_4_week_time_back_50_january : 0,
            $x_bar_4_week_time_back_60_january > 0 ? $x_bar_4_week_time_back_60_january : 0,


        );



        //นำค่าที่ได้มาหาค่าเฉลี่ย
        $x_bar_4_week_january = array_sum($value_4_week_january) / count($value_4_week_january);

        $squaredDifferences_january = array_map(function ($value_4_week_january) use ($x_bar_4_week_january) {
            return ($value_4_week_january - $x_bar_4_week_january) ** 2;
        }, $value_4_week_january);
        $variance_january = array_sum($squaredDifferences_january) / (count($squaredDifferences_january) - 1);
        $standardDeviation_january = sqrt($variance_january);

        //ขอบบน
        $resultSDPlus_january =  $x_bar_4_week_january + $standardDeviation_january;
        //ขอบล่าง
        $resultSDMinus_january =  $x_bar_4_week_january - $standardDeviation_january;
        $resultSDMinus_january = round($resultSDMinus_january, 2);

        $lasttime = $stmt_LASTTIME->fetch(PDO::FETCH_ASSOC);
        echo "บน";
        $data_item = array(
            "control_Date_On" => $realtime_data[0]['control_Date_On'],
            "control_Date_OFF" => $realtime_data[0]['control_Date_OFF'],
            "control_Time_On" => $realtime_data[0]['control_Time_On'],
            "control_Time_OFF" => $realtime_data[0]['control_Time_OFF'],
            "control_Solenoid" => $realtime_data[0]['control_Solenoid'],
            "control_Ai" => $realtime_data[0]['control_Ai'],
            "resultSDMinus" => $resultSDMinus,
            "Product_Details_Day_Water_Use" => $lasttime["Product_Details_Day_Water_Use"],
            "Product_Details_Month_Water_Use" => $lasttime["Product_Details_Month_Water_Use"],

        );
    } else {
        echo "ล่าง";
        $data_item = array(
            "control_Date_On" => $realtime_data[0]['control_Date_On'],
            "control_Date_OFF" => $realtime_data[0]['control_Date_OFF'],
            "control_Time_On" => $realtime_data[0]['control_Time_On'],
            "control_Time_OFF" => $realtime_data[0]['control_Time_OFF'],
            "control_Solenoid" => $realtime_data[0]['control_Solenoid'],
            "control_Ai" => $realtime_data[0]['control_Ai'],
            "resultSDMinus" => $resultSDMinus,
            "Product_Details_Day_Water_Use" => $lasttime["Product_Details_Day_Water_Use"],
            "Product_Details_Month_Water_Use" => $lasttime["Product_Details_Month_Water_Use"],

        );
    }

    array_push($data_array, $data_item);
} else {
    $data_item = array(
        "message" => "0"
    );
    array_push($data_array, $data_item);
}




echo json_encode($data_array);
http_response_code(200);
