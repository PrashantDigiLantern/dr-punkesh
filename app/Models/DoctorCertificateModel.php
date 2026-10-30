<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class DoctorCertificateModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctor_certificate';

    protected $primaryKey = 'certificate_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "certificate_key",
        "certificate_show_type",
        "certificate_image",
        "doctor_id",
        "full_image",
        "alt_tag",
        "status",
        "certificate_status",
        "certificate_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

  
}
