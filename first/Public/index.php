<?php

require __DIR__ . '/../App/autoload.php';


$controller = 'Index';
if (isset($_GET['ctrl'])) {
    $controller = trim($_GET['ctrl']);
}
$class = '\App\Controllers\\' . ucfirst($controller);
$controller = new $class;
$controller->action();