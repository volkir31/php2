<?php


namespace App\Controllers;

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
            $this->view->articles = \App\Models\Article::findAll();
            $this->view->display(__DIR__ . '/../../templates/admin.php');
        } catch (\PDOException $e){
            throw new DbException($e->getMessage());
        }

    }

}