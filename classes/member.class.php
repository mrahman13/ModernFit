<?php

class Member extends db
{
  protected $user_id;
  protected $email;
  protected $password;
  protected $user_role;

  protected function getMember($user_id)
  {
    $query = "SELECT * from member where user_id = '$user_id'";
    $user_data = $this->connect()->query($query);
    return $user_data;
  }
  protected function setMember($first_name, $last_name, $profile_picture, $date_joined, $pin, $user_id)
  {
    $query = "INSERT INTO member (first_name,last_name,profile_picture,date_joined,pin,user_id) values ('$first_name','$last_name','$profile_picture','$date_joined','$pin','$user_id')";
    mysqli_query($this->connect(), $query);
  }
}
