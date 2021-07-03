<?php


namespace App;


abstract class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function hasAccess(): bool
    {
        return true;
    }

    protected function getAccess(): void
    {
        if($this->hasAccess()){
            $this->accessHandler();
        }else{
            echo 'Error access';
            exit();
        }
    }

    abstract protected function accessHandler();

    public function action(){
        $this->getAccess();
    }
}