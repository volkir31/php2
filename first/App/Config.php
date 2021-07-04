<?php


namespace App;


class Config
{

    public array $config = [
        'host' => 'localhost',
        'dbname' => 'php2',
        'login' => 'root',
        'password' => 'root',
    ];
    private static Config $instance;

    private function __construct()
    {
    }

    private function __clone()
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

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->config['host'];
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->config['dbname'];
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->config['login'];
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->config['password'];
    }

    public function setField(string $field, string $value): void
    {
        $this->config[$field] = $value;
    }


}