<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ResultServiceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'result_service';

    protected $primaryKey = 'res_ser_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "result_key",
        "parent_id",
        "category_type",
        "design_type",
        "result_cat_id",
        "service_id",
        "name",
        "image",
        "banner_image",
        "video_type",
        "video_link",
        "alt_tag",
        "description",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "order_by",
        "status",
        "result_status",
        "result_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  

    protected $guard = ['res_ser_id'];

    public static function tree(){
        $allcategories = ResultServiceModel::get();

        $rootcategories = $allcategories->whereNull('parent_id');

        self::formatTree($rootcategories, $allcategories);

        return $rootcategories;
    }

    private static function formatTree($categories, $allcategories){
        foreach($categories as $category){
            $category->children = $allcategories->where('parent_id', $category->res_ser_id)->values();
            
            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allcategories);
            }
        }
    }
}
