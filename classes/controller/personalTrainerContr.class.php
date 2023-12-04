<?php

class personalTrainerContr extends personalTrainerModel {
  public function searchMember($member) {
      return $this->getMemberData($member);
  }

}

