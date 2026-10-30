<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterMenuModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'master_menu';

    protected $primaryKey = 'mnu_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "mnu_key",
        "mnu_name",
        "mnu_url",
        "mnu_ser_type",
        "mnu_type",
        "mnu_apps_id",
        "mnu_icon",
        "mnu_dropdown",
        "mnu_order",
        "mnu_attr",
        "mnu_sub_type",
        "mnu_status",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
       $this->mnu_key = uniqid(microtime(true));
       parent::__construct($attributes);
    }
}