<?php


namespace App\Exceptions;


class MultiExceptions extends \Exception
{
    protected array $errors;

    public function addException(\Exception $error){
        $this->errors[] = $error;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function isEmpty(){
        return empty($this->errors);
    }

}