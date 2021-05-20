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
        $result = $this->createQuery($sql)->fetchAll();

        foreach ($result as $row) {
            if (isset($row['created_at'])) {
                $row['created_at'] = strtotime($row['created_at']);
            }

            $id = $row['id'];
            $comments[$id] = $this->buildComment($row);
        }

        return $comments;
    }
}
