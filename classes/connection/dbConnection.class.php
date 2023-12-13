<?php

class dbConnection
{
  public function connect()
  {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "modernfit2";

    // try
    // {
    //   $con = new PDO("mysql:host=" . $dbhost . $dbuser . $dbpass . $dbname);
    //   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   return $con;
    // }
    // catch(PDOException $exception)
    // {
    //   echo "Failed " . $exception->getMessage();
    // }

    try 
    {
      $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $con;
    } 
    catch(PDOException $exception) 
    {
      echo "Failed: " . $exception->getMessage();
    }
  }
  
}
