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
//        $a = new \App\Models\Article();
//        $a->fill(['title' => 'gfgdfgdfgdg' , 'article' => '987654321', 'authorId' => '10']);
//        var_dump($a);
        $this->view->add('articles' ,\App\Models\Article::findAll());
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }
}