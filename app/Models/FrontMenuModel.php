<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class FrontMenuModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'front_menu';

    protected $primaryKey = 'mnu_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "menu_key",
        "parent_id",
        "menu_type",
        "type",
        "name",
        "page_heading",
        "urllink",
        "dropdown",
        "menu_banner_image",
        "alt_tag",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical",
        "status",
        "menu_status",
        "menu_attr",
        "order_by",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   

    protected $guard = ['mnu_id'];

    public static function tree(){
        $allmenu = FrontMenuModel::get();

        $rootmenu = $allmenu->whereNull('parent_id');

        self::formatTree($rootmenu, $allmenu);

        return $rootmenu;
    }
 
    public static function frontmenu(){
        $allmenu = FrontMenuModel::where('menu_status', 'publish')->where('status', 'active')->get();

        $rootmenu = $allmenu->whereNull('parent_id');

        self::formatTree($rootmenu, $allmenu);

        return $rootmenu;
    }

    private static function formatTree($menu, $allmenu){
        foreach($menu as $menulist){
            $menulist->children = $allmenu->where('parent_id', $menulist->mnu_id)->values();
            
            if($menulist->children->isNotEmpty()){
                self::formatTree($menulist->children, $allmenu);
            }
        }
    }
}
