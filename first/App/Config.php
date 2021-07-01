<?php


namespace App;


class Config
{

    public array $config = [
        'host'=>'localhost',
        'dbname' => 'php2',
        'login' => 'root',
        'password' => 'mysqlPAS!root',
    ];
    private static Config $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance(): Config
    {
        if (empty(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function getField(string $field): string
    {
        return $this->config[$field];
    }

    public function setField(string $field, string $value): void
    {
        $this->config[$field] = $value;
    }


}