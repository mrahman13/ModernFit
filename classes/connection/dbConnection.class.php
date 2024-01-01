<?php

include 'connectionCredentials.php';

class dbConnection
{
  //protected function connect()
  public function connect()

  {

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

    global $dbhost, $dbuser, $dbpass, $dbname;

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
//Reference I used to help me hide the connection credentials 
//https://stackoverflow.com/questions/57901879/git-how-to-deal-with-files-which-will-contain-sensitive-data-in-the-future