<?php

class dbModel
{
  protected function connect()
  {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "modernfit";
    if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
      die("failed to connect!");
    }
    else{
      return $con;
    }
  }
}
