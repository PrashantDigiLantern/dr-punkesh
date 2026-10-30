<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ContactUsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contact_us';

    protected $primaryKey = 'contactus_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "contact_key",
        "name",
        "email",
        "phone",
        "message",
    ];

    
}
