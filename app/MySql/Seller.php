<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\Seller
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller query()
 * @mixin \Eloquent
 * @property int $Subdivision_ID
 * @property int $Catalogue_ID
 * @property int $Parent_Sub_ID
 * @property string $Subdivision_Name
 * @property int|null $Template_ID
 * @property string|null $ExternalURL
 * @property string $EnglishName
 * @property string $LastUpdated
 * @property string $Created
 * @property string|null $LastModified
 * @property int|null $LastModifiedType
 * @property string $Hidden_URL
 * @property int $Read_Access_ID
 * @property int $Write_Access_ID
 * @property int|null $Priority
 * @property int $Checked
 * @property int $Edit_Access_ID
 * @property int $Checked_Access_ID
 * @property int $Delete_Access_ID
 * @property int $Subscribe_Access_ID
 * @property int $Moderation_ID
 * @property int $Favorite
 * @property string|null $TemplateSettings
 * @property bool $UseMultiSubClass
 * @property bool $UseEditDesignTemplate
 * @property int|null $DisallowIndexing
 * @property string|null $Description
 * @property string|null $Keywords
 * @property string|null $Title
 * @property string|null $ncSMO_Title
 * @property string|null $ncSMO_Description
 * @property string|null $ncSMO_Image
 * @property string|null $Language
 * @property string $DisplayType
 * @property string|null $LabelColor
 * @property int $Cache_Access_ID
 * @property int $Cache_Lifetime
 * @property int $Comment_Rule_ID
 * @property float|null $SitemapPriority
 * @property string|null $SitemapChangefreq
 * @property int|null $IncludeInSitemap
 * @property int|null $z_id
 * @property int|null $z_parent_id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $site
 * @property int|null $inn
 * @property float|null $Latitude
 * @property float|null $Longitude
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCacheAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCacheLifetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCatalogueID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCheckedAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCommentRuleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereDeleteAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereDisallowIndexing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereDisplayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereEditAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereEnglishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereExternalURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereFavorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereHiddenURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereIncludeInSitemap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLabelColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLastModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLastModifiedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLastUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereModerationID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereNcSMODescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereNcSMOImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereNcSMOTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereParentSubID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereReadAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSitemapChangefreq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSitemapPriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSubdivisionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSubdivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSubscribeAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereTemplateID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereTemplateSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereUseEditDesignTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereUseMultiSubClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereWriteAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereZId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereZParentId($value)
 */
class Seller extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';

    public const PARENT_SUB_ID = 31;
}
