<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class VideoServiceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'video_service';

    protected $primaryKey = 'vid_ser_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "vid_ser_key",
        "parent_id",
        "category_type",
        "design_type",
        "video_cat_id",
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
        "vid_ser_status",
        "vid_ser_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

}
