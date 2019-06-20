<?php

namespace App\MySql;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\Product.
 *
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @mixin Eloquent
 *
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
 *
 * @method static Builder|Product whereBigImage($value)
 * @method static Builder|Product whereChecked($value)
 * @method static Builder|Product whereColor($value)
 * @method static Builder|Product whereCountryOfOrigin($value)
 * @method static Builder|Product whereCreated($value)
 * @method static Builder|Product whereCurrency($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereDetails($value)
 * @method static Builder|Product whereExtCategoryId($value)
 * @method static Builder|Product whereExtOfferId($value)
 * @method static Builder|Product whereExtOfferUrl($value)
 * @method static Builder|Product whereExtPicture($value)
 * @method static Builder|Product whereExtSalesNotes($value)
 * @method static Builder|Product whereIP($value)
 * @method static Builder|Product whereImage($value)
 * @method static Builder|Product whereIntCategoryId($value)
 * @method static Builder|Product whereKeyword($value)
 * @method static Builder|Product whereLastIP($value)
 * @method static Builder|Product whereLastUpdated($value)
 * @method static Builder|Product whereLastUserAgent($value)
 * @method static Builder|Product whereLastUserID($value)
 * @method static Builder|Product whereMessageID($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereNcDescription($value)
 * @method static Builder|Product whereNcKeywords($value)
 * @method static Builder|Product whereNcSMODescription($value)
 * @method static Builder|Product whereNcSMOImage($value)
 * @method static Builder|Product whereNcSMOTitle($value)
 * @method static Builder|Product whereNcTitle($value)
 * @method static Builder|Product whereParentMessageID($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriority($value)
 * @method static Builder|Product whereSize($value)
 * @method static Builder|Product whereSubClassID($value)
 * @method static Builder|Product whereSubdivisionID($value)
 * @method static Builder|Product whereUserAgent($value)
 * @method static Builder|Product whereUserID($value)
 * @method static Builder|Product whereVendor($value)
 * @method static Builder|Product whereWeight($value)
 */
class Product extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Message151';
}
