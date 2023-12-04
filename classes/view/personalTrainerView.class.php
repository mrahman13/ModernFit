<?php

class personalTrainerview extends personalTrainerModel {
    public function showMembers($member){
        $member_data = $this->getMemberData($member);
        $obj = $member_data->fetchAll();
        return $obj;
    }
}