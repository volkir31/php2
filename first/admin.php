<?php

require __DIR__ . '/autoload.php';

$articles = \App\Models\Article::findAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: space-around;
        }
        div{
            margin-top: 10px;
        }
        li {
            border: 1px solid #000;
            width: 100%;
            max-width: 500px;
            padding: 5px;
        }

        * {
            margin: 0;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 400px;
        }
        form>*{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="content">
    <ul>
        <?php
        foreach ($articles as $article) {
            ?>
            <li>
                <p><?= $article->id ?></p>
                <h1><?= $article->title ?></h1>
                <h2><?= $article->article ?></h2>
                </a>
            </li>
            <?php
        }
        ?>
</div>
<div class="admin">
    <h1>Change/insert</h1>
    <form action="formHandler.php" method="post">
        <input type="text" name="id" placeholder="Id">
        <input type="text" name="author" placeholder="Author">
        <input type="text" name="title" placeholder="Title">
        <textarea type="text" name="article" placeholder="Article"></textarea>
        <button type="submit">Submit</button>
    </form>
    <h1>Delete</h1>
    <form action="formHandler.php" method="post">
        <input type="text" name="removableId">
        <button type="submit">Delete</button>
    </form>
</div>
</ul>
</body>
</html>