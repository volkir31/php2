<?php


namespace App\Models;


class User
{
    public const TABLE = 'users';

    public string $id;
    public string $email;
    public string $name;

}