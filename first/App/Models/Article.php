<?php

namespace App\Models;


use App\Db;
use App\Model;

class Article extends Model
{
    public const TABLE = 'news';

    public string $title;
    public string $article;

    public static function getLastNews(int $limit)
    {
        $db = new Db();
        return $db->query('SELECT * FROM news LIMIT ' . $limit, [], self::class);
    }

}