<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class VideoInnerModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'video_inner';

    protected $primaryKey = 'vid_inn_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "vid_inn_key",
        "video_cat_id",
        "video_service_id",
        "show_type",
        "service_id",
        "name",
        "image",
        "video",
        "alt_img",
        "order_by",
        "status",
        "vid_inn_status",
        "vid_inn_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
