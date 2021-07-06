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
    $logger = new \App\Logger($e);
    $error = new \App\Controllers\Error();
    if (404 !==$e->getCode()) {
        $error->setError($e->getMessage() . ': ' . $e->getSql() . ' in ' . $e->getFile() . ':' . $e->getLine());
    }else{
        $error->setError($e->getMessage());
    }
    $error->action();
    $logger->log();
}
