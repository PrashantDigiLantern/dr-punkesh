<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class SocialDetailModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'social_detail';

    protected $primaryKey = 'social_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "social_key",
        "name",
        "icon",
        "link",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "status",
        "social_status",
        "social_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
