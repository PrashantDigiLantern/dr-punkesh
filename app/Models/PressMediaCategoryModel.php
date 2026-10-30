<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class PressMediaCategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'press_media_category';

    protected $primaryKey = 'press_cat_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "press_cat_key",
        "name",
        "description",
        "image",
        "logo",
        "alt_tag",
        "videolink",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical",
        "url",
        "order_by",
        "status",
        "press_status",
        "press_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

}
