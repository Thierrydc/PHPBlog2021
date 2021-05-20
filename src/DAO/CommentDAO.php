<?php

namespace App\src\DAO;

use App\src\models\Comment;

class CommentDAO extends DAO
{
    //! PARTIE GESTION D'ARTICLES DANS LA BDD
    public function buildComment($row)
    {
        return new Comment($row);
    }

    public function getAll()
    {
        $comments = [];

        $sql = 'SELECT * FROM comments ORDER BY created_at DESC';
        $result = $this->createQuery($sql)->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $id = $row['id'];
            $row['created_at'] = new \DateTime($row['created_at']);
            $comments[$id] = $this->buildComment($row);
        }

        return $comments;
    }
}
