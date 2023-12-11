<?php

class DATATABLE {
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

        if ($stmt->execute()) {
            return $stmt;
        } else {

            return false;
        }
    }

    public function GET_DATA() {
        $strSQL = "SELECT 
        Product_Details_Month_Id,
        Product_Details_Month_Flowrate,
        Product_Details_Month_Pressure,
        Product_Details_Month_Water_Use,
        Product_Details_Day_Water_Use,
        Product_Details_Result_Solenoid,
        Product_Details_Result_Time,
        Product_Details_Result_Ai,
        date,
        time,
        product_key
        FROM product_details_tb,user_tb
        WHERE product_details_tb.product_key = :product_key 
        AND user_tb.user_Password = :userPassword 
        AND user_tb.user_Email = :userEmail  
        ORDER BY Product_Details_Month_Id DESC ";
    


        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->product_key = htmlspecialchars(strip_tags($this->product_key));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":product_key", $this->product_key);
        $stmt->bindParam(":userPassword", $this->userPassword);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {
            return $stmt;
        } else {
  
            return false;
        }
    }
}

    
    
