<?php
ini_set('display_errors', 1);
require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getLastNews(3);

$article = new \App\Models\Article();
$article->article = 'loremipsum987654';
$article->title = 'lorem098765432';
$article->save();

try {
    $a = \App\Models\Article::findById('1')[0];
} catch (Exception $e) {
}
$a->title = 'bbb';
$a->article = 'aaa';
$a->save();
var_dump($a);
var_dump($article);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <?php
    foreach ($data as $datum) {
        ?>
        <li>
            <a href="article.php?id=<?= $datum->id ?>">
                <h1><?= $datum->title ?></h1>
                <h2><?= $datum->article ?></h2>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>
