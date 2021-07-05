<?php


namespace App;

class Logger
{
    protected \Exception $error;

    public function __construct(\Exception $error)
    {
        $this->error = $error;
    }

    public function log()
    {
        $file = fopen(__DIR__ . '/../log/log.txt', 'a');
        $date = new \DateTime();
        $date = $date->format('d m Y H:i:s');
        $error = $date . ' ' . $this->error->getMessage() . ' '
            . $this->error->getFile() . ':' . $this->error->getLine() . "\n";
        fwrite($file, $error);
    }
}