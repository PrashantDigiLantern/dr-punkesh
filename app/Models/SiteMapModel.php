<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class SiteMapModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sitemap';

    protected $primaryKey = 'sitemap_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "sitemap_key",
        "site_id",
        "org_id",
        "sitemapxml",
        "sitemaphtml",
        "robots",
        "port",
        "status",
        "sitemap_status",
        "sitemap_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
