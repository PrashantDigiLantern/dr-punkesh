<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class MembershipModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'membership';

    protected $primaryKey = 'mem_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "member_key",
        "image",
        "full_image",
        "alt_tag",
        "status",
        "member_status",
        "member_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
