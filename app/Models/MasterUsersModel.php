<?php

namespace App\Models;

use App\Helpers\Helpers;
use App\Scopes\LoginScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterUsersModel extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'master_users';

    protected $primaryKey = 'usr_id';

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        "usr_first_name",
        "usr_last_name",
        "usr_email",
        "usr_mobile",
        "usr_password",
        "usr_org_id",
        "created_by",
        "usr_mode",
        "usr_reporting_to",
    ];
   
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

    public function scopeLogin($query, $type)
    {
        return $query->where('usr_email', $type['email'])
        ->where('usr_password', md5($type['password']));   
    }

    public function scopeMatchemail($query, $type)
    {
        return $query->where('usr_email', $type['email']);
    }
}
