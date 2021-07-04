<?php

namespace App;

use App\Exceptions\DbException;
use PDO;

class Db
{
    protected object $dbh;

    /**
     * @throws DbException
     */
    public function __construct()
    {
        $config = Config::getInstance();
        try {
            $this->dbh = new PDO('mysql:host=' . $config->getField('host') .
                ';dbname=' . $config->getField('dbname'),
                $config->getField('login'),
                $config->getField('password')
            );
        } catch (\PDOException $e) {
            throw new DbException('', 'Error connection to db');
        }
    }

    /**
     * query with return data from table
     * @param string $sql
     * @param array $data
     * @param string $class
     * @return array
     * @throws DbException
     */
    public function query(string $sql, array $data, string $class): array
    {
        $sth = $this->dbh->prepare($sql);
        if (!$sth->execute($data)) {
            throw new DbException($sql, 'Error when execute query');
        }
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