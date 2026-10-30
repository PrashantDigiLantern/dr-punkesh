<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class TestimonialModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'testimonial';

    protected $primaryKey = 'test_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "test_key",
        "test_show_type",
        "name",
        "short_name",
        "designation",
        "source",
        "description",
        "testimonial_image",
        "alt_image_name",
        "rating",
        "opinions",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "status",
        "test_status",
        "test_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
