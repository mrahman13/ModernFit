<?php

class managerContr extends managerModel{

  public function createManager($first_name, $last_name, $user_id){
    $this->setManager($first_name, $last_name, $user_id);
  }
}