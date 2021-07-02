<?php

namespace App\Models;


use App\Db;
use App\Model;
use Exception;

class Article extends Model
{
    public const TABLE = 'news';
    public string $authorId;
    public string $title;
    public string $article;

    /**
     * @param string $name
     * @return array
     * @throws Exception
     */
    public function __get(string $name): array
    {
        if ('author' === $name && !empty($this->authorId)) {
            return Author::findById($this->authorId);
        }
        return [];
    }

    /**
     * return news from first to limit
     * @param int $limit
     * @return array
     */
    public static function getLastNews(int $limit): array
    {
        $db = new Db();
        return $db->query('SELECT * FROM news LIMIT ' . $limit, [], self::class);
    }

}