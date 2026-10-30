<?php

namespace App\Models;

use App\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CfgRoleOperationsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cfg_role_operations';

    protected $primaryKey = 'oper_id';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        "oper_org_id",
        "oper_key",
        "oper_op_id",
        "oper_act_id",
        "oper_site_id",
        "oper_role_id",
        "op_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }
}
