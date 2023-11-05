<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/realtime.php';

$conn_DB = new ConnectDB();
$realtimeaccess = new REALTIME($conn_DB->getConnectionDB());

$data = json_decode(file_get_contents("php://input"));
$realtimeaccess->userEmail = $data->userEmail;

$stmt_email = $realtimeaccess->GET_PRODUCT_FOR_EMAIL();

$data_array = array();

if ($stmt_email->rowCount() > 0) {
    $result = $stmt_email->fetch(PDO::FETCH_ASSOC);
    $user_product_id = $result["user_Product_ID"];

    $realtimeaccess->product_key = $user_product_id;
    $realtime_data = $realtimeaccess->GET_REALTIME();

    if ($realtime_data->rowCount() > 0) {
        while ($row = $realtime_data->fetch(PDO::FETCH_ASSOC)) {
            $data_item = array(
                "message" => "1",
                "realtime_Solenoid" => $row['realtime_Solenoid'],
                "realtime_AI" => $row['realtime_AI'],
                "realtime_Time" => $row['realtime_Time'],
                "realtime_Flowrate" => $row['realtime_Flowrate'],
                "realtime_Pressure" => $row['realtime_Pressure'],
                "user_Name" => $row['user_Name'],
                "user_Address" => $row['user_Address'],
                "user_Phone" => $row['user_Phone'],
                "user_Email" => $row['user_Email'],
                "user_Product_ID" => $row['user_Product_ID'],
                "Product_Details_Month_Water_Use" => $row['Product_Details_Month_Water_Use'],
                "Product_Details_Day_Water_Use" => $row['Product_Details_Day_Water_Use'],
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
?>
