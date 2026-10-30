<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class OurServiceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ourservice';

    protected $primaryKey = 'our_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "our_key",
        "type",
        "name",
        "image",
        "thumbnail",
        "after_image",
        "before_image",
        "videolink",
        "description",
        "alt_tag",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "url",
        "status",
        "our_status",
        "our_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
