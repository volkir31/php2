<?php


namespace App;


use Exception;

abstract class Model
{
    public string $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    /**
     * @throws Exception
     */
    public static function findById(string $id): array
    {
        if (is_numeric($id)) {
            $db = new Db();
            $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=' . $id;
            return $db->query($sql, [], static::class);
        }
        throw new Exception('id must be numeric');
    }

    private function getData(): array
    {
        $fields = get_object_vars($this);
        $keys = [];
        $data = [];

        foreach ($fields as $key => $field) {
            if ('id' === $key) {
                continue;
            }
            $keys[] = $key;
            $data[':' . $key] = $field;
        }
        return ['keys' => $keys, 'data' => $data];
    }

    public function insert()
    {
        $unformedData = $this->getData();
        $keys = $unformedData['keys'];
        $data = $unformedData['data'];

        $sql = 'INSERT INTO ' . static::TABLE . ' ('
            . implode(',', $keys) .
            ') VALUES ('
            . implode(',', array_keys($data))
            . ')';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
    }

    public function update()
    {
        $unformedData = $this->getData();
        $keys = $unformedData['keys'];
        $data = $unformedData['data'];

        foreach ($data as $index => $datum) {

        }

        $sql = 'UPDATE ' . static::TABLE . ' SET '
            . implode('', $keys) . implode(',', array_keys($data)) .
            ')' .
            'WHERE id=' . $this->id;

        echo $sql;
//        $db = new Db();
//        $db->execute($sql, $data);
    }
}