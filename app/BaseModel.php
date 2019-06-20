<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * App\BaseModel.
 *
 * @property-read mixed $id
 *
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Eloquent
{
    public $timestamps = false;
}
