<?php


class NODEMCU_READ
{
    private $connDB;

    public function __construct($connDB)
    {
        $this->connDB = $connDB;
    }


    public $espkey;
    public $userId;
    public $espkeyall="1234567890";
    ///////////////////////////////
    // 
    public $Date_Back_One_Week;
    public $Date_Back_Two_Week;
    public $Date_Back_Three_Week;
    public $Date_Back_Four_Week;

    public $Time_Back_Ten;
    public $Time_Back_Twenty;
    public $Time_Back_Thirty;
    public $Time_Back_Forty;
    public $Time_Back_Fifty;
    public $Time_Back_Sixty;
    //
    public $Date_Back_One_Week_January;
    public $Date_Back_Two_Week_January;
    public $Date_Back_Three_Week_January;
    public $Date_Back_Four_Week_January;

    public $Time_Back_Ten_January;
    public $Time_Back_Twenty_January;
    public $Time_Back_Thirty_January;
    public $Time_Back_Forty_January;
    public $Time_Back_Fifty_January;
    public $Time_Back_Sixty_January;


    
  
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
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Ten 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Ten = htmlspecialchars(strip_tags($this->Time_Back_Ten));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Ten", $this->Time_Back_Ten);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Twenty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Twenty = htmlspecialchars(strip_tags($this->Time_Back_Twenty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Twenty", $this->Time_Back_Twenty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Thirty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Thirty = htmlspecialchars(strip_tags($this->Time_Back_Thirty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Thirty", $this->Time_Back_Thirty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Forty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Forty = htmlspecialchars(strip_tags($this->Time_Back_Forty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Forty", $this->Time_Back_Forty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Fifty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Fifty = htmlspecialchars(strip_tags($this->Time_Back_Fifty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Fifty", $this->Time_Back_Fifty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_One_Week 
        AND time=:Time_Back_Sixty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_One_Week = htmlspecialchars(strip_tags($this->Date_Back_One_Week));
        $this->Time_Back_Sixty = htmlspecialchars(strip_tags($this->Time_Back_Sixty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_One_Week", $this->Date_Back_One_Week);
        $stmt->bindParam(":Time_Back_Sixty", $this->Time_Back_Sixty);
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
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Ten 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Ten = htmlspecialchars(strip_tags($this->Time_Back_Ten));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Ten", $this->Time_Back_Ten);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Twenty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Twenty = htmlspecialchars(strip_tags($this->Time_Back_Twenty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Twenty", $this->Time_Back_Twenty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Thirty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Thirty = htmlspecialchars(strip_tags($this->Time_Back_Thirty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Thirty", $this->Time_Back_Thirty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Forty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Forty = htmlspecialchars(strip_tags($this->Time_Back_Forty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Forty", $this->Time_Back_Forty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Fifty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Fifty = htmlspecialchars(strip_tags($this->Time_Back_Fifty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Fifty", $this->Time_Back_Fifty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {

            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Two_Week
        AND time=:Time_Back_Sixty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Two_Week = htmlspecialchars(strip_tags($this->Date_Back_Two_Week));
        $this->Time_Back_Sixty = htmlspecialchars(strip_tags($this->Time_Back_Sixty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Two_Week", $this->Date_Back_Two_Week);
        $stmt->bindParam(":Time_Back_Sixty", $this->Time_Back_Sixty);
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
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Ten 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Ten = htmlspecialchars(strip_tags($this->Time_Back_Ten));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Ten", $this->Time_Back_Ten);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
    
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Twenty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Twenty = htmlspecialchars(strip_tags($this->Time_Back_Twenty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Twenty", $this->Time_Back_Twenty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Thirty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Thirty = htmlspecialchars(strip_tags($this->Time_Back_Thirty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Thirty", $this->Time_Back_Thirty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Forty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Forty = htmlspecialchars(strip_tags($this->Time_Back_Forty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Forty", $this->Time_Back_Forty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Fifty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Fifty = htmlspecialchars(strip_tags($this->Time_Back_Fifty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Fifty", $this->Time_Back_Fifty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Three_Week
        AND time=:Time_Back_Sixty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Three_Week = htmlspecialchars(strip_tags($this->Date_Back_Three_Week));
        $this->Time_Back_Sixty = htmlspecialchars(strip_tags($this->Time_Back_Sixty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Three_Week", $this->Date_Back_Three_Week);
        $stmt->bindParam(":Time_Back_Sixty", $this->Time_Back_Sixty);
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
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Ten 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Ten = htmlspecialchars(strip_tags($this->Time_Back_Ten));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Ten", $this->Time_Back_Ten);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Twenty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Twenty = htmlspecialchars(strip_tags($this->Time_Back_Twenty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Twenty", $this->Time_Back_Twenty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
    
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Thirty 
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Thirty = htmlspecialchars(strip_tags($this->Time_Back_Thirty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Thirty", $this->Time_Back_Thirty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Forty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Forty = htmlspecialchars(strip_tags($this->Time_Back_Forty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Forty", $this->Time_Back_Forty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Fifty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Fifty = htmlspecialchars(strip_tags($this->Time_Back_Fifty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Fifty", $this->Time_Back_Fifty);
        $stmt->bindParam(":espkey", $this->espkey);

        if ($stmt->execute()) {
            return $stmt;
        }
    }
    public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK()
    {
        $strSQL = "SELECT Product_Details_Month_Pressure 
        FROM product_details_tb 
        WHERE date=:Date_Back_Four_Week
        AND time=:Time_Back_Sixty
        AND  product_key= :espkey 
        ORDER BY Product_Details_Month_Id 
        DESC LIMIT 1";

        $this->Date_Back_Four_Week = htmlspecialchars(strip_tags($this->Date_Back_Four_Week));
        $this->Time_Back_Sixty = htmlspecialchars(strip_tags($this->Time_Back_Sixty));
        $this->espkey = intval(htmlspecialchars(strip_tags($this->espkey)));
        $stmt = $this->connDB->prepare($strSQL);

        $stmt->bindParam(":Date_Back_Four_Week", $this->Date_Back_Four_Week);
        $stmt->bindParam(":Time_Back_Sixty", $this->Time_Back_Sixty);
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
           WHERE date=:Date_Back_One_Week_January 
           AND time=:Time_Back_Ten_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January= htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Ten_January = htmlspecialchars(strip_tags($this->Time_Back_Ten_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Ten_January", $this->Time_Back_Ten_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_One_Week_January
           AND time=:Time_Back_Twenty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January = htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Twenty_January = htmlspecialchars(strip_tags($this->Time_Back_Twenty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Twenty_January", $this->Time_Back_Twenty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_One_Week_January 
           AND time=:Time_Back_Thirty_January 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January = htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Thirty_January = htmlspecialchars(strip_tags($this->Time_Back_Thirty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Thirty_January", $this->Time_Back_Thirty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_One_Week_January 
           AND time=:Time_Back_Forty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January = htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Forty_January = htmlspecialchars(strip_tags($this->Time_Back_Forty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Forty_January", $this->Time_Back_Forty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_One_Week_January 
           AND time=:Time_Back_Fifty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January = htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Fifty_January  = htmlspecialchars(strip_tags($this->Time_Back_Fifty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Fifty_January", $this->Time_Back_Fifty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_ONEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_One_Week_January
           AND time=:Time_Back_Sixty_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_One_Week_January = htmlspecialchars(strip_tags($this->Date_Back_One_Week_January));
           $this->Time_Back_Sixty_January = htmlspecialchars(strip_tags($this->Time_Back_Sixty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_One_Week_January", $this->Date_Back_One_Week_January);
           $stmt->bindParam(":Time_Back_Sixty_January", $this->Time_Back_Sixty_January);
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
           WHERE date=:Date_Back_Two_Week_January 
           AND time=:Time_Back_Ten_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Ten_January = htmlspecialchars(strip_tags($this->Time_Back_Ten_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Ten_January", $this->Time_Back_Ten_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Two_Week_January
           AND time=:Time_Back_Twenty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Twenty_January = htmlspecialchars(strip_tags($this->Time_Back_Twenty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Twenty_January", $this->Time_Back_Twenty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Two_Week_January 
           AND time=:Time_Back_Thirty_January 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Thirty_January = htmlspecialchars(strip_tags($this->Time_Back_Thirty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Thirty_January", $this->Time_Back_Thirty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Two_Week_January 
           AND time=:Time_Back_Forty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Forty_January = htmlspecialchars(strip_tags($this->Time_Back_Forty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Forty_January", $this->Time_Back_Forty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Two_Week_January 
           AND time=:Time_Back_Fifty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Fifty_January  = htmlspecialchars(strip_tags($this->Time_Back_Fifty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Fifty_January", $this->Time_Back_Fifty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_TWOWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Two_Week_January
           AND time=:Time_Back_Sixty_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Two_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Two_Week_January));
           $this->Time_Back_Sixty_January = htmlspecialchars(strip_tags($this->Time_Back_Sixty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Two_Week_January", $this->Date_Back_Two_Week_January);
           $stmt->bindParam(":Time_Back_Sixty_January", $this->Time_Back_Sixty_January);
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
           WHERE date=:Date_Back_Three_Week_January 
           AND time=:Time_Back_Ten_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Ten_January = htmlspecialchars(strip_tags($this->Time_Back_Ten_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Ten_January", $this->Time_Back_Ten_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Three_Week_January
           AND time=:Time_Back_Twenty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Twenty_January = htmlspecialchars(strip_tags($this->Time_Back_Twenty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Twenty_January", $this->Time_Back_Twenty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Three_Week_January 
           AND time=:Time_Back_Thirty_January 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Thirty_January = htmlspecialchars(strip_tags($this->Time_Back_Thirty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Thirty_January", $this->Time_Back_Thirty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Three_Week_January 
           AND time=:Time_Back_Forty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Forty_January = htmlspecialchars(strip_tags($this->Time_Back_Forty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Forty_January", $this->Time_Back_Forty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Three_Week_January 
           AND time=:Time_Back_Fifty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Fifty_January  = htmlspecialchars(strip_tags($this->Time_Back_Fifty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Fifty_January", $this->Time_Back_Fifty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_THREEWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Three_Week_January
           AND time=:Time_Back_Sixty_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Three_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Three_Week_January));
           $this->Time_Back_Sixty_January = htmlspecialchars(strip_tags($this->Time_Back_Sixty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Three_Week_January", $this->Date_Back_Three_Week_January);
           $stmt->bindParam(":Time_Back_Sixty_January", $this->Time_Back_Sixty_January);
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
           WHERE date=:Date_Back_Four_Week_January 
           AND time=:Time_Back_Ten_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Ten_January = htmlspecialchars(strip_tags($this->Time_Back_Ten_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Ten_January", $this->Time_Back_Ten_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_TWENTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Four_Week_January
           AND time=:Time_Back_Twenty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Twenty_January = htmlspecialchars(strip_tags($this->Time_Back_Twenty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Twenty_January", $this->Time_Back_Twenty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_THIRTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Four_Week_January 
           AND time=:Time_Back_Thirty_January 
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Thirty_January = htmlspecialchars(strip_tags($this->Time_Back_Thirty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Thirty_January", $this->Time_Back_Thirty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FORTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Four_Week_January 
           AND time=:Time_Back_Forty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Forty_January = htmlspecialchars(strip_tags($this->Time_Back_Forty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Forty_January", $this->Time_Back_Forty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_FIFTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Four_Week_January 
           AND time=:Time_Back_Fifty_January
           AND  product_key= :espkeyall 
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Fifty_January  = htmlspecialchars(strip_tags($this->Time_Back_Fifty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Fifty_January", $this->Time_Back_Fifty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
       public function NODE_MCU_GET_DATA_TIMEBACK_SIXTY_FOURWEEK_JANUARY()
       {
           $strSQL = "SELECT Product_Details_Month_Pressure 
           FROM product_details_tb 
           WHERE date=:Date_Back_Four_Week_January
           AND time=:Time_Back_Sixty_January
           AND  product_key= :espkeyall
           ORDER BY Product_Details_Month_Id  
           DESC LIMIT 1";
   
           $this->Date_Back_Four_Week_January = htmlspecialchars(strip_tags($this->Date_Back_Four_Week_January));
           $this->Time_Back_Sixty_January = htmlspecialchars(strip_tags($this->Time_Back_Sixty_January));
           $this->espkeyall = intval(htmlspecialchars(strip_tags($this->espkeyall)));
           $stmt = $this->connDB->prepare($strSQL);
   
           $stmt->bindParam(":Date_Back_Four_Week_January", $this->Date_Back_Four_Week_January);
           $stmt->bindParam(":Time_Back_Sixty_January", $this->Time_Back_Sixty_January);
           $stmt->bindParam(":espkeyall", $this->espkeyall);
   
           if ($stmt->execute()) {
               return $stmt;
           }
       }
      


}