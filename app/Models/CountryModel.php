<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class CountryModel extends Model
{
    use HasFactory;

    protected $table = 'country';

    protected $primaryKey = 'country_id';

   
    
}
