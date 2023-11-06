<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/nodemcu_read.php';

$conn_DB = new ConnectDB();
$nodemcuaccess = new NODEMCU_READ($conn_DB->getConnectionDB());

$data = json_decode(file_get_contents("php://input"));

date_default_timezone_set('Asia/Bangkok');
//วันย้อนหลัง
$Date_Back_One_Week = date("Y-m-d", strtotime("-7 day"));
$Date_Back_Two_Week = date("Y-m-d", strtotime("-14 day"));
$Date_Back_Three_Week = date("Y-m-d", strtotime("-21 day"));
$Date_Back_Four_Week = date("Y-m-d", strtotime("-28 day"));
//เวลาย้อนหลัง
$Time_Back_Ten = date("H:i:s", strtotime("-10 minutes"));
$Time_Back_Twenty = date("H:i:s", strtotime("-20 minutes"));
$Time_Back_Thirty = date("H:i:s", strtotime("-30 minutes"));
$Time_Back_Forty = date("H:i:s", strtotime("-40 minutes"));
$Time_Back_Fifty = date("H:i:s", strtotime("-50 minutes"));
$Time_Back_Sixty = date("H:i:s", strtotime("-60 minutes"));

//แปลงวันที่เป็นข้อความ
$Date_Back_One_Week = (string)$Date_Back_One_Week;
$Date_Back_Two_Week = (string)$Date_Back_Two_Week;
$Date_Back_Three_Week = (string)$Date_Back_Three_Week;
$Date_Back_Four_Week = (string)$Date_Back_Four_Week;
//แปลงเวลาเป็นข้อความ
$Time_Back_Ten = (string)$Time_Back_Ten;
$Time_Back_Twenty = (string)$Time_Back_Twenty;
$Time_Back_Thirty = (string)$Time_Back_Thirty;
$Time_Back_Forty = (string)$Time_Back_Forty;
$Time_Back_Fifty = (string)$Time_Back_Fifty;
$Time_Back_Sixty = (string)$Time_Back_Sixty;


//นำตัวแปรที่เป็นjson ส่งไปให้ตัวแปรที่อยู่ใน Class
$nodemcuaccess->espkey = $data->espkey;

//นำตัวแปรจาก TIME SERVER ส่งไปให้ตัวแปรที่อยู่ใน Class
$nodemcuaccess->Date_Back_One_Week = $Date_Back_One_Week;
$nodemcuaccess->Date_Back_Two_Week = $Date_Back_Two_Week;
$nodemcuaccess->Date_Back_Three_Week = $Date_Back_Three_Week;
$nodemcuaccess->Date_Back_Four_Week = $Date_Back_Four_Week;

$nodemcuaccess->Time_Back_Ten = $Time_Back_Ten;
$nodemcuaccess->Time_Back_Twenty = $Time_Back_Twenty;
$nodemcuaccess->Time_Back_Thirty = $Time_Back_Thirty;
$nodemcuaccess->Time_Back_Forty = $Time_Back_Forty;
$nodemcuaccess->Time_Back_Fifty = $Time_Back_Fifty;
$nodemcuaccess->Time_Back_Sixty = $Time_Back_Sixty;







///////////////////////////////////////////////////////////////////////////////////
$Date_Back_One_Week_January = date("2023-01-d", strtotime("-7 days"));
$Date_Back_Two_Week_January  = date("2023-01-d", strtotime("-7 days"));
$Date_Back_Three_Week_January  = date("2023-01-d", strtotime("-7 days"));
$Date_Back_Four_Week_January  = date("2023-01-d", strtotime("-7 days"));
$Time_Back_Ten_January  = date("H:i:00", strtotime("-10 minutes"));
$Time_Back_Twenty_January  = date("H:i:00", strtotime("-20 minutes"));
$Time_Back_Thirty_January  = date("H:i:00", strtotime("-30 minutes"));
$Time_Back_Forty_January  = date("H:i:00", strtotime("-40 minutes"));
$Time_Back_Fifty_January  = date("H:i:00", strtotime("-50 minutes"));
$Time_Back_Sixty_January  = date("H:i:00", strtotime("-60 minutes"));




