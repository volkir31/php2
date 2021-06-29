<?php

namespace App\Models;

use App\Db;

class Article
{
    public string $id;
    public string $title;
    public string $content;

    public static function findAll(): string
    {
        $db = new Db();
        return $db->query('SELECT * FROM news', [], Article::class);
    }
}