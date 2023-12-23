<?php

class usersModel extends dbConnection
{
  protected function getUser($user_id)
  {
    $query = "SELECT * from user where user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt;
  }

  protected function setUser($email, $password, $user_role)
  {
    $query = "SELECT COUNT(*) FROM user WHERE email = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
    if($count == 0)
    {
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO user (email,password,user_role) values (?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$email, $passwordHash, $user_role]);
      $_SESSION['user_id'] = $this->getUserId($email);
      $_SESSION['user_role'] = $user_role;
      header("Location: " . $user_role . "Homepage");
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
    $obj = $stmt->fetch();
    return $obj['user_id'];
  }

  protected function signInCheck($email, $password)
  {
    $query = "SELECT COUNT(*) FROM user WHERE email = ? AND password = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$email, $password]);
    $count = $stmt->fetchColumn();
    if ($count == 1) {
      $query = "SELECT * FROM user WHERE email = ? AND password = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$email, $password]);
      $obj = $stmt->fetch();
      $_SESSION['user_id'] = $obj['user_id'];
      $_SESSION['user_role'] = $obj['user_role'];
      if ($obj['user_role'] == "member") {
        $query = "SELECT member_id from member where user_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $memberObj = $stmt->fetch();
        $_SESSION['member_id'] = $memberObj['member_id'];
      } else if ($obj['user_role'] == "personalTrainer") {
        $query = "SELECT personal_trainer_id from personal_trainer where user_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $personalTrainerObj = $stmt->fetch();
        $_SESSION['personal_trainer_id'] = $personalTrainerObj['personal_trainer_id'];
      }
      header("Location: " . $obj['user_role'] . "Homepage");
    } else {
      echo "</div><div class='fs-5 text-warning text-center p-2'>Invalid email and/or password";
    }
  }
}
