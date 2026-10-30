<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CfgMnuOperationsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cfg_mnu_operations';

    protected $primaryKey = 'mnu_oper_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "cfg_oper_key",
        "cfg_mun_id",
        "cfg_op_id",
        "cfg_act_id",
        "cfg_op_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        $this->cfg_oper_key = uniqid(microtime(true));
        parent::__construct($attributes);
    }
}
