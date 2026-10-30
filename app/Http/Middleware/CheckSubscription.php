<?php

namespace App\Http\Middleware;

use App\Helpers\Helpers;
use App\Models\SiteMasterModel;
use Closure;
use Illuminate\Http\Request;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         $url = Helpers::fronturl();

        // $siteview = SiteMasterModel::select('sub_org_id')
        // ->join('cfg_subscription','sub_site_id','=','site_master.site_id')
        // ->where('site_url',$url)
        // ->where('sub_end_date','>=',date('Y-m-d'));
        // // echo $siteview->count();die();
        // if($siteview->count() < 1){
        //     return redirect('/no-authorization');
        // }

        return $next($request);
    }
}
