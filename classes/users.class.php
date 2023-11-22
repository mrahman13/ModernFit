<?php

class users extends db
{
  protected $user_id;
  protected $email;
  protected $password;
  protected $user_role;

  protected function getUser($user_id)
  {
    $query = "SELECT * from user where user_id = '$user_id'";
    $user_data = $this->connect()->query($query);
    return $user_data;
  }
  protected function setUser($email, $password, $user_role)
  {
    $query = "INSERT INTO user (email,password,user_role) values ('$email','$password','$user_role')";
    mysqli_query($this->connect(), $query);
  }
  protected function getUserId($email)
  {
    $query = "SELECT user_id from user where email = '$email'";
    $user_data = $this->connect()->query($query);
    return $user_data;
  }
  protected function signInCheck($email, $password)
  {
    $checkCredentials = mysqli_query($this->connect(), "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($checkCredentials) == 1){
      header("Location: memberHomepage.php");
    }
    // $query = "SELECT user_id from user where email = '$email'";
    // $user_data = $this->connect()->query($query);
    // return $user_data;
  }
}
