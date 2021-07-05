<?php


namespace App\Controllers;


use App\Controller;
use App\Exceptions\DbException;

class Index extends Controller
{
    /**
     * @throws DbException
     */
    public function accessHandler()
    {
        $this->view->add('articles' ,\App\Models\Article::findAll());
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }
}