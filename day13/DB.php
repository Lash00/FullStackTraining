<?php
trait Db
{
    public $con;
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $dbname = 'courses';


    public function setConnestion()
    {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->con->connect_error) {
            echo " error in the connection  -- >" . $this->con->connect_error;
        } else
            return $this->con;
    }
    public function query($query)
    {
        return $this->con->query($query);
    }
}





?>