<?php

namespace App\Traits;

trait Magic
{
    public function __set(string $name, array $value)
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return [];
    }

    public function __isset(string $name)
    {
        return isset($this->data[$name]);
    }
}