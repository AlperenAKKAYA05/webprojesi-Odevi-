<?php
session_start();

error_reporting(~E_DEPRECATED & ~E_NOTICE);

class Db
{
    protected $dbHost = 'localhost';

    protected $dbName = 'note';
	
    protected $dbUsername = 'root';
	
    protected $dbPassword = '';


    protected static $connection;

    public function connect()
    {
        if (!isset(self::$connection)) {
            self::$connection = @new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        }

        if (self::$connection->connect_errno || self::$connection === false) {
            return false;
        }
 
        self::$connection->select_db($this->dbName);
        self::$connection->set_charset("utf8");
 
        return self::$connection;
    }

    public function query($query)
    {
        // Veritabanına Bağlan
        $connection = $this->connect();
 
        // Verilen Sorguyu Çalıştır.
        $result = $connection->query($query);
 
        return $result;
    }

    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
 
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function error()
    {
 
        return '<br><strong>Hata Kodu:</strong> ' . self::$connection->connect_errno . ' <br><strong>Hata Mesajı:</strong> ' . self::$connection->connect_error;
    }

    public function quote($value)
    {
        $value = trim($value);
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }
}

function Konum() {
$host = $_SERVER["HTTP_HOST"];
$parcala_host = explode ("/",$host);

$road = $_SERVER["SCRIPT_NAME"];
$parcala_road = explode ("/",$road);
$apck = (count($parcala_road))-2;
$i=0;
while ($i <= $apck) {
  if($i==0){
   $road_ = $parcala_host[0];
  }
  else {
  $_road = $_road."/".$parcala_road[$i];    
  }
  $i++;
}
$end = $road_.$_road;

  return $end;
}


?>