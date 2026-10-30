<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class RedirectUrlModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'redirect_url';

    protected $primaryKey = 'redirect_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "redirect_key",
        "site_id",
        "org_id",
        "page_name",
        "page_type",
        "oldrouteurl",
        "old_url",
        "current_url",
        "port",
        "status",
        "redirect_status",
        "redirect_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
