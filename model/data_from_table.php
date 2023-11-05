<?php

class DATATABLE {
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
    
        if ($stmt->execute()) {
            $stmt->execute();
            return $stmt;
    }
}
    public function GET_DATA() {
        $strSQL = "SELECT * FROM product_details_tb WHERE product_key=:product_key ORDER BY Product_Details_Month_Id DESC LIMIT 10";
    
        $this->product_key = intval(htmlspecialchars(strip_tags($this->product_key)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":product_key", $this->product_key);
        $stmt->execute();
        return $stmt;
    }
    
    
}
