<?php

namespace App;

use App\Exceptions\DbException;
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
        $host = $config->getHost();
        $dbname = $config->getDbname();
        $login = $config->getLogin();
        $password = $config->getPassword();
        try {
            $this->dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $login, $password);
        }catch (PDOException $e){
            throw new DbException( '', 'Connection Error');
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
        $result = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        if (empty($result)) {
            throw new DbException('', 'No data');
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