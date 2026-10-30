<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CaptchaModel extends Model
{
    use HasFactory;

    protected $table = 'captcha_code';

    protected $primaryKey = 'id';
    public $timestamps = false;
    const CREATED_AT = 'created_at';

    protected $fillable = [
        "capchacode",
        "uid",
    ];


}
