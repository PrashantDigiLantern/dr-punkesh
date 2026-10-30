<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ConcernModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'concern';

    protected $primaryKey = 'con_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "con_key",
        "name",
        "sort_desc",
        "description",
        "image",
        "alt_tag",
        "type",
        "status",
        "concern_status",
        "concern_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