//แปลงวันที่เป็นข้อความ
$Date_Back_One_Week_January  = (string)$Date_Back_One_Week_January ;
$Date_Back_Two_Week_January  = (string)$Date_Back_Two_Week_January ;
$Date_Back_Three_Week_January  = (string)$Date_Back_Three_Week_January ;
$Date_Back_Four_Week_January  = (string)$Date_Back_Four_Week_January ;
//แปลงเวลาเป็นข้อความ
$Time_Back_Ten_January  = (string)$Time_Back_Ten_January ;
$Time_Back_Twenty_January  = (string)$Time_Back_Twenty_January ;
$Time_Back_Thirty_January  = (string)$Time_Back_Thirty_January ;
$Time_Back_Forty_January  = (string)$Time_Back_Forty_January ;
$Time_Back_Fifty_January  = (string)$Time_Back_Fifty_January ;
$Time_Back_Sixty_January  = (string)$Time_Back_Sixty_January ;


$nodemcuaccess->Date_Back_One_Week_January = $Date_Back_One_Week_January;
$nodemcuaccess->Date_Back_Two_Week_January = $Date_Back_Two_Week_January;
$nodemcuaccess->Date_Back_Three_Week_January = $Date_Back_Three_Week_January;
$nodemcuaccess->Date_Back_Four_Week_January = $Date_Back_Four_Week_January;

$nodemcuaccess->Time_Back_Ten_January = $Time_Back_Ten_January;
$nodemcuaccess->Time_Back_Twenty_January = $Time_Back_Twenty_January;
$nodemcuaccess->Time_Back_Thirty_January = $Time_Back_Thirty_January;
$nodemcuaccess->Time_Back_Forty_January = $Time_Back_Forty_January;
$nodemcuaccess->Time_Back_Fifty_January = $Time_Back_Fifty_January;
$nodemcuaccess->Time_Back_Sixty_January = $Time_Back_Sixty_January;



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



$fetch_stmt_TIMEBACK_TEN_ONEWEEK = $stmt_TIMEBACK_TEN_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TEN_TWOWEEK = $stmt_TIMEBACK_TEN_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TEN_THREEWEEK = $stmt_TIMEBACK_TEN_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TEN_FOURWEEK = $stmt_TIMEBACK_TEN_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$fetch_stmt_TIMEBACK_TWENTY_ONEWEEK = $stmt_TIMEBACK_TWENTY_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TWENTY_TWOWEEK = $stmt_TIMEBACK_TWENTY_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TWENTY_THREEWEEK = $stmt_TIMEBACK_TWENTY_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_TWENTY_FOURWEEK = $stmt_TIMEBACK_TWENTY_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$fetch_stmt_TIMEBACK_THIRTY_ONEWEEK = $stmt_TIMEBACK_THIRTY_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_THIRTY_TWOWEEK = $stmt_TIMEBACK_THIRTY_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_THIRTY_THREEWEEK = $stmt_TIMEBACK_THIRTY_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_THIRTY_FOURWEEK = $stmt_TIMEBACK_THIRTY_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$fetch_stmt_TIMEBACK_FORTY_ONEWEEK = $stmt_TIMEBACK_FORTY_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FORTY_TWOWEEK = $stmt_TIMEBACK_FORTY_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FORTY_THREEWEEK = $stmt_TIMEBACK_FORTY_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FORTY_FOURWEEK = $stmt_TIMEBACK_FORTY_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$fetch_stmt_TIMEBACK_FIFTY_ONEWEEK = $stmt_TIMEBACK_FIFTY_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FIFTY_TWOWEEK = $stmt_TIMEBACK_FIFTY_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FIFTY_THREEWEEK = $stmt_TIMEBACK_FIFTY_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_FIFTY_FOURWEEK = $stmt_TIMEBACK_FIFTY_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$fetch_stmt_TIMEBACK_SIXTY_ONEWEEK = $stmt_TIMEBACK_SIXTY_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_SIXTY_TWOWEEK = $stmt_TIMEBACK_SIXTY_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_SIXTY_THREEWEEK = $stmt_TIMEBACK_SIXTY_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_TIMEBACK_SIXTY_FOURWEEK = $stmt_TIMEBACK_SIXTY_FOURWEEK->fetch(PDO::FETCH_ASSOC);


$average_four_week_time_back_ten = array(
    $fetch_stmt_TIMEBACK_TEN_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_TEN_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TEN_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_TEN_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TEN_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_TEN_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TEN_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_TEN_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);
$average_four_week_time_back_twenty = array(
    $fetch_stmt_TIMEBACK_TWENTY_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_TWENTY_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TWENTY_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_TWENTY_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TWENTY_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_TWENTY_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_TWENTY_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_TWENTY_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);
