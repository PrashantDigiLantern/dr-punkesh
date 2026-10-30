<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class ServiceFaqModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'service_faq';

    protected $primaryKey = 'ser_faq_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "ser_faq_key",
        "service_cat_id",
        "service_id",
        "service_type",
        "question",
        "description",
        "answer",
        "order_by",
        "status",
        "ser_faq_status",
        "ser_faq_attr",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

   
}
