<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class GoogleRecaptchaModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'google_recaptcha';

    protected $primaryKey = 'google_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "google_key",
        "site_key",
        "secret_key",
        "status",
        "google_status",
        "google_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
