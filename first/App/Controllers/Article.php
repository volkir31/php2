<?php


namespace App\Controllers;


use App\Controller;
use App\Exceptions\DbException;

class Article extends Controller
{

    public function accessHandler()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = \App\Models\Article::findById($id);
        }
        $this->view->display(__DIR__ . '/../../templates/Article.php');
    }

}