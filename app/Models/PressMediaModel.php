<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class PressMediaModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'press_media';

    protected $primaryKey = 'press_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "press_key",
        "press_cat_id",
        "name",
        "dr_name",
        "dr_description",
        "reference",
        "short_desc",
        "description",
        "image",
        "banner_image",
        "all_image",
        "alt_tag",
        "videolink",
        "facebook",
        "twitter",
        "pinterest",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical",
        "url",
        "order_by",
        "status",
        "date",
        "press_status",
        "press_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
