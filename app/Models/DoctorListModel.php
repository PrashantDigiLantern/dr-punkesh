<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class DoctorListModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctor_list';

    protected $primaryKey = 'doc_lit_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "doctor_key",
        "video_type",
        "doctor_id",
        "description",
        "section1",
        "section2",
        "banner_image",
        "video_link",
        "alt_tag",
        "education_name",
        "education_college",
        "experience_name",
        "experience_address",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "status",
        "doctor_status",
        "doctor_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
