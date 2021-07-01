<?php


namespace App\Models;


use App\Model;

class User extends Model
{
    public const TABLE = 'users';

    public string $email;
    public string $name;


}