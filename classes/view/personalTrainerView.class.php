<?php

class personalTrainerView extends personalTrainerModel{
  
  public function showPersonalTrainer($personal_trainer_id){
    $personal_trainer = $this->getPersonalTrainer($personal_trainer_id);
    return $personal_trainer;
  }
  public function showAllPersonalTrainers(){
    $personal_trainers = $this->getAllPersonalTrainers();
    return $personal_trainers;
  }

  public function showMembers($member){
    $member_data = $this->getMemberData($member);
    $obj = $member_data->fetchAll();
    return $obj;
  }
}