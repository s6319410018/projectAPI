<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");

include_once './../connect_db.php';
include_once './../model/data_from_table.php';

$conn_DB = new ConnectDB();
$data_table = new DATATABLE($conn_DB->getConnectionDB());

$data = json_decode(file_get_contents("php://input"));
$data_table->userEmail = $data->userEmail;


$stmt_email = $data_table->GET_PRODUCT_FOR_EMAIL();

$data_array = array();

if ($stmt_email->rowCount() > 0) {
    $result = $stmt_email->fetch(PDO::FETCH_ASSOC);
    $user_product_id = $result["user_Product_ID"];

    $data_table->product_key = $user_product_id;
    $realtime_data = $data_table->GET_DATA();

    if ($realtime_data->rowCount() > 0) {
        while ($row = $realtime_data->fetch(PDO::FETCH_ASSOC)) {
            $data_item = array(
                "message" => "1",
                "Product_Details_Month_Id" => $row['Product_Details_Month_Id'],
                "Product_Details_Month_Flowrate" => $row['Product_Details_Month_Flowrate'],
                "Product_Details_Month_Pressure" => $row['Product_Details_Month_Pressure'],
                "Product_Details_Month_Water_Use" => $row['Product_Details_Month_Water_Use'],
                "Product_Details_Result_Solenoid" => $row['Product_Details_Result_Solenoid'],
                "Product_Details_Result_Time" => $row['Product_Details_Result_Time'],
                "Product_Details_Result_Ai" => $row['Product_Details_Result_Ai'],
                "date" => $row['date'],
                "time" => $row['time'],
                "product_key" => $row['product_key'],
             
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

