<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class GalleryCategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gallery_category';

    protected $primaryKey = 'gallery_cat_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "gallery_key",
        "gallery_cat_name",
        "gallery_cat_image",
        "status",
        "gallery_status",
        "gallery_attr",
        "alt_tag",
        "created_by",
        "updated_by",
        "deleted_by",
    ];


}
