<?php

namespace App\MySql;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\MySql\Category.
 *
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @mixin Eloquent
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
 * @method static Builder|Category whereChecked($value)
 * @method static Builder|Category whereCreated($value)
 * @method static Builder|Category whereExtCategoryId($value)
 * @method static Builder|Category whereExtCategoryName($value)
 * @method static Builder|Category whereExtCategoryParentId($value)
 * @method static Builder|Category whereIP($value)
 * @method static Builder|Category whereIntCategoryId($value)
 * @method static Builder|Category whereKeyword($value)
 * @method static Builder|Category whereLastIP($value)
 * @method static Builder|Category whereLastUpdated($value)
 * @method static Builder|Category whereLastUserAgent($value)
 * @method static Builder|Category whereLastUserID($value)
 * @method static Builder|Category whereMessageID($value)
 * @method static Builder|Category whereNcDescription($value)
 * @method static Builder|Category whereNcKeywords($value)
 * @method static Builder|Category whereNcSMODescription($value)
 * @method static Builder|Category whereNcSMOImage($value)
 * @method static Builder|Category whereNcSMOTitle($value)
 * @method static Builder|Category whereNcTitle($value)
 * @method static Builder|Category whereParentMessageID($value)
 * @method static Builder|Category wherePriority($value)
 * @method static Builder|Category whereSubClassID($value)
 * @method static Builder|Category whereSubdivisionID($value)
 * @method static Builder|Category whereUserAgent($value)
 * @method static Builder|Category whereUserID($value)
 */
class Category extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Message152';
}
