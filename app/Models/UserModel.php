<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'usr_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    
    protected $fillable = [
        "usr_key",
        "name",
        "email",
        "password",
        "status",
        "user_status",
        "user_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
