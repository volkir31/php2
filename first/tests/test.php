<?php
require __DIR__ . '/../App/autoload.php';

$db = new \App\Db();

try {
    var_dump(\App\Models\Article::getLastNews(3));
} catch (\App\Exceptions\DbException $e){
    echo $e->getMessage();
}

