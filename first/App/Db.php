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

    /**
     * query with return data from table
     * @param string $sql
     * @param array $data
     * @param string $class
     * @return array
     */
    public function query(string $sql, array $data, string $class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /**
     * query without return data from table
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /**
     * return last insert id
     * @return string
     */
    public function getLastId(): string
    {
        return $this->dbh->lastInsertId();
    }
}