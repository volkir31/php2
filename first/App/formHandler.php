<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();
if (isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['article']) && !empty($_POST['article']) &&
    isset($_POST['author']) && !empty($_POST['author'])) {

    $author = new \App\Models\Author();
    $author->name = $_POST['author'];
    $author->save();

    $article = new \App\Models\Article();
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $article->id = $_POST['id'];
    }
    $article->authorId = $author->id;
    $article->title = $_POST['title'];
    $article->article = $_POST['article'];
    $article->save();

    header('location: /first/Public/index.php?ctrl=admin&name=Egor');
}

if (isset($_POST['removableId']) && !empty($_POST['removableId']) && is_numeric($_POST['removableId'])) {
    $id = $_POST['removableId'];
    try {
        $article = \App\Models\Article::findById($id)[0];
    } catch (Exception $e) {
        $article = [];
    }
    if (!empty($article)) {
        $article->delete();
    }

    header('location: /first/Public/index.php?ctrl=admin&name=Egor');
}
