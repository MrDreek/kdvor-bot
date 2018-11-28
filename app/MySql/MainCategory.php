<?php

namespace App\MySql;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MySql\MainCategory
 *
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCacheAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCacheLifetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCatalogueID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCheckedAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCommentRuleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereDeleteAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereDisallowIndexing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereDisplayType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereEditAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereEnglishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereExternalURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereFavorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereHiddenURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereIncludeInSitemap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLabelColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLastModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLastModifiedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLastUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereModerationID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereNcSMODescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereNcSMOImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereNcSMOTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereParentSubID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereReadAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSitemapChangefreq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSitemapPriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSubdivisionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSubdivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereSubscribeAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereTemplateID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereTemplateSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereUseEditDesignTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereUseMultiSubClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereWriteAccessID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereZId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MySql\MainCategory whereZParentId($value)
 * @mixin \Eloquent
 */
class MainCategory extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';
}
