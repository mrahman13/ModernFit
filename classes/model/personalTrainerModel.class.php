<?php

class personalTrainerModel extends dbConnection
{
    protected function getMemberData($search)
    {
        $query = "SELECT * FROM member WHERE first_name LIKE '%$search%'";
        $member_data = $this->connect()->query($query);
        return $member_data;
    }
}