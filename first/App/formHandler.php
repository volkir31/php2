<?php

use App\Exceptions\MultiExceptions;

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
    $article->article = $_POST['article'];
    $article->title = $title = $_POST['title'];
    $article->authorId = $author->name = $_POST['author'];
    $article->save();

    header('location: /Public/admin.php?name=Egor');
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

    header('location: /Public/admin.php?name=Egor');
}
