<?php

class personalTrainerModel extends dbConnection
{
    protected function getPersonalTrainer($personal_trainer_id) {
        $query = "SELECT * from personal_trainer where personal_trainer_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$personal_trainer_id]);
        return $stmt;
    }

    protected function getAllPersonalTrainers() {
        $query = "SELECT * from personal_trainer ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([]);
        return $stmt;
    }
    protected function setPersonalTrainer($first_name, $last_name, $profile_picture, $user_id)
    {
      $query = "SELECT COUNT(*) FROM personal_trainer WHERE user_id = ?";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$user_id]);
      $count = $stmt->fetchColumn();
      if ($count == 0) {
        $query = "INSERT INTO personal_trainer (first_name,last_name,profile_picture,user_id) values (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$first_name, $last_name, $profile_picture, $user_id]);
      }
    }
}

