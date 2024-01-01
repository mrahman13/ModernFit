<?php

class personalTrainerContr extends personalTrainerModel{

  public function createPersonalTrainer($first_name, $last_name, $profile_picture, $user_id){
    $this->setPersonalTrainer($first_name, $last_name, $profile_picture, $user_id);
  }
}

