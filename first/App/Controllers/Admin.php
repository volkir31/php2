<?php


namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;
use App\Exceptions\DbException;


class Admin extends Controller
{
    protected function hasAccess(): bool
    {
        return isset($_GET['name']) && 'Egor' === $_GET['name'];
    }

    /**
     * @throws DbException
     */
    public function accessHandler()
    {
        try {
            $data = \App\Models\Article::findAll();
            $a = ['title' => function (\App\Models\Article $article) {
                return $article->title;
            },
                'trimmedText' => function (\App\Models\Article $article) {
                    return mb_strimwidth($article->article, 0, 100);
                }

            ];
            $table = new AdminDataTable($data, $a);
            $this->view->add('table',$table->render());
//            $this->view->articles = \App\Models\Article::findAll();
            $this->view->display(__DIR__ . '/../../templates/admin.php');
        } catch (\PDOException $e){
            throw new DbException($e->getMessage());
        }

    }

}