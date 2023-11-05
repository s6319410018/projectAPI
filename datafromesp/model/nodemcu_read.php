<?php


class NODEMCU
{
    private $connDB;

    public function __construct($connDB)
    {
        $this->connDB = $connDB;
    }


    public $espkey;
    public $userId;
    public $espkeyall;
    ///////////////////////////////
    public $Date_Back_7;
    public $Date_Back_14;
    public $Date_Back_21;
    public $Date_Back_28;

    public $Time_Back_10;
    public $Time_Back_20;
    public $Time_Back_30;
    public $Time_Back_40;
    public $Time_Back_50;
    public $Time_Back_60;

 /////////////////////////////////
    public $Date_Back_7_january;
    public $Date_Back_14_january;
    public $Date_Back_21_january;
    public $Date_Back_28_january;

    public $Time_Back_10_january;
    public $Time_Back_20_january;
    public $Time_Back_30_january;
    public $Time_Back_40_january;
    public $Time_Back_50_january;
    public $Time_Back_60_january;

    
    //ใช้espkey หาid ผู้ใช้
    public function NODE_MCU_GET_ID()
    {
        $strSQL = "SELECT user_Id FROM user_tb WHERE user_tb.user_Product_ID = :espkey ";
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }


    //ถ้ามี ดึงข้อมูล
    public function NODE_MCU_GET_REALTIME()
    {
        $strSQL = "SELECT control_Date_On, control_Time_On, control_Date_OFF, control_Time_OFF,
        control_Solenoid, control_Ai
        FROM control_solenoid_tb, control_time_tb, control_ai_tb
        WHERE control_time_tb.user_control_Time_Id= :userId
        AND control_solenoid_tb.user_control_Solenoid_Id = :userId
        AND control_ai_tb.user_control_Ai_Id= :userId";

        $this->userId = intval(htmlspecialchars(strip_tags($this->userId)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":userId", $this->userId);
         
        if ($stmt->execute()) {
            $data[]=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    //ถ้ามี ดึงข้อมูลสุดท้ายที่อยูในฐานข้อมูล
    public function NODE_MCU_GET_LAST_TIME()
    {
        $strSQL = "SELECT Product_Details_Day_Water_Use,Product_Details_Month_Water_Use 
        FROM product_details_tb 
        WHERE product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    //สัปดาห์ที่หนึ่ง
    public function NODE_MCU_GET_DATA_TIMEBACK_TEN_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_10 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_10 = htmlspecialchars(strip_tags($this->Time_Back_10));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_10", $this->Time_Back_10);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_20 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_20 = htmlspecialchars(strip_tags($this->Time_Back_20));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_20", $this->Time_Back_20);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_30 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_30 = htmlspecialchars(strip_tags($this->Time_Back_30));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_30", $this->Time_Back_30);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_40
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_40 = htmlspecialchars(strip_tags($this->Time_Back_40));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_40", $this->Time_Back_40);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_50
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_50 = htmlspecialchars(strip_tags($this->Time_Back_50));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_50", $this->Time_Back_50);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_7 
        AND time=:Time_Back_60
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_7 = htmlspecialchars(strip_tags($this->Date_Back_7));
        $this->Time_Back_60 = htmlspecialchars(strip_tags($this->Time_Back_60));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_7", $this->Date_Back_7);
        $stmt->bindParam(":Time_Back_60", $this->Time_Back_60);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    //สัปดาห์ที่สอง
    public function NODE_MCU_GET_DATA_TIMEBACK_TEN_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_10 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_10 = htmlspecialchars(strip_tags($this->Time_Back_10));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_10", $this->Time_Back_10);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_20 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_20 = htmlspecialchars(strip_tags($this->Time_Back_20));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_20", $this->Time_Back_20);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_30 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_30 = htmlspecialchars(strip_tags($this->Time_Back_30));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_30", $this->Time_Back_30);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_40
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_40 = htmlspecialchars(strip_tags($this->Time_Back_40));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_40", $this->Time_Back_40);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_50
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_50 = htmlspecialchars(strip_tags($this->Time_Back_50));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_50", $this->Time_Back_50);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {

            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_14
        AND time=:Time_Back_60
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_14 = htmlspecialchars(strip_tags($this->Date_Back_14));
        $this->Time_Back_60 = htmlspecialchars(strip_tags($this->Time_Back_60));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_14", $this->Date_Back_14);
        $stmt->bindParam(":Time_Back_60", $this->Time_Back_60);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {

            return $stmt;
        }
    }
    //สัปดาห์ที่สาม
    public function NODE_MCU_GET_DATA_TIMEBACK_TEN_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_10 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_10 = htmlspecialchars(strip_tags($this->Time_Back_10));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_10", $this->Time_Back_10);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
    
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_20 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_20 = htmlspecialchars(strip_tags($this->Time_Back_20));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_20", $this->Time_Back_20);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_30 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_30 = htmlspecialchars(strip_tags($this->Time_Back_30));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_30", $this->Time_Back_30);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_40
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_40 = htmlspecialchars(strip_tags($this->Time_Back_40));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_40", $this->Time_Back_40);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_50
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_50 = htmlspecialchars(strip_tags($this->Time_Back_50));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_50", $this->Time_Back_50);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_21
        AND time=:Time_Back_60
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_21 = htmlspecialchars(strip_tags($this->Date_Back_21));
        $this->Time_Back_60 = htmlspecialchars(strip_tags($this->Time_Back_60));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_21", $this->Date_Back_21);
        $stmt->bindParam(":Time_Back_60", $this->Time_Back_60);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }   
   //สัปดาห์ที่สี่
    public function NODE_MCU_GET_DATA_TIMEBACK_TEN_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_10 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_10 = htmlspecialchars(strip_tags($this->Time_Back_10));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_10", $this->Time_Back_10);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_20 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_20 = htmlspecialchars(strip_tags($this->Time_Back_20));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_20", $this->Time_Back_20);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
    
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_30 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_30 = htmlspecialchars(strip_tags($this->Time_Back_30));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_30", $this->Time_Back_30);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_40
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_40 = htmlspecialchars(strip_tags($this->Time_Back_40));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_40", $this->Time_Back_40);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_50
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_50 = htmlspecialchars(strip_tags($this->Time_Back_50));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_50", $this->Time_Back_50);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_28
        AND time=:Time_Back_60
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_28 = htmlspecialchars(strip_tags($this->Date_Back_28));
        $this->Time_Back_60 = htmlspecialchars(strip_tags($this->Time_Back_60));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_28", $this->Date_Back_28);
        $stmt->bindParam(":Time_Back_60", $this->Time_Back_60);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    

    /////////////////////////////////////////////////////////////////////////////

       //สัปดาห์ที่หนึ่ง
       public function NODE_MCU_GET_DATA_TIMEBACK_TEN_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january 
           AND time=:Time_Back_10_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_10_january = htmlspecialchars(strip_tags($this->Time_Back_10_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_10_january", $this->Time_Back_10_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january
           AND time=:Time_Back_20_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_20_january = htmlspecialchars(strip_tags($this->Time_Back_20_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_20_january", $this->Time_Back_20_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january 
           AND time=:Time_Back_30_january 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_30_january = htmlspecialchars(strip_tags($this->Time_Back_30_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_30_january", $this->Time_Back_30_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january 
           AND time=:Time_Back_40_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_40_january = htmlspecialchars(strip_tags($this->Time_Back_40_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_40_january", $this->Time_Back_40_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january 
           AND time=:Time_Back_50_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_50_january  = htmlspecialchars(strip_tags($this->Time_Back_50_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_50_january", $this->Time_Back_50_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_7_january
           AND time=:Time_Back_60_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_7_january = htmlspecialchars(strip_tags($this->Date_Back_7_january));
           $this->Time_Back_60_january = htmlspecialchars(strip_tags($this->Time_Back_60_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_7_january", $this->Date_Back_7_january);
           $stmt->bindParam(":Time_Back_60_january", $this->Time_Back_60_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
      //สัปดาห์ที่สอง
       public function NODE_MCU_GET_DATA_TIMEBACK_TEN_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january 
           AND time=:Time_Back_10_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_10_january = htmlspecialchars(strip_tags($this->Time_Back_10_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_10_january", $this->Time_Back_10_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january
           AND time=:Time_Back_20_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_20_january = htmlspecialchars(strip_tags($this->Time_Back_20_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_20_january", $this->Time_Back_20_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january 
           AND time=:Time_Back_30_january 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_30_january = htmlspecialchars(strip_tags($this->Time_Back_30_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_30_january", $this->Time_Back_30_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january 
           AND time=:Time_Back_40_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_40_january = htmlspecialchars(strip_tags($this->Time_Back_40_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_40_january", $this->Time_Back_40_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january 
           AND time=:Time_Back_50_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_50_january  = htmlspecialchars(strip_tags($this->Time_Back_50_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_50_january", $this->Time_Back_50_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_14_january
           AND time=:Time_Back_60_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_14_january = htmlspecialchars(strip_tags($this->Date_Back_14_january));
           $this->Time_Back_60_january = htmlspecialchars(strip_tags($this->Time_Back_60_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_14_january", $this->Date_Back_14_january);
           $stmt->bindParam(":Time_Back_60_january", $this->Time_Back_60_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
      //สัปดาห์ที่สาม
       public function NODE_MCU_GET_DATA_TIMEBACK_TEN_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january 
           AND time=:Time_Back_10_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_10_january = htmlspecialchars(strip_tags($this->Time_Back_10_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_10_january", $this->Time_Back_10_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january
           AND time=:Time_Back_20_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_20_january = htmlspecialchars(strip_tags($this->Time_Back_20_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_20_january", $this->Time_Back_20_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january 
           AND time=:Time_Back_30_january 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_30_january = htmlspecialchars(strip_tags($this->Time_Back_30_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_30_january", $this->Time_Back_30_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january 
           AND time=:Time_Back_40_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_40_january = htmlspecialchars(strip_tags($this->Time_Back_40_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_40_january", $this->Time_Back_40_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january 
           AND time=:Time_Back_50_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_50_january  = htmlspecialchars(strip_tags($this->Time_Back_50_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_50_january", $this->Time_Back_50_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_21_january
           AND time=:Time_Back_60_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_21_january = htmlspecialchars(strip_tags($this->Date_Back_21_january));
           $this->Time_Back_60_january = htmlspecialchars(strip_tags($this->Time_Back_60_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_21_january", $this->Date_Back_21_january);
           $stmt->bindParam(":Time_Back_60_january", $this->Time_Back_60_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
      //สัปดาห์ที่สี่
       public function NODE_MCU_GET_DATA_TIMEBACK_TEN_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january 
           AND time=:Time_Back_10_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_10_january = htmlspecialchars(strip_tags($this->Time_Back_10_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_10_january", $this->Time_Back_10_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january
           AND time=:Time_Back_20_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_20_january = htmlspecialchars(strip_tags($this->Time_Back_20_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_20_january", $this->Time_Back_20_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january 
           AND time=:Time_Back_30_january 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_30_january = htmlspecialchars(strip_tags($this->Time_Back_30_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_30_january", $this->Time_Back_30_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january 
           AND time=:Time_Back_40_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_40_january = htmlspecialchars(strip_tags($this->Time_Back_40_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_40_january", $this->Time_Back_40_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january 
           AND time=:Time_Back_50_january
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_50_january  = htmlspecialchars(strip_tags($this->Time_Back_50_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_50_january", $this->Time_Back_50_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_28_january
           AND time=:Time_Back_60_january
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_28_january = htmlspecialchars(strip_tags($this->Date_Back_28_january));
           $this->Time_Back_60_january = htmlspecialchars(strip_tags($this->Time_Back_60_january));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_28_january", $this->Date_Back_28_january);
           $stmt->bindParam(":Time_Back_60_january", $this->Time_Back_60_january);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
      


}
