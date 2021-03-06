<?php


namespace App;


use App\Exceptions\DbException;
use App\Exceptions\MultiExceptions;
use Exception;

abstract class Model
{
    public string $id;

    /**
     * return all row from table
     * @return array
     * @throws DbException
     */
    public static function findAll(): array
    {
        $db = new Db();
        try {
            $sql = 'SELECT * FROM ' . static::TABLE;
            return $db->query($sql, [], static::class);
        } catch (DbException $e) {
            throw new DbException($e->getSql(), $e->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public static function findById(string $id): array
    {
        if (is_numeric($id)) {
            $db = new Db();
            $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=' . $id;
            $result = $db->query($sql, [], static::class);
            try {
                return $result;
            } catch (DbException $e) {
                throw new DbException('', '404 Error - not found', 404);
            }

        }
        throw new Exception('id must be numeric');
    }

    /**
     * return data from object vars
     * @return array
     */
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


    /**
     * @throws MultiExceptions
     */
    public function fill(array $data)
    {
        var_dump($data);
        foreach ($data as $index => $datum) {
//            $errors = new MultiExceptions();
//            var_dump($datum);
//            if ('name' === $index && 1 >= strlen($datum)) {
//                $errors->addException(new Exception('Name must be more than 2 characters'));
//                continue;
//            }
//            if ('article' === $index && str_word_count($datum) <= 1) {
//                $errors->addException(new Exception('Article must be more than 5 words'));
//                continue;
//            }
//            if ('title' === $index && str_word_count($datum) <= 2) {
//                $errors->addException(new Exception('Title must be more than 2 words'));
//                continue;
//            }
            $this->$index = $datum;
//            if ($errors->isEmpty()) {
//                throw $errors;
//            }
        }
        return $this;
    }

    /**
     * insert article to database
     */
    protected function insert()
    {
        $unformedData = $this->getData();
        $keys = $unformedData['keys'];
        $data = $unformedData['data'];
        var_dump($keys);
        var_dump($data);
        $sql = 'INSERT INTO ' . static::TABLE . ' ('
            . implode(',', $keys) .
            ') VALUES ('
            . implode(',', array_keys($data))
            . ')';
        echo $sql;
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
    }

    /**
     * update row by id
     */
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

    /**
     * remove row from database
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=' . $this->id;
        $db = new Db();
        $db->execute($sql, []);
    }

    public function save()
    {
        if (isset($this->id) && !empty(static::findById($this->id))) {
            $this->update();
        } else {
            $this->insert();
        }
    }
}