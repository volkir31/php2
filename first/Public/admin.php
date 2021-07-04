<?php

use App\Exceptions\DbException;

require __DIR__ . '/../App/autoload.php';

$controller = new \App\Controllers\Admin;
try {
    $controller->action();
} catch (DbException $e) {
    $error = new \App\Controllers\Error();
    $error->setError($e->getMessage() . ': ' . $e->getSql() . ' in ' . $e->getFile() . ':' . $e->getLine());
    $error->action();
}