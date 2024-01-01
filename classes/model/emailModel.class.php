<?php

class emailModel extends dbConnection
{
    public function getEmailAddresses($user_role)
    {
        $pdo = $this->connect();
        $query = $pdo->prepare("SELECT email FROM user WHERE user_role = ?");
        $query->execute([$user_role]);
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

}

