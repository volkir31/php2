<?php
require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->articles =  \App\Models\Article::findAll();
$view->current();

//$view->display(__DIR__. '/templates/index.php');
$view->display(__DIR__. '/templates/index.php');