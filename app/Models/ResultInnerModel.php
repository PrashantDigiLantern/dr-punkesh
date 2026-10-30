<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ResultInnerModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'result_inner';

    protected $primaryKey = 'res_inn_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "result_key",
        "result_cat_id",
        "result_service_id",
        "service_id",
        "name",
        "image_type",
        "beforeimg",
        "afterimg",
        "alt_img",
        "order_by",
        "status",
        "result_status",
        "result_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
