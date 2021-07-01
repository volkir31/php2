<?php


namespace App;


use App\Models\Article;
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

    protected function insert()
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

    protected function update()
    {
        $unformedData = $this->getData();
        $keys = $unformedData['keys'];
        $data = $unformedData['data'];
        $first = [];
        foreach ($keys as $index => $datum) {
            $first[$datum] = ':' . $datum;
        }
        $final = [];
        foreach ($first as $key => $value) {
            $final[] = "{$key}={$value}";
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET '
            . implode(',', $final) . ' WHERE id=' . $this->id;
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id) && !empty(static::findById($this->id))) {
            $this->update();
        }else{
            $this->insert();
        }
    }
}