<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category query()
 * @mixin \Eloquent
 * @property int $Message_ID
 * @property int $User_ID
 * @property int $Subdivision_ID
 * @property int $Sub_Class_ID
 * @property int $Priority
 * @property string $Keyword
 * @property string|null $ncTitle
 * @property string|null $ncKeywords
 * @property string|null $ncDescription
 * @property string|null $ncSMO_Title
 * @property string|null $ncSMO_Description
 * @property string|null $ncSMO_Image
 * @property bool $Checked
 * @property string|null $IP
 * @property string|null $UserAgent
 * @property int $Parent_Message_ID
 * @property string $Created
 * @property string $LastUpdated
 * @property int $LastUser_ID
 * @property string|null $LastIP
 * @property string|null $LastUserAgent
 * @property string $ext_category_name
 * @property int $ext_category_id
 * @property int|null $ext_category_parent_id
 * @property int|null $int_category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereExtCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereExtCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereExtCategoryParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereIntCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereLastIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereLastUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereLastUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereLastUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcSMODescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcSMOImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcSMOTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereNcTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereParentMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereSubClassID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereSubdivisionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Category whereUserID($value)
 */
class Category extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Message152';
}
