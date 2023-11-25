<?php

class memberModel extends dbModel
{
  protected $member_id;
  protected $first_name;
  protected $last_name;
  protected $profile_picture;
  protected $date_joined;
  protected $pin;



  protected function getMember($user_id)
  {
    $query = "SELECT * from member where user_id = '$user_id'";
    $user_data = $this->connect()->query($query);
    return $user_data;
  }
  protected function makePin()
  {
    // need to make a new pin, and then check with all pins saved, if there arn't any can add, otherwise need to make another
    $pin = rand(100000,999999);
    $query = "SELECT pin from member WHERE pin = '$pin'";
    $check = mysqli_query($this->connect(), $query);
      while(mysqli_num_rows($check) != 0){ 
        $pin = rand(100000,999999);
        $query = "SELECT pin from member WHERE pin = '$pin'";
        $check = mysqli_query($this->connect(), $query);
      }
    return $pin;
  }
  protected function setMember($first_name, $last_name, $profile_picture, $date_joined, $user_id)
  {
    $pin = $this->makePin();
    $query = "INSERT INTO member (first_name,last_name,profile_picture,date_joined,pin,user_id) values ('$first_name','$last_name','$profile_picture','$date_joined','$pin','$user_id')";
    mysqli_query($this->connect(), $query);
  }
}
