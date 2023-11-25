<?php

class usersContr extends usersModel{

  public function createUser($email, $password, $user_role){
    $this->setUser($email, $password, $user_role);
  }

  public function signIn($email, $password){
    $this->signInCheck($email, $password);
  }
}