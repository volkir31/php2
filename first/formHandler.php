<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();
if (isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['article']) && !empty($_POST['article']) &&
    isset($_POST['author']) && !empty($_POST['author'])) {

    $author = new \App\Models\Author();
    $author->name = $_POST['author'];
    $author->save();

    $article = new \App\Models\Article();
    $article->id = $_POST['id'];
    $article->authorId = $author->id;
    $article->title = $_POST['title'];
    $article->article = $_POST['article'];
    $article->save();

    header('location: /first/admin.php');
}

if (isset($_POST['removableId']) && !empty($_POST['removableId']) && is_numeric($_POST['removableId'])) {
    $id = $_POST['removableId'];
    if (isset(\App\Models\Article::findById($id)[0])) {
        $article = \App\Models\Article::findById($id)[0];
        $article->delete();
    }
    header('location: /first/admin.php');
}
