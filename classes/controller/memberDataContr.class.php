<?php

class memberDataContr extends memberDataModel{
    
    public function searchMember($member) {
    return $this->searchMemberName($member);
    }
}