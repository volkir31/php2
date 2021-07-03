<?php


namespace App\Controllers;


use App\Controller;
use Exception;

class Article extends Controller
{

    public function accessHandler()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $this->view->article = \App\Models\Article::findById($id);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        $this->view->display(__DIR__ . '/../../templates/Article.php');
    }

}