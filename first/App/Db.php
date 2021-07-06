<?php

namespace App;

use App\Exceptions\DbException;
use App\Models\Article;
use PDO;
use PDOException;

class Db
{
    protected object $dbh;


    /**
     * @throws DbException
     */
    public function __construct()
    {
        $config = Config::getInstance();
        $host = $config->getField('host');
        $dbname = $config->getField('dbname');
        $login = $config->getField('login');
        $password = $config->getField('password');
        try {
            $this->dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $login, $password);
        } catch (PDOException $e) {
            throw new DbException('', 'Connection Error');
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
        try {
            $sth->execute($data);
        } catch (PDOException $e) {
            throw new DbException($sql, 'Error when execute query');
        }
        $result = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        if (empty($result)) {
            throw new DbException('', '404 Error - not found', 404);
        }
        return $result;
    }

    public function queryEach(string $sql, array $data): \Generator
    {
        $sth = $this->dbh->prepare($sql);
        try {
            $sth->execute($data);
        } catch (PDOException $e) {
            throw new DbException($sql, 'Error when execute query');
        }
        for ($i = 0; $i < $sth->rowCount(); $i++) {
            yield $sth->fetch(PDO::FETCH_CLASS, Article::class);
        }
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