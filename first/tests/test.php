<?php
require __DIR__ . '/../App/autoload.php';

$db = new \App\Db();

//$db->execute('INSERT INTO news (title, article) VALUES (? ,?)', ['lorem4', 'loremipsum4']);
//$db->execute('INSERT INTO users (email, name) VALUES (? ,?)', ['example@example.ru', 'Oleg']);

//try {
//    var_dump(\App\Models\Article::findById('1'));
//} catch (Exception $e) {
//    echo 'ID must be numerical';
//}

var_dump(\App\Models\Article::getLastNews(3));
