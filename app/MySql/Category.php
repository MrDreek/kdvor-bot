<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereExtCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereExtCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereExtCategoryParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereIntCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLastIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLastUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLastUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLastUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcSMODescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcSMOImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcSMOTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNcTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSubClassID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSubdivisionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUserID($value)
 */
class Category extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Message152';
}
