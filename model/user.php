<?php

class User
{
    private $connDB;
    public function __construct($connDB)
    {
        $this->connDB = $connDB;
    }
    /////////////////////////////ตัวแรเก็บข้อมูลinsert
    public $userId;
    public $userName;
    public $userAddress;
    public $userEmail;
    public $userPhone;
    public $userPassword;
    public $userProductId;
    /////////////////////////////ตัวแรเก็บข้อมูลDELETE
    public $product_Id;

    public $massage;


    public function INSERT_USER()
    {
        $strSQL = "INSERT INTO user_tb(user_Name,user_Address,user_Email,user_Phone,user_Password,user_Product_ID)
        VALUES
        (:userName,:userAddress,:userEmail,:userPhone,:userPassword,:userProductId)";

        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userAddress = htmlspecialchars(strip_tags($this->userAddress));
        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->userPhone = htmlspecialchars(strip_tags($this->userPhone));
        $this->userPassword = md5(htmlspecialchars(strip_tags($this->userPassword)));
        $this->userProductId = intval(htmlspecialchars(strip_tags($this->userProductId)));

        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userAddress", $this->userAddress);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPhone", $this->userPhone);
        $stmt->bindParam(":userPassword", $this->userPassword);
        $stmt->bindParam(":userProductId", $this->userProductId);

        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }
    ////////////////////////////////////////////////////////////////////////////
    public function UPDATE_USER()
    {
        $strSQL = "UPDATE user_tb 
        SET  user_Name=:userName,user_Address=:userAddress,user_Phone=:userPhone,user_Email=:userEmail,user_Password=:userPassword
        WHERE user_Id=:userId ";

        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userAddress = htmlspecialchars(strip_tags($this->userAddress));
        $this->userPhone = htmlspecialchars(strip_tags($this->userPhone));
        $this->userPassword = md5(htmlspecialchars(strip_tags($this->userPassword)));
        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));

        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userAddress", $this->userAddress);
        $stmt->bindParam(":userPhone", $this->userPhone);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPassword", $this->userPassword);
        $stmt->bindParam(":userId", $this->userId);

        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }


    //////////////////////////////////////////////////////////////////////////////
    public function DELETE_USER()
    {
        $strSQL = "DELETE FROM product_tb WHERE product_Id=:product_Id";

        $this->product_Id = intval(htmlspecialchars(strip_tags(":product_Id", $this->product_Id)));

        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":product_Id", $this->product_Id);

        if ($stmt->execute()) {
            return true;
        } else
            return false;
    }
    //////////////////////////////////////////////////////////////////////

    public function GET_USER_CHANG_FOR_EMAIL()
    {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Email = :userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {

            $stmt->execute();
            return $stmt;
        }
    }

    public function GET_CHANG_OLD_PASSWORD()
    {
        $strSQL = "SELECT user_Password FROM user_tb
         WHERE  user_Id=:userId";

        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userId", $this->userId);

        $stmt->execute();
        return $stmt;
    }
    ///////////////////////////////////////////////////////////////////////////////

    public function GET_VALIDATE_EMAIL()
    {
        $strSQL = "SELECT user_Email,user_Product_ID FROM user_tb
         WHERE user_tb.user_Email =:userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        $stmt->execute();
        return $stmt;
    }

    public function GET_VALIDATE_USER_PRODUCT()
    {
        $strSQL = "SELECT user_Product_ID FROM user_tb WHERE user_tb.user_Product_ID = :userProductId";

        $this->userProductId = intval(htmlspecialchars(strip_tags($this->userProductId)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userProductId", $this->userProductId);
        $stmt->execute();
        return $stmt;
    }

    public function GET_VALIDATE_PHONE()
    {
        $strSQL = "SELECT user_Phone FROM user_tb
         WHERE user_tb.user_Phone =:userPhone";

        $this->userPhone = htmlspecialchars(strip_tags($this->userPhone));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userPhone", $this->userPhone);

        $stmt->execute();
        return $stmt;
    }
    public function GET_VALIDATE_PRODUCT()
    {
        $strSQL = "SELECT 	product_Id FROM product_tb
         WHERE product_tb.product_Id =:userProductId";

        $this->userProductId = htmlspecialchars(strip_tags($this->userProductId));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userProductId", $this->userProductId);
        $stmt->execute();
        return $stmt;
    }

    public function LOGIN_USER()
    {

        $strSQL = "SELECT user_Email, user_Password FROM user_tb WHERE user_tb.user_Email = :userEmail";


        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));


        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {

            $db_data_password = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($this->userPassword== $db_data_password['user_Password']) {

                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }


    public function INSERT_FIRST_TIME()
    {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Email = :userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindValue(":userEmail", $this->userEmail);

        if ($stmt->execute()) {
            $db_data_userID = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if user_Id is retrieved successfully
            if ($db_data_userID) {
                $user_id = $db_data_userID['user_Id'];

                // Execute your insert statements here using $user_id
                $strSQLFirstAi = "INSERT INTO control_ai_tb(control_Ai, user_control_Ai_Id) VALUES(0, :user_id)";
                $strSQLFirstTIME = "INSERT INTO control_solenoid_tb(control_Solenoid, user_control_Solenoid_Id) VALUES(0, :user_id)";
                $strSQLFirstSolenoid = "INSERT INTO control_time_tb(control_Date_On, control_Time_On, control_Date_OFF, control_Time_OFF, user_control_Time_Id) VALUES('0000-00-00', '0000-00-00', '00:00:00', '00:00:00', :user_id)";

                try {
                    // Prepare and execute the SQL statements
                    $stmtAi = $this->connDB->prepare($strSQLFirstAi);
                    $stmtAi->bindValue(":user_id", $user_id);
                    $stmtAi->execute();

                    $stmtTIME = $this->connDB->prepare($strSQLFirstTIME);
                    $stmtTIME->bindValue(":user_id", $user_id);
                    $stmtTIME->execute();

                    $stmtSolenoid = $this->connDB->prepare($strSQLFirstSolenoid);
                    $stmtSolenoid->bindValue(":user_id", $user_id);
                    $stmtSolenoid->execute();

                    return true; // Return true if everything executed successfully
                } catch (PDOException $e) {
                    // Handle the exception, log or return false based on your needs
                    return false;
                }
            } else {
                return false; // User not found
            }
        } else {
            return false; // Execution failed
        }
    }
}
