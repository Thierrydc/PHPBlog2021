<?php

namespace App\src\DAO;

use PDO;
use PDOException;

abstract class DAO
{
    //! PARTIE CONNEXION A LA BDD
    private $db;

    public function __construct()
    {
        $this->getDb();
    }

    public function setDb()
    {
        try {
            $this->db = new \PDO(DB_HOST, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->db;
        } catch (PDOException $e) {
            echo 'Erreur : '.$e->getMessage();
        }
    }

    public function getDb()
    {
        if (null === $this->db) {
            return $this->setDb();
        }

        return $this->db;
    }

    protected function createQuery($sql, $params = null)
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query;
    }
}
