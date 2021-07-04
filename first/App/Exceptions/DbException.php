<?php

 namespace App\Exceptions;

use Exception;
use Throwable;

class DbException extends Exception
{
    protected string $sql;

    public function __construct(string $sql, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->sql = $sql;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->sql;
    }
}