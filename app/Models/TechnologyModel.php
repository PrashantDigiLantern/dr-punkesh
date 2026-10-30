<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class TechnologyModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'technology';

    protected $primaryKey = 'tech_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "tech_key",
        "name",
        "image",
        "banner_image",
        "alt_tag",
        "short_desc",
        "description",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical",
        "url",
        "order_by",
        "status",
        "tech_status",
        "tech_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
