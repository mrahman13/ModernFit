<?php

class personalTrainerModel extends dbConnection
{
    // protected $member_id;
    // protected $first_name;
    // protected $last_name;
    // protected $profile_picture;
    // protected $date_joined;
    // protected $pin;

    protected function getPersonalTrainer($personal_trainer_id)
    {
        $query = "SELECT * from personal_trainer where personal_trainer_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$personal_trainer_id]);
        return $stmt;
    }

    protected function getAllPersonalTrainers()
    {
        $query = "SELECT * from personal_trainer ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([]);
        return $stmt;
    }

    protected function getMemberData($search)
    {
        $query = "SELECT * FROM member WHERE first_name LIKE '%$search%'";
        $member_data = $this->connect()->query($query);
        return $member_data;
    }
}

