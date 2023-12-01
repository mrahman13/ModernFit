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
    $query = "SELECT COUNT(*) FROM user WHERE email = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
    if($count == 0)
    {
      $query = "INSERT INTO user (email,password,user_role) values (?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$email, $password, $user_role]);
      header("Location: " . $user_role . "Homepage.php");
    }
    else{
      echo "Email already in use";
    }
  }

  protected function getUserId($email)
  {
    $query = "SELECT user_id from user where email = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$email]);
    return $stmt;
  }

  protected function signInCheck($email, $password)
  {
    $query = "SELECT COUNT(*) FROM user WHERE email = ? AND password = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$email, $password]);
    $count = $stmt->fetchColumn();
    if($count == 1)
    {
      $query = "SELECT * FROM user WHERE email = ? AND password = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$email, $password]);
      $obj = $stmt->fetch();
      header("Location: " . $obj['user_role'] . "Homepage.php");
    }
    else{
      echo "Wrong password";
    }
  }
}
