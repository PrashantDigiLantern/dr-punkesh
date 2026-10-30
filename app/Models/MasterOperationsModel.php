<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterOperationsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'master_operations';

    protected $primaryKey = 'op_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "op_key",
        "op_name",
        "op_title",
        "op_link",
        "op_ser_type",
        "op_type",
        "op_icon_link",
        "op_text_style",
        "op_status",
        "op_attr",
        "op_view_order",
        "op_sub_type",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    public function __construct($attributes = array())
    {
        $this->op_key = uniqid(microtime(true));
        parent::__construct($attributes);
    }
}
