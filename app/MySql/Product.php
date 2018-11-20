<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\Product
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product query()
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
 * @property string $Name
 * @property string|null $Vendor
 * @property string|null $Description
 * @property string|null $Details
 * @property int $Currency
 * @property string|null $Image
 * @property string|null $BigImage
 * @property float $Price
 * @property string|null $ext_offer_id
 * @property string|null $ext_offer_url
 * @property int|null $ext_category_id
 * @property string|null $ext_picture
 * @property string|null $ext_sales_notes
 * @property float|null $Weight
 * @property string|null $Color
 * @property string|null $Size
 * @property string|null $Country_of_origin
 * @property int|null $int_category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereBigImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereCountryOfOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereExtCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereExtOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereExtOfferUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereExtPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereExtSalesNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereIntCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereLastIP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereLastUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereLastUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereLastUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcSMODescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcSMOImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcSMOTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereNcTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereParentMessageID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereSubClassID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereSubdivisionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereUserID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Product whereWeight($value)
 */
class Product extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Message151';
}
