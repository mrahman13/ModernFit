<?php

class usersContr extends usersModel{

  public function createUser($email, $password, $user_role){
    $success = $this->setUser($email, $password, $user_role);
    return $success;
  }

  public function signIn($email, $password){
    $this->signInCheck($email, $password);
  }
}