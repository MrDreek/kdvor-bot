<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';

    public const PARENT_SUB_ID = 31;
}
