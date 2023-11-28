<?php

class usersModel extends dbConnection
{
  // protected $user_id;
  // protected $email;
  // protected $password;
  // protected $user_role;

  protected function getUser($user_id)
  {
    $query = "SELECT * from user where user_id = '$user_id'";
    $user_data = $this->connect()->query($query);
    return $user_data;
  }

  protected function setUser($email, $password, $user_role)
  {
    $query = "SELECT COUNT(*) FROM user WHERE email = '$email'";
    $result = $this->connect()->query($query);
    $count = $result->fetchColumn();
    if($count == 0)
    {
      $query = "INSERT INTO user (email,password,user_role) values ('$email','$password','$user_role')";
      $this->connect()->query($query);
      header("Location: " . $user_role . "Homepage.php");
    }
    else{
      echo "Email already in use";
    }
  }

  protected function getUserId($email)
  {
    $query = "SELECT user_id from user where email = '$email'";
    $user_id = $this->connect()->query($query);
    return $user_id;
  }

  protected function signInCheck($email, $password)
  {
    $query = "SELECT COUNT(*) FROM user WHERE email = '$email' AND password = '$password'";
    $result = $this->connect()->query($query);
    $count = $result->fetchColumn();
    if($count == 1)
    {
      $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
      $user_data = $this->connect()->query($query);
      $obj = $user_data->fetch();
      header("Location: " . $obj['user_role'] . "Homepage.php");
    }
    else{
      echo "Wrong password";
    }
  }
}
