<?php

class REALTIME {
    private $connDB;

    public function __construct($connDB) {
        $this->connDB = $connDB;
    }

    public $product_key;
    public $userEmail;
    public $userPassword;
    public $message;


    public function GET_PRODUCT_FOR_EMAIL() {
        $strSQL = "SELECT user_Product_ID, user_Password 
        FROM user_tb 
        WHERE user_tb.user_Email = :userEmail 
        AND user_tb.user_Password = :userPassword";
    
        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPassword", $this->userPassword);
        
        $stmt->execute();
        return $stmt;
    }
    
    public function GET_REALTIME() {
        $strSQL = 
    "SELECT 
    realtime_Solenoid, realtime_AI, realtime_Time, realtime_Flowrate, realtime_Pressure,
    user_Name, user_Address, user_Phone, user_Email, user_Product_ID, 
    Product_Details_Month_Water_Use,Product_Details_Day_Water_Use,alert
    FROM user_tb, realtime_tb, product_details_tb
    WHERE user_tb.user_Product_ID = :product_key 
    AND realtime_tb.product_key = :product_key 
    AND product_details_tb.product_key = :product_key
    AND user_tb.user_Email =:userEmail
    AND user_tb.user_Password =:userPassword
    ORDER BY Product_Details_Month_Id DESC LIMIT 1";

        $this->product_key = intval(htmlspecialchars(strip_tags($this->product_key)));
        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":product_key", $this->product_key);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPassword", $this->userPassword);
    
        $stmt->execute();
        return $stmt;
    }
    
}
