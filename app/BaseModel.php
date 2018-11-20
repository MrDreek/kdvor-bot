<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * App\BaseModel
 *
 * @property-read mixed $id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Eloquent
{
    public $timestamps = false;
}
