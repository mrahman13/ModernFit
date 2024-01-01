<?php

class emailModel extends dbConnection
{
    public function getEmailAddresses()
    {
        $pdo = $this->connect();
        $query = $pdo->prepare("SELECT email FROM user WHERE user_role = ?");
        $query->execute([$_SESSION['user_role']]);
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

}

