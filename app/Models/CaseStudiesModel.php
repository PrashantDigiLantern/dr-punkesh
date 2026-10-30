<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudiesModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'case_studies';

    protected $primaryKey = 'case_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "parent_id",
        "show_type",
        "category_type",
        "design_type",
        "video_type",
        "case_cat_id",
        "case_type",
        "case_name",
        "case_image",
        "case_banner_image",
        "home_banner_image",
        "video_link",
        "alt_tag",
        "description",
        "homedescription",
        "short_desc",
        "section",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "status",
        "order_by"
    ];
}
