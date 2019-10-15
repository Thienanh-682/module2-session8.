<?php
class DBConnect
{
    protected $dsn;
    protected $userName;
    protected $passWord;

    public function __construct($dsn,$userName,$passWord)
    {
        $this->dsn = $dsn;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn,$this->userName,$this->passWord);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}