<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class VideoCategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'video_category';

    protected $primaryKey = 'vid_cat_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "vid_cat_key",
        "site_id",
        "org_id",
        "service_cat_id",
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
        "vid_cat_status",
        "vid_cat_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    protected $siteid = null;

    public function __construct($attributes = array())
    {
        if(isset(Session::get('userorginfo')['site_id'])){
            $siteid = Session::get('userorginfo')['site_id'];
        }else{
        if(isset(Session::get('useradmin')['site_id'])){
            $siteid = Session::get('useradmin')['site_id'];
        }
    }
        $this->site_id = $siteid;
        $this->vid_cat_key = uniqid(microtime(true));
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SiteScope('video_category.site_id'));
    }



protected $guard = ['vid_ser_id'];

    public static function tree(){
        $allcategories = VideoServiceModel::get();

        $rootcategories = $allcategories->whereNull('parent_id');

        self::formatTree($rootcategories, $allcategories);

        return $rootcategories;
    }

    private static function formatTree($categories, $allcategories){
        foreach($categories as $category){
            $category->children = $allcategories->where('parent_id', $category->vid_ser_id)->values();
            
            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allcategories);
            }
        }
    }
}