$average_four_week_time_back_thirty = array(
    $fetch_stmt_TIMEBACK_THIRTY_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_THIRTY_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_THIRTY_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_THIRTY_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_THIRTY_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_THIRTY_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_THIRTY_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_THIRTY_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);
$average_four_week_time_back_forty = array(
    $fetch_stmt_TIMEBACK_FORTY_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_FORTY_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FORTY_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_FORTY_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FORTY_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_FORTY_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FORTY_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_FORTY_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);
$average_four_week_time_back_fifty = array(
    $fetch_stmt_TIMEBACK_FIFTY_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_FIFTY_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FIFTY_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_FIFTY_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FIFTY_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_FIFTY_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_FIFTY_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_FIFTY_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);
$average_four_week_time_back_sixty = array(
    $fetch_stmt_TIMEBACK_SIXTY_ONEWEEK > 0 ? $fetch_stmt_TIMEBACK_SIXTY_ONEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_SIXTY_TWOWEEK > 0 ? $fetch_stmt_TIMEBACK_SIXTY_TWOWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_SIXTY_THREEWEEK > 0 ? $fetch_stmt_TIMEBACK_SIXTY_THREEWEEK["Product_Details_Month_Pressure"] : 0,
    $fetch_stmt_TIMEBACK_SIXTY_FOURWEEK > 0 ? $fetch_stmt_TIMEBACK_SIXTY_FOURWEEK["Product_Details_Month_Pressure"] : 0,

);




//หาค่าเฉลี่ยรายรายชั่วโมง 4 สัปดาห์
$x_bar_four_week_time_back_ten = array_sum($average_four_week_time_back_ten) / count($average_four_week_time_back_ten);
$x_bar_four_week_time_back_twenty = array_sum($average_four_week_time_back_twenty) / count($average_four_week_time_back_twenty);
$x_bar_four_week_time_back_thirty = array_sum($average_four_week_time_back_thirty) / count($average_four_week_time_back_thirty);
$x_bar_four_week_time_back_forty = array_sum($average_four_week_time_back_forty) / count($average_four_week_time_back_forty);
$x_bar_four_week_time_back_fifty = array_sum($average_four_week_time_back_fifty) / count($average_four_week_time_back_fifty);
$x_bar_four_week_time_back_sixty = array_sum($average_four_week_time_back_sixty) / count($average_four_week_time_back_sixty);

//เช็คค่าที่ได้
$value_four_week = array(
    $x_bar_four_week_time_back_ten > 0 ? $average_four_week_time_back_ten : 0,
    $x_bar_four_week_time_back_twenty > 0 ? $average_four_week_time_back_twenty : 0,
    $x_bar_four_week_time_back_thirty > 0 ? $average_four_week_time_back_thirty : 0,
    $x_bar_four_week_time_back_forty > 0 ? $average_four_week_time_back_forty : 0,
    $x_bar_four_week_time_back_fifty > 0 ? $average_four_week_time_back_fifty : 0,
    $x_bar_four_week_time_back_sixty > 0 ? $average_four_week_time_back_sixty : 0,


);

//นำค่าที่ได้มาหาค่าเฉลี่ย
$x_bar_four_week = array_sum($value_four_week) / count($value_four_week);

$squaredDifferences = array_map(function ($value_four_week) use ($x_bar_four_week) {
    return ($value_four_week - $x_bar_four_week) ** 2;
}, $value_four_week);
$variance = array_sum($squaredDifferences) / (count($squaredDifferences) - 1);
$standardDeviation = sqrt($variance);

