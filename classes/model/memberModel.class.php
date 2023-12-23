<?php

class memberModel extends dbConnection
{
  protected function getMember($user_id)
  {
    $query = "SELECT * from member where user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt;
  }
  protected function getMemberID($user_id)
  {
    $query = "SELECT member_id from member where user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt;
  }
  protected function makePin()
  {
    $pin = rand(100000, 999999);
    $query = "SELECT COUNT(*) from member WHERE pin = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$pin]);
    $count = $stmt->fetchColumn();
    while ($count != 0) {
      $pin = rand(100000, 999999);
      $query = "SELECT pin from member WHERE pin = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$pin]);
      $count = $stmt->fetchColumn();
    }
    return $pin;
  }
  protected function setMember($first_name, $last_name, $profile_picture, $goals, $date_joined, $user_id)
  {
    $query = "SELECT COUNT(*) FROM member WHERE user_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$user_id]);
    $count = $stmt->fetchColumn();
    if ($count == 0) {
      $pin = $this->makePin();
      $query = "INSERT INTO member (first_name,last_name,profile_picture,date_joined,pin,user_id) values (?, ?, ?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$first_name, $last_name, $profile_picture, $date_joined, $pin, $user_id]);
      $query = "SELECT member_id from member where user_id = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$user_id]);
      $obj = $stmt->fetch();
      $_SESSION['member_id'] = $obj['member_id'];

      $query = "SELECT COUNT(*) FROM goals WHERE goal LIKE ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute(["%$goals%"]);
      $count = $stmt->fetchColumn();
      if ($count != 0) {
        //adding new goal to goal table
        $query = "INSERT INTO goals (goal) values (?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$goals]);
        echo $_SESSION['member_id'];

        //getting new goal goal_id
        $query = "SELECT goal_id from goals where goal = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$goals]);
        $obj = $stmt->fetch();
        $goal_id = $obj['goal_id'];

        //adding goal_id and member_id to member_goals table
        $query = "INSERT INTO member_goals (goal_id,member_id) values (?, ?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$goal_id, $_SESSION['member_id']]);
      } else {
        //getting goal_id
        $query = "SELECT goal_id from goals where goal = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$goals]);
        $obj = $stmt->fetch();
        $goal_id = $obj['goal_id'];

        //adding goal_id and member_id to member_goals table
        $query = "INSERT INTO member_goals (goal_id,member_id) values (?, ?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$goal_id, $_SESSION['member_id']]);
      }
    }
  }

  protected function searchMemberName($search)
  {
    if ($search == '') {
      $query = "SELECT * FROM member WHERE member_id IN (SELECT member_id FROM personal_trainer_members WHERE personal_trainer_id = ?)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$_SESSION['personal_trainer_id']]);
      return $stmt;
    } else {
      $query = "SELECT COUNT(*) FROM member WHERE member_id IN (SELECT member_id FROM personal_trainer_members WHERE personal_trainer_id = ?) AND first_name LIKE ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$_SESSION['personal_trainer_id'], "%$search%"]);
      $count = $stmt->fetchColumn();
      if ($count != 0) {
        $query = "SELECT * FROM member WHERE member_id IN (SELECT member_id FROM personal_trainer_members WHERE personal_trainer_id = ?) AND first_name LIKE ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$_SESSION['personal_trainer_id'], "%$search%"]);
        return $stmt;
      } else {
        echo "Name not found";
        $query = "SELECT * FROM member WHERE member_id IN (SELECT member_id FROM personal_trainer_members WHERE personal_trainer_id = ?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$_SESSION['personal_trainer_id']]);
        return $stmt;
      }
      return $stmt;
    }
  }

  protected function getMemberData($member_id)
  {
    $query = "SELECT * from member WHERE member_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute([$member_id]);
    return $stmt;
  }
}
