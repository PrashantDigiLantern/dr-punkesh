<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class HomeTechnologyModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'home_technology';

    protected $primaryKey = 'hom_tec_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "home_key",
        "heading",
        "heading2",
        "image_name",
        "image",
        "image2_name",
        "image2",
        "alt_tag",
        "name1",
        "name2",
        "name3",
        "description",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "url",
        "status",
        "home_status",
        "home_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];


}
