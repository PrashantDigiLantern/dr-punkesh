<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialVideoModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'testimonial_video';

    protected $primaryKey = 'test_video_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "video_cat_id",
        "video_service_id",
        "show_type",
        "name",
        "image",
        "video",
        "video_play_id",
        "alt_img",
        "status",
        "order_by",
        "created_by",
        "updated_by",
        "deleted_by",
    ];
}
