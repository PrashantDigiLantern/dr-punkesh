<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class SeoPageModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'seo_page';

    protected $primaryKey = 'seo_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "seo_key",
        "seo_type",
        "page_name",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "image",
        "type",
        "site_name",
        "url",
        "status",
        "seo_status",
        "seo_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
