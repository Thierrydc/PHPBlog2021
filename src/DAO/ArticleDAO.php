<?php

namespace App\src\DAO;

use App\src\models\Article;

class ArticleDAO extends DAO
{
    //! PARTIE GESTION D'ARTICLES DANS LA BDD
    public function buildArticle($row)
    {
        return new Article($row);
    }

    public function getAll()
    {
        $articles = [];

        $sql = 'SELECT * FROM articles ORDER BY created_at DESC';
        $result = $this->createQuery($sql)->fetchAll();

        foreach ($result as $row) {
            $id = $row['id'];
            $articles[$id] = $this->buildArticle($row);
        }

        return $articles;
    }
}
