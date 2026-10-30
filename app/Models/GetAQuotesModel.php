<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GetAQuotesModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'getaquotes';

    protected $primaryKey = 'quotes_id';

    protected $dates = [
        'deleted_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "quotes_key",
        "name",
        "email",
        "phone",
        "service_name",
        "message",
        "quotes",
    ];
}
