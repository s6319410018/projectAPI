<?php

class REALTIME {
    private $connDB;

    public function __construct($connDB) {
        $this->connDB = $connDB;
    }

    public $product_key;
    public $userEmail;
    public $message;


    public function GET_PRODUCT_FOR_EMAIL() {
        $strSQL = "SELECT user_Product_ID FROM user_tb WHERE user_tb.user_Email = :userEmail";
    
        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);
        
        $stmt->execute();
        return $stmt;
    }
    
    public function GET_REALTIME() {
        $strSQL = 
    "SELECT 
    realtime_Solenoid, realtime_AI, realtime_Time, realtime_Flowrate, realtime_Pressure,
    user_Name, user_Address, user_Phone, user_Email, user_Product_ID, 
    Product_Details_Month_Water_Use,Product_Details_Day_Water_Use
    FROM user_tb, realtime_tb, product_details_tb
    WHERE user_tb.user_Product_ID = :product_key 
    AND realtime_tb.product_key = :product_key 
    AND product_details_tb.product_key = :product_key
    ORDER BY Product_Details_Month_Id DESC LIMIT 1";

    

    

    
        $this->product_key = intval(htmlspecialchars(strip_tags($this->product_key)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":product_key", $this->product_key);
    
        $stmt->execute();
        return $stmt;
    }
    
}
