<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class SliderModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'slider';

    protected $primaryKey = 'slider_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "slider_key",
        "name",
        "image",
        "alt_tag",
        "description",
        "button_type",
        "button_name",
        "button_url",
        "button_style",
        "status",
        "slider_status",
        "slider_attr",
        "order_by",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
