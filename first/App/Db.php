<?php

namespace App;

use PDO;

class Db
{
    protected object $dbh;

    public function __construct()
    {
        $config = Config::getInstance();
        $this->dbh = new PDO('mysql:host=' . $config->getField('host') .
            ';dbname=' . $config->getField('dbname'),
            $config->getField('login'),
            $config->getField('password')
        );
    }

    public function query(string $sql, array $data, string $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}