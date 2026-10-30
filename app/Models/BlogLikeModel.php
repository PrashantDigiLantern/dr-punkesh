<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class BlogLikeModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog_like';

    protected $primaryKey = 'blg_lik_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "blog_key",
        "blog_id",
        "ip_address",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
