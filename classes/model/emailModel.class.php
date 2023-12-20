<?php

class emailModel extends dbConnection
{
    public function getEmailAddresses()
    {
        $pdo = $this->connect();
        $query = $pdo->prepare("SELECT email FROM user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

}

