<?php


namespace App\Controllers;

use App\Controller;


class Admin extends Controller
{
    protected function hasAccess(): bool
    {
        return isset($_GET['name']) && 'Egor' === $_GET['name'];
    }

    public function accessHandler()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/admin.php');
    }

}