<?php

use App\Exceptions\DbException;

require __DIR__ . '/../App/autoload.php';


$controller = 'Index';
if (isset($_GET['ctrl']) && 'admin' !== lcfirst($_GET['ctrl'])) {
    $controller = trim($_GET['ctrl']);
}
$class = '\App\Controllers\\' . ucfirst($controller);
$controller = new $class;
try {
    $controller->action();
} catch (DbException $e) {
    $error = new \App\Controllers\Error();
    $error->setError($e->getMessage() . ': ' . $e->getSql() . ' in ' . $e->getFile() . ':' . $e->getLine());
    $error->action();
}
