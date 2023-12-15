<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/nodemcu_read_test.php';

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
$Time_Now = date("H");
$data_array = array();
//แปลงวันที่เป็นข้อความ
$Date_Back_One_Week = (string)$Date_Back_One_Week;
$Date_Back_Two_Week = (string)$Date_Back_Two_Week;
$Date_Back_Three_Week = (string)$Date_Back_Three_Week;
$Date_Back_Four_Week = (string)$Date_Back_Four_Week;
//แปลงเวลาเป็นข้อความ
$Time_Now = (string)$Time_Now;

//นำตัวแปรที่เป็น JSON ส่งไปให้ตัวแปรที่อยู่ใน Class
$nodemcuaccess->espkey = $data->espkey;

//นำตัวแปรจาก TIME SERVER ส่งไปให้ตัวแปรที่อยู่ใน Class
$nodemcuaccess->Date_Back_One_Week = $Date_Back_One_Week;
$nodemcuaccess->Date_Back_Two_Week = $Date_Back_Two_Week;
$nodemcuaccess->Date_Back_Three_Week = $Date_Back_Three_Week;
$nodemcuaccess->Date_Back_Four_Week = $Date_Back_Four_Week;

$nodemcuaccess->Time_Now = $Time_Now;

///////////////////////////////////////////////////////////////////////

$stmt_TIME_NOW_ONEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIME_NOW_ONEWEEK();
$stmt_TIME_NOW_TWOWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIME_NOW_TWOWEEK();
$stmt_TIME_NOW_THREEWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIME_NOW_THREEWEEK();
$stmt_TIME_NOW_FOURWEEK = $nodemcuaccess->NODE_MCU_GET_DATA_TIME_NOW_THREEWEEK();

$fetch_stmt_average_time_now_ONEWEEK = $stmt_TIME_NOW_ONEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_average_time_now_TWOWEEK = $stmt_TIME_NOW_TWOWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_average_time_now_THREEWEEK = $stmt_TIME_NOW_THREEWEEK->fetch(PDO::FETCH_ASSOC);
$fetch_stmt_average_time_now_FOURWEEK = $stmt_TIME_NOW_FOURWEEK->fetch(PDO::FETCH_ASSOC);

$average_four_week_time_back_now = array(
    $fetch_stmt_average_time_now_ONEWEEK["average_pressure"] > 0 ? $fetch_stmt_average_time_now_ONEWEEK["average_pressure"] : 0,
    $fetch_stmt_average_time_now_TWOWEEK["average_pressure"] > 0 ? $fetch_stmt_average_time_now_TWOWEEK["average_pressure"] : 0,
    $fetch_stmt_average_time_now_THREEWEEK["average_pressure"] > 0 ? $fetch_stmt_average_time_now_THREEWEEK["average_pressure"] : 0,
    $fetch_stmt_average_time_now_FOURWEEK["average_pressure"] > 0 ? $fetch_stmt_average_time_now_FOURWEEK["average_pressure"] : 0,
);

//นำค่าที่ได้มาหาค่าเฉลี่ย
$x_bar_four_week = array_sum($average_four_week_time_back_now) / count($average_four_week_time_back_now);

$squaredDifferences = array_map(function ($value) use ($x_bar_four_week) {
    return ($value - $x_bar_four_week) ** 2;
}, $average_four_week_time_back_now);

$variance = array_sum($squaredDifferences) / (count($squaredDifferences) - 1);
$standardDeviation = sqrt($variance);

//ขอบบน
$resultSDPlus = $x_bar_four_week + $standardDeviation;
//ขอบล่าง
$resultSDMinus = $x_bar_four_week - $standardDeviation;
//ทศนิยมสองตำแห่น่ง
$resultSDMinus = round($resultSDMinus, 2);

//นำesp ไปหา ว่ามีID ผู้ใช้หร้อไม่
$stmt_USERID = $nodemcuaccess->NODE_MCU_GET_ID();
$stmt_LASTTIME = $nodemcuaccess->NODE_MCU_GET_LAST_TIME();


//ดึงข้อมูลมาใช้
$result_USERID = $stmt_USERID->fetch(PDO::FETCH_ASSOC);
$result_LASTTIME = $stmt_LASTTIME->fetch(PDO::FETCH_ASSOC);


if($result_USERID != null){//ถ้ามีID ผู้ใช้
    $result_user_id= $result_USERID["user_Id"]; //ID ผู้ใช้เก็บไว้ในตัวแปร
    $nodemcuaccess->userId = $result_user_id; //นำตัวแปรส่งไปไปให้ตัวแปรในโม
 
    if ($stmt_REALTIME = $nodemcuaccess->NODE_MCU_GET_REALTIME()) {
        $data_item = array(
            "control_Date_On" => $stmt_REALTIME[0]['control_Date_On'],
            "control_Date_OFF" => $stmt_REALTIME[0]['control_Date_OFF'],
            "control_Time_On" => $stmt_REALTIME[0]['control_Time_On'],
            "control_Time_OFF" => $stmt_REALTIME[0]['control_Time_OFF'],
            "control_Solenoid" => $stmt_REALTIME[0]['control_Solenoid'],
            "control_Ai" => $stmt_REALTIME[0]['control_Ai'],
            "resultSDMinus" => $resultSDMinus,
            "Product_Details_Day_Water_Use" => $result_LASTTIME["Product_Details_Day_Water_Use"],
            "Product_Details_Month_Water_Use" => $result_LASTTIME["Product_Details_Month_Water_Use"],

        );
    } else {
        $data_item = array(
            "message" => "0"
        );
        echo json_encode("massge error");
    }
    array_push($data_array, $data_item);
}else{
   echo json_encode("NO_USER_ID");
}


echo json_encode($data_array);
http_response_code(200);
?>
