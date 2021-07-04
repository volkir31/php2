<?php


namespace App\Controllers;


use App\Controller;
use Exception;

class Article extends Controller
{

    /**
     * @throws Exception
     */
    public function accessHandler()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = \App\Models\Article::findById($id);
        }
        var_dump($this->view->article);
        $this->view->display(__DIR__ . '/../../templates/Article.php');
    }

}