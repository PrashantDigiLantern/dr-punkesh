<?php 
namespace App\Helpers;

use App\Models\MasterUsersModel;
use App\Models\SiteMasterModel;
use App\Models\UserModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Helpers{

    public static function urlpathget(){
        $url = request()->fullUrl();
		//echo '<pre>';print_r($_SERVER); echo '</pre>';
        //$url = explode(":",  $url)[0];
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
		// $url = str_replace(":", "_",  $url);
        return str_replace(".", "_",  $url);
    }

    public static function urlget(){
        $url = request()->fullUrl();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
        return $url;
    }

    public static function adminurlget(){
        $url = request()->fullUrl();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
		// $url = str_replace(":8080", "",  $url);
		$url = str_replace("/admin/login", "",  $url);
        return $url;
    }
 
    public static function adminloginurl(){
		$url = request()->root();
        // $url = request()->fullUrl();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
		// $url = str_replace(".", "_",  $url);
		// $url = str_replace("/admin/login", "",  $url);
        return $url; 
    }
	
	public static function fronturl(){
		$url = request()->root();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
		// $url = str_replace(":", "_",  $url);
		// $url = str_replace(".", "_",  $url);
		// $url = str_replace("/admin/login", "",  $url);
        return $url; 
    }

	public static function frontpathurl(){
		$url = request()->root();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$url = str_replace("https://www.", "",  $url);
		$url = str_replace(".", "_",  $url);
		$url = str_replace(":", "_",  $url);
        return $url; 
    }

	public static function orgnizationlist(){
		$url = request()->root();
		$url = str_replace("http://", "",  $url);
		$url = str_replace("https://", "",  $url);
		$url = str_replace("www.", "",  $url);
		$url = str_replace("http://www.", "",  $url);
		$urlget = str_replace("https://www.", "",  $url);
		// $select_fields = ['master_org.org_id','org_name','org_email','org_plan_id','site_id'];
	
       return $siteview = MasterUsersModel::select('*')->where('usr_id','1');
    }

	public static function sessionget(){
       return Session::get('useradmin')['site_url'];
    }

	
}