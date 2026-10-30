<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ServiceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'service';

    protected $primaryKey = 'ser_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "ser_key",
        "sub_heading",
        "video_type",
        "parent_id",
        "category_type",
        "show_type",
        "banner_show",
        "category_section",
        "design_type",
        "service_cat_id",
        "service_type",
        "service_icon",
        "service_name",
        "name_desc",
        "description2",
        "service_image",
        "service_banner_image",
        "video_link",
        "alt_tag",
        "description",
        "homedescription",
        "home_banner_image",
        "short_desc",
        "section",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "status",
        "ser_status",
        "ser_attr",
        "order_by",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   

    protected $guard = ['ser_id'];

    public static function tree(){
        $allcategories = ServiceModel::get();

        $rootcategories = $allcategories->whereNull('parent_id');

        self::formatTree($rootcategories, $allcategories);

        return $rootcategories;
    }

    private static function formatTree($categories, $allcategories){
        foreach($categories as $category){
            $category->children = $allcategories->where('parent_id', $category->ser_id)->values();
            
            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allcategories);
            }
            // foreach($category->children as $child){
            //     $child->children = $allcategories->where('parent_id', $child->ser_id)->values();
            // }
        }
    }
}
