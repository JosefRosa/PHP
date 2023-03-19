<?php
interface IDB {
  public function connect($host, $username, $password, $database);
  public function query($query);
  public function close();
}

class MySQL implements IDB {
  
  private $conn;
  
  public function connect($host, $username, $password, $database) {
    $this->conn = mysqli_connect($host, $username, $password, $database);
    if (!$this->conn) {
      die("Připojení k databázi selhalo: " . mysqli_connect_error());
    }
  }
  
  public function query($query) {
    $result = mysqli_query($this->conn, $query);
    return $result;
  }
  
  public function close() {
    mysqli_close($this->conn);
  }
}

?>
