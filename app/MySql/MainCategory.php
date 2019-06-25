<?php

namespace App\MySql;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\MySql\MainCategory.
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
 *
 * @method static Builder|MainCategory newModelQuery()
 * @method static Builder|MainCategory newQuery()
 * @method static Builder|MainCategory query()
 * @method static Builder|MainCategory whereCacheAccessID($value)
 * @method static Builder|MainCategory whereCacheLifetime($value)
 * @method static Builder|MainCategory whereCatalogueID($value)
 * @method static Builder|MainCategory whereChecked($value)
 * @method static Builder|MainCategory whereCheckedAccessID($value)
 * @method static Builder|MainCategory whereCommentRuleID($value)
 * @method static Builder|MainCategory whereCreated($value)
 * @method static Builder|MainCategory whereDeleteAccessID($value)
 * @method static Builder|MainCategory whereDescription($value)
 * @method static Builder|MainCategory whereDisallowIndexing($value)
 * @method static Builder|MainCategory whereDisplayType($value)
 * @method static Builder|MainCategory whereEditAccessID($value)
 * @method static Builder|MainCategory whereEmail($value)
 * @method static Builder|MainCategory whereEnglishName($value)
 * @method static Builder|MainCategory whereExternalURL($value)
 * @method static Builder|MainCategory whereFavorite($value)
 * @method static Builder|MainCategory whereHiddenURL($value)
 * @method static Builder|MainCategory whereIncludeInSitemap($value)
 * @method static Builder|MainCategory whereInn($value)
 * @method static Builder|MainCategory whereKeywords($value)
 * @method static Builder|MainCategory whereLabelColor($value)
 * @method static Builder|MainCategory whereLanguage($value)
 * @method static Builder|MainCategory whereLastModified($value)
 * @method static Builder|MainCategory whereLastModifiedType($value)
 * @method static Builder|MainCategory whereLastUpdated($value)
 * @method static Builder|MainCategory whereLatitude($value)
 * @method static Builder|MainCategory whereLongitude($value)
 * @method static Builder|MainCategory whereModerationID($value)
 * @method static Builder|MainCategory whereNcSMODescription($value)
 * @method static Builder|MainCategory whereNcSMOImage($value)
 * @method static Builder|MainCategory whereNcSMOTitle($value)
 * @method static Builder|MainCategory whereParentSubID($value)
 * @method static Builder|MainCategory wherePhone($value)
 * @method static Builder|MainCategory wherePriority($value)
 * @method static Builder|MainCategory whereReadAccessID($value)
 * @method static Builder|MainCategory whereSite($value)
 * @method static Builder|MainCategory whereSitemapChangefreq($value)
 * @method static Builder|MainCategory whereSitemapPriority($value)
 * @method static Builder|MainCategory whereSubdivisionID($value)
 * @method static Builder|MainCategory whereSubdivisionName($value)
 * @method static Builder|MainCategory whereSubscribeAccessID($value)
 * @method static Builder|MainCategory whereTemplateID($value)
 * @method static Builder|MainCategory whereTemplateSettings($value)
 * @method static Builder|MainCategory whereTitle($value)
 * @method static Builder|MainCategory whereUseEditDesignTemplate($value)
 * @method static Builder|MainCategory whereUseMultiSubClass($value)
 * @method static Builder|MainCategory whereWriteAccessID($value)
 * @method static Builder|MainCategory whereZId($value)
 * @method static Builder|MainCategory whereZParentId($value)
 * @mixin Eloquent
 */
class MainCategory extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Subdivision';
}
