<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ContactDetailModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contact_detail';

    protected $primaryKey = 'contact_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "contact_key",
        "name",
        "address",
        "address1",
        "address2",
        "pincode",
        "show_type",
        "email_id",
        "phone",
        "timings",
        "title_tag",
        "keyword_tag",
        "description_tag",
        "canonical_tag",
        "url",
        "status",
        "order_by",
        "contact_status",
        "contact_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

    
}
