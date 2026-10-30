<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class AboutModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'about';

    protected $primaryKey = 'abt_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "about_key",
        "name",
        "image",
        "home_image",
        "home_section",
        "heading1",
        "section1",
        "section2",
        "heading2",
        "section3",
        "heading3",
        "section4",
        "heading4",
        "section5",
        "status",
        "about_status",
        "about_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];
    
}
