<?php


namespace App;


use PDO;

class Db
{
    protected object $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new PDO('mysql:host=localhost;dbname=' . $config['dbname'],
            $config['login'],
            $config['password']
        );
    }

    public function query(string $sql, array $data, string $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }
}