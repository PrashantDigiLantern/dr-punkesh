<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRoleModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'master_role';

    protected $primaryKey = 'role_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    
    protected $fillable = [
        "role_key",
        "role_name",
        "role_apps_id",
        "role_org_id",
        "role_status",
        "role_desc",
        "role_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];
    

    public function __construct($attributes = array())
    {
        $this->role_key = uniqid(microtime(true));
        parent::__construct($attributes);
    }
}
