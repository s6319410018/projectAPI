

<?php

class CONTROL_TIME {
    private $connDB;

    public function __construct($connDB) {
        $this->connDB = $connDB;
    }

    public $userEmail;
    public $user_control_Time_Id;
    public $control_Date_On;
    public $control_Time_On;
    public $control_Date_OFF;
    public $control_Time_OFF;

    public function GET_USER_CONTROL_FOR_EMAIL() {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Email = :userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {
               
        $stmt->execute();
        return $stmt;
        }
    }

    public function UPDATE_CONTROL_TIME() {
        $strSQL = "UPDATE control_time_tb 
            SET control_Date_On=:control_Date_On,
                control_Time_On=:control_Time_On,
                control_Date_OFF=:control_Date_OFF,
                control_Time_OFF=:control_Time_OFF
            WHERE control_time_tb.user_control_Time_Id =:user_control_Time_Id";

        $this->control_Date_On = htmlspecialchars(strip_tags($this->control_Date_On));
        $this->control_Time_On = htmlspecialchars(strip_tags($this->control_Time_On));
        $this->control_Date_OFF = htmlspecialchars(strip_tags($this->control_Date_OFF));
        $this->control_Time_OFF = htmlspecialchars(strip_tags($this->control_Time_OFF));
        $this->user_control_Time_Id = intval(htmlspecialchars(strip_tags($this->user_control_Time_Id)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":control_Date_On", $this->control_Date_On);
        $stmt->bindParam(":control_Time_On", $this->control_Time_On);
        $stmt->bindParam(":control_Date_OFF", $this->control_Date_OFF);
        $stmt->bindParam(":control_Time_OFF", $this->control_Time_OFF);
        $stmt->bindParam(":user_control_Time_Id", $this->user_control_Time_Id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

class CONTROL_AI {
    private $connDB;

    public function __construct($connDB) {
        $this->connDB = $connDB;
    }

    public $user_control_Ai_Id;
    public $control_Ai;
    public $userEmail;

    
    public function GET_USER_CONTROL_FOR_EMAIL() {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Email = :userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {
               
        $stmt->execute();
        return $stmt;
        }
    }
    public function UPDATE_CONTROL_AI() {
        $strSQL = "UPDATE control_ai_tb 
            SET control_Ai=:control_Ai
            WHERE user_control_Ai_Id=:user_control_Ai_Id";
    
        $this->control_Ai = intval(htmlspecialchars(strip_tags($this->control_Ai)));
        $this->user_control_Ai_Id = intval(htmlspecialchars(strip_tags($this->user_control_Ai_Id)));
    
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":user_control_Ai_Id", $this->user_control_Ai_Id);
        $stmt->bindParam(":control_Ai", $this->control_Ai);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}

class CONTROL_SOLENOID{
    private $connDB;

    public function __construct($connDB) {
        $this->connDB = $connDB;
    }

    public $user_control_Solenoid_Id;
    public $userEmail;
    public $control_Solenoid;
    
    public function GET_USER_CONTROL_FOR_EMAIL() {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Email = :userEmail";

        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userEmail", $this->userEmail);

        if ($stmt->execute()) {
               
        $stmt->execute();
        return $stmt;
        }
    }
   
    public function UPDATE_CONTROL_SOLENOID() {
        $strSQL = "UPDATE control_solenoid_tb 
            SET control_Solenoid=:control_Solenoid
            WHERE user_control_Solenoid_Id=:user_control_Solenoid_Id";
    

  
        $this->control_Solenoid = intval(htmlspecialchars(strip_tags($this->control_Solenoid)));
        $this->user_control_Solenoid_Id = intval(htmlspecialchars(strip_tags($this->user_control_Solenoid_Id)));
    
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":user_control_Solenoid_Id", $this->user_control_Solenoid_Id);
        $stmt->bindParam(":control_Solenoid", $this->control_Solenoid);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}