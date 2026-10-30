<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterActionsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'master_actions';

    protected $primaryKey = 'act_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "act_name",
        "act_key",
        "act_descr",
        "is_active",
        "act_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        $this->act_key = uniqid(microtime(true));
        parent::__construct($attributes);
    }
}
