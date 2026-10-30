<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class GalleryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gallery';

    protected $primaryKey = 'gallery_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "gallery_key",
        "gallery_show_type",
        "gallery_image",
        "full_image",
        "gallery_name",
        "alt_tag",
        "status",
        "gallery_status",
        "gallery_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
