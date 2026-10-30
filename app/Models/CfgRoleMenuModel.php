<?php

namespace App\Models;

use App\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CfgRoleMenuModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cfg_role_menu';

    protected $primaryKey = 'cfgmnu_id';

    protected $dates = [
        'deleted_at',
    ];
    
    protected $fillable = [
        "cfgmnu_org_id",
        "cfgmnu_key",
        "cfgmnu_mnu_id",
        "cfgmnu_act_id",
        "cfgmnu_site_id",
        "cfgmnu_role_id",
        "cfgmnu_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

}
