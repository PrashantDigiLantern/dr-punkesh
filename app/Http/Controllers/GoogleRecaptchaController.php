<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\GoogleRecaptchaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CaptchaModel;
use Exception;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class GoogleRecaptchaController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }
    
    public function index()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach (session('userinfo')['user_operation_permissions'] as $oplist) {
            if ($oplist->op_link == $uri) {
                $uripermission = $oplist->oper_act_id;
                $uripermission = explode(',', $uripermission);
            }
        }
        $data['permission'] = $uripermission;

        $select_table = ['google_id', 'site_key','secret_key','status','google_status'];
        $data['view'] = GoogleRecaptchaModel::select($select_table)->get();
        return view('admin.google-recaptcha.list-google-recaptcha')->with($data);
    }

    public function add()
    {
        $data = GoogleRecaptchaModel::find(session('primeid'));
        return view('admin.google-recaptcha.add-google-recaptcha', ['view' => $data]);
    }
    

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $technology = GoogleRecaptchaModel::find($id);
        $technology->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $technology = GoogleRecaptchaModel::find($id);
        $technology->update($request->input());
    }

    public function CreateGoogleRecaptcha(Request $request)
    {
        $google_id = $request->input('google_id');
        if($google_id < 1){
        $google = GoogleRecaptchaModel::create($request->input());
        Session::put('primeid', $google->google_id);
    }else{
            $googlerecaptcha = GoogleRecaptchaModel::find($google_id);
            $googlerecaptcha->update(array_merge($request->input(),
                [
                    'google_key' => $googlerecaptcha->google_key,
                ]
            ));
            }
            return redirect('admin/google-recaptcha');
    }

   
    public function EditGoogleRecaptcha($id)
    {
        Session::put('primeid', $id);
        $data = GoogleRecaptchaModel::find($id);
        return view('admin.google-recaptcha.edit-google-recaptcha', ['edit' => $data]);
    }

    public function DeleteGoogleRecaptcha($id)
    {
        $technology = GoogleRecaptchaModel::find($id);
        $technology->update(['deleted_by' => session('useradmin')['usr_id']]);
        $technology->delete();
        return redirect('admin/google-recaptcha');
    }

    public function CustomCaptcha(){
     $length=5;
    //   function prime ($length=8) {
        $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($char) - 1;
        $random = "";
        for ($i=0; $i<=$length; $i++) {
          $random .= substr($char, rand(0, $max), 1);
        }
        Session::put('captcha',$random);
        $uniqid = Str::random(16);
    
    
    //   }
    
      // (B) DRAW THE CAPTCHA IMAGE
      $output=1;
      $width=250;
      $height=70;
      $fontsize=28;
    //   $resdirectory = env('MAIN_DIRECTORY');
      $font = Storage::path('public/fonts/Arial.ttf');
    //   $font="C:\Windows\Fonts\arial.ttf";
    //   function draw ($output=1, $width=300, $height=100, $fontsize=24, $font="C:\Windows\Fonts\arial.ttf") {
        // (B1) OOPS.
        $captchasess = session('captcha');
        if (!isset($captchasess)) { throw new Exception("CAPTCHA NOT PRIMED"); }
    
        // (B2) CREATE BLANK IMAGE
        $captcha = imagecreatetruecolor($width, $height);
    
        // (B3) FUNKY BACKGROUND IMAGE
        // $background = "";
        $background = Storage::path('public/captcha-back.jpg');
        // return $background;
        // $background = "http://localhost:8081/images/captcha-back.jpg";
    // die;
        list($bx, $by) = getimagesize($background);
        // die('hi');
        if ($bx-$width<0) { $bx = 0; }
        else { $bx = rand(0, $bx-$width); }
        if ($by-$height<0) { $by = 0; }
        else { $by = rand(0, $by-$height); }
        $background = imagecreatefromjpeg($background);
        imagecopy($captcha, $background, 0, 0, $bx, $by, $width, $height);
    
        // (B4) THE TEXT SIZE
        $text_size = imagettfbbox($fontsize, 0, $font, session('captcha'));
        $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
        $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);
    
        // (B5) CENTERING THE TEXT BLOCK
        $centerX = CEIL(($width - $text_width) / 2);
        $centerX = $centerX<0 ? 0 : $centerX;
        $centerX = CEIL(($height - $text_height) / 2);
        $centerY = $centerX<0 ? 0 : $centerX;
    
        // (B6) RANDOM OFFSET POSITION OF THE TEXT + COLOR
        if (rand(0,1)) { $centerX -= rand(0,40); }
        else { $centerX += rand(0,40); }
        $colornow = imagecolorallocate($captcha, rand(001,001), rand(211,001), rand(208,001)); // Random bright color
        // $colornow = imagecolorallocate($captcha, rand(120,255), rand(120,255), rand(120,255)); // Random bright color
        imagettftext($captcha, $fontsize, rand(-8,8), $centerX, $centerY, $colornow, $font, session('captcha'));
    
        // (B7) OUTPUT AS JPEG IMAGE
        if ($output==0) {
          header("Content-type: image/png");
          imagejpeg($captcha);
          imagedestroy($captcha);
        }
    
        // (B8) OUTPUT AS BASE 64 ENCODED HTML IMG TAG
        else {
        //   echo  session('captcha');
          ob_start();
          imagejpeg($captcha);
          $ob = base64_encode(ob_get_clean());
    
          $imgTag = "<img src='data:image/jpeg;base64,$ob' height='50' width='100' loading='lazy' alt='Captcha'>";
          $data = array(
              'captcha' => $imgTag,
              'captchashow' => session('captcha'),
              'captchashows' => $imgTag,
              'unic' => $uniqid,
              'uniqid' => $uniqid
          );
          $data1 = array(
              'uid' => $uniqid,
              'capchacode' => session('captcha'),
          );
          captchaModel::create($data1);
          return response()->json($data);
        }
    }
}
