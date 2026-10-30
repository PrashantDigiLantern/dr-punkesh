<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class BlogModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog';

    protected $primaryKey = 'blg_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "blog_key",
        "blog_show_type",
        "blog_type",
        "name",
        "dr_description",
        "blog_name",
        "short_desc",
        "blog_description",
        "blog_image",
        "alt_image_name",
        "blog_image_inner",
        "tags",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical",
        "url",
        "status",
        "blog_status",
        "blog_attr",
        "date",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
