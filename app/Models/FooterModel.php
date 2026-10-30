<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class FooterModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'footer';

    protected $primaryKey = 'footer_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "footer_key",
        "footer_name",
        "footer_type",
        "footer_logo",
        "header_logo",
        "header_logo2",
        "favicon",
        "description",
        "menu_name",
        "alt_tag",
        "status",
        "order_by",
        "footer_status",
        "footer_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
