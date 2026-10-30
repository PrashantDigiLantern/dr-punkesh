<?php

namespace App\Models;

use App\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class CfgUsrRoleModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cfg_usr_role';
    
    protected $primaryKey = 'usr_role_id';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        "cfg_org_id",
        "usr_role_key",
        "usr_id",
        "role_id",
        "plan_id",
        "act_id",
        "cfg_org_id",
        "usr_role_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }
}
