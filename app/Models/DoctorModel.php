<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class DoctorModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctor';

    protected $primaryKey = 'doc_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "doctor_key",
        "name",
        "show_type",
        "short_degree",
        "sort_desc",
        "description",
        "home_image",
        "home_desc",
        "image",
        "image2",
        "banner_image",
        "alt_tag",
        "education_desc",
        "education_detail",
        "experience_desc",
        "experience_detail",
        "section",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "order_by",
        "status",
        "doctor_status",
        "doctor_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
