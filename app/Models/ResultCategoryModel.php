<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ResultCategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'result_category';

    protected $primaryKey = 'res_cat_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "result_key",
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
        "result_status",
        "result_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
