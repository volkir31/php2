<?php


namespace App\Controllers;


use App\Controller;

class Error extends Controller
{
    protected string $error;

    public function accessHandler()
    {
        $this->view->error = [$this->error];
        $this->view->display(__DIR__ . '/../../templates/error.php');
    }

    public function setError(string $error){
        $this->error = $error;
    }

}