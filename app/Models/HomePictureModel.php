<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class HomePictureModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'home_picture';

    protected $primaryKey = 'hom_pic_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "home_key",
        "image1_name",
        "image1",
        "image2_name",
        "image2",
        "image3_name",
        "image3",
        "image4_name",
        "image4",
        "alt_tag",
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
