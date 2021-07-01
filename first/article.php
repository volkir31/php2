<!doctype html>
<?php
require __DIR__ . '/autoload.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $news = \App\Models\Article::findById($id);
    } catch (Exception $e) {
        echo 'Error';
        exit();
    }
    $news = $news[0];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= $news->title ?></h1>
<h2><?= $news->article?></h2>
</body>
</html>