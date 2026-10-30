<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class AppointmentModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'appointment';

    protected $primaryKey = 'app_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "name",
        "email",
        "phone",
        "date",
        "type",
        "country",
        "service_name",
        "message",
        "termcondition",
        
        
    ];
   
}
