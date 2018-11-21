<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';
}
