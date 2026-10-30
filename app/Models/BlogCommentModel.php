<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class BlogCommentModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog_comment';

    protected $primaryKey = 'blg_comm_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "blog_key",
        "parent_id",
        "blog_id",
        "name",
        "email",
        "phone",
        "comment",
        "status",
        "blog_status",
        "blog_attr",
        "date",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