//ขอบบน
$resultSDPlus =   $x_bar_four_week + $standardDeviation;
//ขอบล่าง
$resultSDMinus =   $x_bar_four_week - $standardDeviation;
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

        $fetch_stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY = $stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY = $stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY = $stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY = $stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);

        $fetch_stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY = $stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY = $stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY = $stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY = $stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);

        $fetch_stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY = $stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY = $stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY = $stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY = $stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);

        $fetch_stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY = $stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY = $stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY = $stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY = $stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);

        $fetch_stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY = $stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY = $stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY = $stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);
        $fetch_stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY = $stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY->fetch(PDO::FETCH_ASSOC);






        $average_four_week_time_back_ten_january = array(
            $fetch_stmt_TIMEBACK_TEN_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TEN_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TEN_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TEN_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TEN_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        $average_four_week_time_back_twenty_january = array(
            $fetch_stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TWENTY_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TWENTY_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TWENTY_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_TWENTY_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        $average_four_week_time_back_thirty_january = array(
            $fetch_stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_THIRTY_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_THIRTY_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_THIRTY_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_THIRTY_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        $average_four_week_time_back_forty_january = array(
            $fetch_stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FORTY_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FORTY_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FORTY_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FORTY_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        $average_four_week_time_back_fifty_january = array(
            $fetch_stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FIFTY_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FIFTY_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FIFTY_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_FIFTY_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );
        $average_four_week_time_back_sixty_january = array(
            $fetch_stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_SIXTY_ONEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_SIXTY_TWOWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_SIXTY_THREEWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,
            $fetch_stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY > 0 ? $fetch_stmt_TIMEBACK_SIXTY_FOURWEEK_JANUARY["Product_Details_Month_Pressure"] : 0,

        );







        //หาค่าเฉลี่ยรายรายชั่วโมง 4 สัปดาห์
        $x_bar_four_week_time_back_ten_january = array_sum($average_four_week_time_back_ten_january) / count($average_four_week_time_back_ten_january);
        $x_bar_four_week_time_back_twenty_january = array_sum($average_four_week_time_back_twenty_january) / count($average_four_week_time_back_twenty_january);
        $x_bar_four_week_time_back_thirty_january = array_sum($average_four_week_time_back_thirty_january) / count($average_four_week_time_back_thirty_january);
        $x_bar_four_week_time_back_forty_january = array_sum($average_four_week_time_back_forty_january) / count($average_four_week_time_back_forty_january);
        $x_bar_four_week_time_back_fifty_january = array_sum($average_four_week_time_back_fifty_january) / count($average_four_week_time_back_fifty_january);
        $x_bar_four_week_time_back_sixty_january = array_sum($average_four_week_time_back_sixty_january) / count($average_four_week_time_back_sixty_january);


        //เช็คค่าที่ได้
        $value_four_week_january = array(
            $x_bar_four_week_time_back_ten_january > 0 ? $x_bar_four_week_time_back_ten_january : 0,
            $x_bar_four_week_time_back_twenty_january > 0 ? $x_bar_four_week_time_back_twenty_january : 0,
            $x_bar_four_week_time_back_thirty_january > 0 ? $x_bar_four_week_time_back_thirty_january : 0,
            $x_bar_four_week_time_back_forty_january > 0 ? $x_bar_four_week_time_back_forty_january : 0,
            $x_bar_four_week_time_back_fifty_january > 0 ? $x_bar_four_week_time_back_fifty_january : 0,
            $x_bar_four_week_time_back_sixty_january > 0 ? $x_bar_four_week_time_back_sixty_january : 0,


        );



        //นำค่าที่ได้มาหาค่าเฉลี่ย
        $x_bar_four_week_january = array_sum($value_four_week_january) / count($value_four_week_january);


        $squaredDifferences_january = array_map(function ($value_four_week_january) use ($x_bar_four_week_january) {
            return ($value_four_week_january - $x_bar_four_week_january) ** 2;
        }, $value_four_week_january);


        $variance_january = array_sum($squaredDifferences_january) / (count($squaredDifferences_january) - 1);
        $standardDeviation_january = sqrt($variance_january);

        //ขอบบน
        $resultSDPlus_january =  $x_bar_four_week_january + $standardDeviation_january;
        //ขอบล่าง
        $resultSDMinus_january =  $x_bar_four_week_january - $standardDeviation_january;
        $resultSDMinus_january_abs = abs($resultSDMinus_january);
        $resultSDMinus_january_format = round($resultSDMinus_january_abs, 2);

        $lasttime = $stmt_LASTTIME->fetch(PDO::FETCH_ASSOC);
        $data_item = array(
            "control_Date_On" => $realtime_data[0]['control_Date_On'],
            "control_Date_OFF" => $realtime_data[0]['control_Date_OFF'],
            "control_Time_On" => $realtime_data[0]['control_Time_On'],
            "control_Time_OFF" => $realtime_data[0]['control_Time_OFF'],
            "control_Solenoid" => $realtime_data[0]['control_Solenoid'],
            "control_Ai" => $realtime_data[0]['control_Ai'],
            "resultSDMinus" => $resultSDMinus_january_format,
            "Product_Details_Day_Water_Use" => $lasttime["Product_Details_Day_Water_Use"],
            "Product_Details_Month_Water_Use" => $lasttime["Product_Details_Month_Water_Use"],

        );
    } else {

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