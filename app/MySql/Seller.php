<?php

namespace App\MySql;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\MySql\Seller.
 *
 * @method static Builder|Seller newModelQuery()
 * @method static Builder|Seller newQuery()
 * @method static Builder|Seller query()
 * @mixin Eloquent
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
 * @method static Builder|Seller whereCacheAccessID($value)
 * @method static Builder|Seller whereCacheLifetime($value)
 * @method static Builder|Seller whereCatalogueID($value)
 * @method static Builder|Seller whereChecked($value)
 * @method static Builder|Seller whereCheckedAccessID($value)
 * @method static Builder|Seller whereCommentRuleID($value)
 * @method static Builder|Seller whereCreated($value)
 * @method static Builder|Seller whereDeleteAccessID($value)
 * @method static Builder|Seller whereDescription($value)
 * @method static Builder|Seller whereDisallowIndexing($value)
 * @method static Builder|Seller whereDisplayType($value)
 * @method static Builder|Seller whereEditAccessID($value)
 * @method static Builder|Seller whereEmail($value)
 * @method static Builder|Seller whereEnglishName($value)
 * @method static Builder|Seller whereExternalURL($value)
 * @method static Builder|Seller whereFavorite($value)
 * @method static Builder|Seller whereHiddenURL($value)
 * @method static Builder|Seller whereIncludeInSitemap($value)
 * @method static Builder|Seller whereInn($value)
 * @method static Builder|Seller whereKeywords($value)
 * @method static Builder|Seller whereLabelColor($value)
 * @method static Builder|Seller whereLanguage($value)
 * @method static Builder|Seller whereLastModified($value)
 * @method static Builder|Seller whereLastModifiedType($value)
 * @method static Builder|Seller whereLastUpdated($value)
 * @method static Builder|Seller whereLatitude($value)
 * @method static Builder|Seller whereLongitude($value)
 * @method static Builder|Seller whereModerationID($value)
 * @method static Builder|Seller whereNcSMODescription($value)
 * @method static Builder|Seller whereNcSMOImage($value)
 * @method static Builder|Seller whereNcSMOTitle($value)
 * @method static Builder|Seller whereParentSubID($value)
 * @method static Builder|Seller wherePhone($value)
 * @method static Builder|Seller wherePriority($value)
 * @method static Builder|Seller whereReadAccessID($value)
 * @method static Builder|Seller whereSite($value)
 * @method static Builder|Seller whereSitemapChangefreq($value)
 * @method static Builder|Seller whereSitemapPriority($value)
 * @method static Builder|Seller whereSubdivisionID($value)
 * @method static Builder|Seller whereSubdivisionName($value)
 * @method static Builder|Seller whereSubscribeAccessID($value)
 * @method static Builder|Seller whereTemplateID($value)
 * @method static Builder|Seller whereTemplateSettings($value)
 * @method static Builder|Seller whereTitle($value)
 * @method static Builder|Seller whereUseEditDesignTemplate($value)
 * @method static Builder|Seller whereUseMultiSubClass($value)
 * @method static Builder|Seller whereWriteAccessID($value)
 * @method static Builder|Seller whereZId($value)
 * @method static Builder|Seller whereZParentId($value)
 * @property int|null $alloffersamount
 * @property string|null $SEOH1
 * @property string|null $seotext
 * @property string|null $shopname
 * @property string|null $site2
 * @property string|null $site3
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereAlloffersamount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSEOH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSeotext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereShopname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSite2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\Seller whereSite3($value)
 */
class Seller extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';

    public const PARENT_SUB_ID = 31;
}
