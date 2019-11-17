<?php
namespace App;

/**
 * Class Category
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $parent_name
 */
class CategoryCollection extends BaseModel
{
    protected $collection = 'category_collection';
}
