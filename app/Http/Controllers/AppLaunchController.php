<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OwnerMail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


use App\Models\AboutModel;
use App\Models\BlogModel;
use App\Models\CaseStudiesModel;
use App\Models\ContactDetailModel;
use App\Models\ContactUsModel;
use App\Models\DoctorCertificateModel;
use App\Models\DoctorModel;
use App\Models\FooterModel;
use App\Models\FrontMenuModel;
use App\Models\GalleryCategoryModel;
use App\Models\GalleryModel;
use App\Models\GoogleRecaptchaModel;
use App\Models\MembershipModel;
use App\Models\ResultInnerModel;
use App\Models\ResultServiceModel;
use App\Models\SeoPageModel;
use App\Models\ServiceFaqModel;
use App\Models\ServiceModel;
// use App\Models\ServiceSectionModel;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\TestimonialModel;
use App\Models\TestimonialVideoModel;
use App\Models\VideoInnerModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\CaptchaModel;
use App\Models\TechnologyModel;
use Illuminate\Support\Facades\Storage;

class AppLaunchController extends Controller
{
    public function __construct(Helpers $siteurl)
    {
       $this->siteurl = $siteurl;
    }

    public function appLaunch()
    {
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();

        // $data['datadic'] = $resdirectory.$frontpathurl;
        // View::addLocation($data['datadic']);
        $seourl = '';
        // find org id from site url
        // Pick all records of this org list
        // $siteview = Helpers::orgnizationlist();
        // $this->initializeSession($siteview->first());

       // $data['orgdata'] = $siteview->first();

        // Pick all records of this testimonial list
        $select_fields = ['test_id','source','rating','description','short_name','name'];
        $data['testimonial'] = TestimonialModel::select($select_fields)->where('status','active')
        ->limit(4)->orderBy('test_id','desc')->get();

        $select_table = ['test_video_id','name','image','video','alt_img'];
        $data['video_testimonial'] = TestimonialVideoModel::select($select_table)->where('status','active')
        ->limit(5)->orderBy('test_video_id','desc')->get();

        $select_table = ['vid_inn_id','name','image','video','alt_img'];
        $data['video'] = VideoInnerModel::select($select_table)->where('status','active')
        ->limit(3)->orderBy('vid_inn_id','desc')->get();

        // Pick all records of this blog list
        $select_fields = ['blg_id','blog_type','blog_name','name','short_desc','blog_description','blog_image','alt_image_name','date','url'];
        $data['blog'] = BlogModel::select($select_fields)->where('status','active')
        ->where('blog_show_type','outside')
        ->limit(3)->orderBy('blg_id','desc')->get();

        // Pick all records of real results list
        $data['real_results'] = ResultInnerModel::join('result_service', 'result_inner.result_service_id', '=', 'result_service.res_ser_id')
            ->where('result_inner.status', 'active')
            ->where('result_service.status', 'active')
            ->select(
                'result_inner.res_inn_id',
                'result_inner.beforeimg',
                'result_inner.afterimg',
                'result_inner.alt_img',
                'result_service.name as category_name',
                'result_service.url as category_url'
            )
            ->orderBy('result_inner.res_inn_id', 'desc')
            ->get();

        if ($data['real_results']->isEmpty()) {
            $data['real_results'] = ResultServiceModel::where('status', 'active')
                ->select(
                    'res_ser_id as res_inn_id',
                    'image as beforeimg',
                    'name as category_name',
                    'url as category_url',
                    'alt_tag as alt_img'
                )
                ->orderBy('res_ser_id', 'desc')
                ->get();
        }

        // Pick all records of active technologies
        $select_tech = ['tech_id', 'name', 'image', 'banner_image', 'alt_tag', 'short_desc', 'description', 'url'];
        $data['technologies'] = TechnologyModel::select($select_tech)
            ->where('status', 'active')
            ->orderBy('tech_id', 'desc')
            ->get();

        $data['seotitle'] = self::seopage();
        // print_r('hi',$data['seotitle']);
        // die('hj');
        // $data['slider'] = $this->homesliderquery();
        // $data['service'] = $this->homeservicerquery();
        // $data['aboutclinic'] = $this->homeaboutquery();
        // $data['doctorlist'] = $this->homedoctorquery();
       return view('website.index')->with($data);
    }


    public function ClinicGallery(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this gallery list
        $select_table = ['gallery_id','gallery_name','gallery_cat_id','gallery_image', 'full_image', 'alt_tag'];
        $data['gallery'] = GalleryModel::select($select_table)->where('status','active')
        ->orderBy('gallery_id','desc')->Paginate(9);

        if (request()->ajax() || request()->wantsJson()) {
            $html = view('website.gallery-card-item')->with($data)->render();
            return response()->json([
                'html' => $html,
                'hasMore' => $data['gallery']->hasMorePages(),
                'nextPage' => $data['gallery']->currentPage() + 1,
                'total' => $data['gallery']->total()
            ]);
        }

        // dd( $data['gallery']);
        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.clinic-gallery')->with($data);
    }

    private static function homesliderquery(){
        // Pick all records of this slider list
        $select_fields = ['slider_id','name','image','alt_tag','description','button_type','button_name','button_url','button_style','url'];
      return  SliderModel::select($select_fields)->where('status','active')
        ->orderBy('order_by','asc')->get();
    }

    private static function homeservicerquery(){
        // Pick all records of this service list
        $select_fields = ['ser_id','service_name','home_banner_image','homedescription','url'];
      return  ServiceModel::select($select_fields)->where('status','active')
        ->where('category_type','service')->orderBy('order_by','asc')->get();
    }

    private static function homeaboutquery(){
        // Pick all records of this service list
        $select_fields = ['abt_id','name','image','home_image','home_section','heading1','section1','section2','heading2','section3','heading3','section4','heading4','section5'];
        return AboutModel::select($select_fields)->where('status','active')
        ->get();
    }


public function ResultsFirstCategory(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this gallery list
        $select_table = ['res_ser_id','name','image','alt_tag','url'];
        $data['result'] = ResultServiceModel::select($select_table)->where('status','active')
        ->orderBy('res_ser_id','asc')->Paginate(9);

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.before-after')->with($data);
    }


    public function RealResultsDetail($url){

        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;


        $data['res_ser_data'] = ResultServiceModel::select('res_ser_id','name','url','banner_image')->where('status','active')->where('url',$url)
        ->get()->first();
        $id = $data['res_ser_data']->res_ser_id;
        // dd( $data['res_ser_data']);

        // Pick all records of this gallery list
        $select_table = ['res_inn_id','result_service_id','beforeimg','afterimg', 'alt_img'];
        $data['result'] = ResultInnerModel::select($select_table)->where('status','active')->where('result_service_id',$id)
        ->orderBy('res_inn_id','asc')->Paginate(9);

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.before-after-detail')->with($data);
    }


    private static function homedoctorquery(){
        // Pick all records of this service list
        $select_fields = ['doc_id','name','sort_desc','short_degree','home_desc','home_image','description','image','banner_image','education_desc','education_detail','experience_desc','experience_detail','alt_tag','url'];
        return DoctorModel::select($select_fields)->where('status','active')
        ->where('show_type','outside')->orderBy('order_by','asc')->get();
    }

      public static function CommanAppointmentSideBar(){


        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        // View::addLocation($data['datadic']);
        return view('website.sidebar-book-an-appointment')->with($data);
    }

    public static function CommanAppointment(){


        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        // View::addLocation($data['datadic']);
        return view('website.common-book-an-appointment')->with($data);
    }



    public function CustomCaptcha(){
         $length=5;
        $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($char) - 1;
        $random = "";
        for ($i=0; $i<=$length; $i++) {
          $random .= substr($char, rand(0, $max), 1);
        }
        Session::put('captcha',$random);
        $uniqid = Str::random(16);

        $output=1;
        $width=250;
        $height=70;
        $fontsize=28;
        $font = Storage::path('public/fonts/arial.ttf');
        $captchasess = session('captcha');
        if (!isset($captchasess)) { throw new Exception("CAPTCHA NOT PRIMED"); }
        $captcha = imagecreatetruecolor($width, $height);
        $background = Storage::path('public/captcha-back.jpg');

        list($bx, $by) = getimagesize($background);
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

          $data = array(
              'captchashow' => session('captcha'),
              'captchashows' => "$ob",
              'uniqid' => $uniqid
            );
            $data1 = array(
                'uid' => $uniqid,
                'capchacode' => session('captcha'),
            );
            captchaModel::create($data1);
            return $data;
        }
    }

    public static function RequestACallback(){
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        // View::addLocation($data['datadic']);
        return view('website.common-request-a-callback')->with($data);
    }

        public static function RequestACallbackMobile(){
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        // View::addLocation($data['datadic']);
        return view('website.mobile-common-request-a-callback')->with($data);
    }



    public static function GetAQuote(){
        $url = '';

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        if(isset(request()->segments()[0])){
            $url = request()->segments()[0];
            $select_table = ['ser_id','service_name'];
        $data['servicedetail'] = ServiceModel::select($select_table)->where('status','active')
        ->where('url',$url)->first();
            }else{
                $select_table = ['ser_id','service_name'];
        $data['servicedetail'] = ServiceModel::select($select_table)->where('category_type','service')->where('status','active')->get();
            }


        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        // View::addLocation($data['datadic']);
        return view('website.get-a-quote')->with($data);
    }

    public static function CommanTestimonials(){
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['test_id','source','rating','description','short_name','name'];
        $data['testimonial'] = TestimonialModel::select($select_fields)->where('status','active')
        ->where('test_show_type','outside')
        ->limit(2)->orderBy('test_id','desc')->get();

        $data['seotitle'] = self::seopage();

        // print_r($data['testimonial']);
        View::addLocation($data['datadic']);
        return view('website.common-testimonials')->with($data);
    }

    public static function LeftsideCommanAppointment(){
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();


        View::addLocation($data['datadic']);
        return view('website.left-side-common-appointment')->with($data);
    }

    // public static function CommanHeader(){
    //     //pick resource directory path
    //     $resdirectory = env('RES_DIRECTORY');
    //     $frontpathurl = Helpers::frontpathurl();
    //     $data['datadic'] = $resdirectory.$frontpathurl;

    //     // Pick all records of this menu list
    //    $data['firstmenu'] = FrontMenuModel::frontmenu();

    //    $select_fields = ['footer_id','header_logo','header_logo2','alt_tag'];
    //     $data['headerlogo'] = FooterModel::select($select_fields)->where('status','active')
    //     ->where('footer_type','leftside')->first();

    //     $select_fields = ['contact_id','name','address','address1','address2','email_id','phone','timings'];
    //     $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
    //     ->where('show_type','outside')->first();

    //     // Pick records of this seo list

    //     // die();
    //     $data['seotitle'] = self::seopage();
    //     // echo '<pre>';print_r($data['seotitle']);echo '</pre>';die();
    //     // print_r($data['seotitle']);

    //     View::addLocation($data['datadic']);
    //     return view('home.header')->with($data);
    // }

    // public static function CommanFooter(){
    //     //pick resource directory path
    //     $resdirectory = env('RES_DIRECTORY');
    //     $frontpathurl = Helpers::frontpathurl();
    //     $data['datadic'] = $resdirectory.$frontpathurl;

    //     $select_fields = ['contact_id','name','address','address1','address2','pincode','email_id','phone','timings'];
    //     $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
    //     ->where('show_type','outside')->first();
    //     // print_r($data['contactus']);die();->where('show_type','outside')
    //     $select_fields = ['footer_id','footer_type','footer_name','footer_logo','description','menu_name','alt_tag'];
    //     $data['footer'] = FooterModel::select($select_fields)->where('status','active')
    //     ->get();

    //     View::addLocation($data['datadic']);
    //     return view('home.footer')->with($data);
    // }



    public function TermsCondition(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        $data['seotitle'] = self::seopage();
        return view('website.terms-and-conditions')->with($data);
    }

    public function LegalDisclaimer(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        $data['seotitle'] = self::seopage();
        return view('website.legal-disclaimer')->with($data);
    }

    public function PrivacyPolicy(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        $data['seotitle'] = self::seopage();
        return view('website.privacy-policy')->with($data);
    }


    public function AboutClinic(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;


        $select_table = ['test_video_id','name','image','video','alt_img'];
        $data['video_testimonial'] = TestimonialVideoModel::select($select_table)->where('status','active')
        ->limit(3)->orderBy('test_video_id','desc')->get();

        $select_table = ['vid_inn_id','name','image','video','alt_img'];
        $data['video'] = VideoInnerModel::select($select_table)->where('status','active')
        ->limit(3)->orderBy('vid_inn_id','desc')->get();



        // Pick all records of this gallery list
        $select_table = ['gallery_id','gallery_name','gallery_cat_id','gallery_image', 'full_image', 'alt_tag'];
        $data['gallery'] = GalleryModel::select($select_table)->where('status','active')
        ->where('gallery_show_type','outside')->limit(3)->orderBy('gallery_id','desc')->get();

        $select_fields = ['test_id','source','rating','description','short_name','name'];
        $data['testimonial'] = TestimonialModel::select($select_fields)->where('status','active')
        ->limit(4)->orderBy('test_id','desc')->get();

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.about-clinic')->with($data);
    }

    public function AboutClinicTwo(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $data['aboutlist'] = $this->homeaboutquery();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this gallery list
        $select_table = ['gallery_id','gallery_name','gallery_cat_id','gallery_image', 'full_image', 'alt_tag'];
        $data['gallery'] = GalleryModel::select($select_table)->where('status','active')
        ->where('gallery_show_type','outside')->limit(3)->orderBy('gallery_id','desc')->get();

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.about-clinic-two')->with($data);
    }

    public function AboutDoctor(){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $select_fields = ['doc_id','name','short_degree','sort_desc','description','image','banner_image','education_desc','education_detail','experience_desc','experience_detail','alt_tag','url'];
        $data['doctorlist'] = DoctorModel::select($select_fields)->where('status','active')
        ->orderBy('order_by','asc')->get();

        $select_fields = ['mem_id','image','full_image','alt_tag'];
        $data['membership'] = MembershipModel::select($select_fields)->where('status','active')
        ->get();

        $select_fields = ['certificate_id','doctor_id','certificate_name','certificate_image','full_image','alt_tag'];
        $data['doctorcertificate'] = DoctorCertificateModel::select($select_fields)->where('status','active')
        ->orderBy('order_by','asc')->get();

        $select_fields = ['test_id','source','rating','description','short_name','name'];
        $data['testimonial'] = TestimonialModel::select($select_fields)->where('status','active')
        ->limit(4)->orderBy('test_id','desc')->get();

        $data['seotitle'] = self::seopage();

        // print_r($data['doctorcertificate']);
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        // View::addLocation($data['datadic']);
        return view('website.about-doctor')->with($data);
    }

    public static function ContactDetail(){
        $select_fields = ['contact_id','name','address','address1','address2','pincode','email_id','phone','timings'];
        $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
        ->where('show_type','outside')->first();

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.clinic-address')->with($data);
    }

    public function Services(){
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        $select_table = ['ser_id','design_type','video_type','service_cat_id','service_type','service_name','service_image','alt_tag','short_desc','url'];
        $data['service'] = ServiceModel::select($select_table)->where('category_type','firstcategory')->where('status','active')->get();
        $data['seotitle'] = self::seopage();
        return view('website.treatments')->with($data);
    }

    public function Service_category($url){

        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_table = ['ser_id','design_type','video_type','service_cat_id','service_type','service_name','service_image','alt_tag','short_desc','url','service_banner_image'];
        $data['service'] = ServiceModel::select($select_table)->where('url',$url)->where('status','active')->get()->first();
        $ser_id =  $data['service']->ser_id;

        $data['service_category'] = ServiceModel::select($select_table)->where('parent_id',$ser_id)->where('status','active')->get();
        $data['seotitle'] = self::seopage();
        return view('website.treatments-category')->with($data);
    }

    public function Sub_service_category($url,$url1){

        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_table = ['category_type','url','ser_id','service_name','sub_heading','banner_show','short_desc','description','service_image','service_banner_image','section','title_tag','keyword_tag','description_tag','canonical_tag'];
        $data['serviceMain'] = ServiceModel::select($select_table)->where('url',$url)->where('status','active')->first();
        $data['service'] = ServiceModel::select($select_table)->where('url',$url1)->where('status','active')->first();
        if(!$data['serviceMain'] || !$data['service']){
            abort(404);
        }
        $ser_id = $data['service']->ser_id;
        $data['seotitle'] = self::seopage();




        $select_table1 = ['ser_faq_id', 'service_cat_id','service_id','question', 'answer','order_by', 'status','ser_faq_status'];
        $data['servicefaqs'] = ServiceFaqModel::select($select_table1)->where('status','active')
        ->where('service_id',$ser_id)->get();




// dd( $data['serviceMain'] );
        $Sub_service_category = ServiceModel::select($select_table)->where('parent_id',$ser_id)->where('status','active')->get();
        // dd($Sub_service_category);
        if(count($Sub_service_category) > 0){//echo "DSfSD";die;
            $data['Sub_service_category']  =  $Sub_service_category;
            return view('website.treatments-sub-category')->with($data);
        }else{

            $main_service_id = $data['serviceMain']->ser_id;
            $data['service_cat'] = ServiceModel::select($select_table)->where('status','active')
            ->where('ser_id',$main_service_id)->get()->first();

            $data['servicedetail'] = $data['service'];
            return view('website.lasertoning')->with($data);
        }


    }

    public function ServiceDetails($url){

        if(isset(request()->segments()[1])){
            $urldata = request()->segments()[1];
        }else{
            $urldata = request()->segments()[0];
        }


        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this service list
        $select_table = ['category_type','url','parent_id','ser_id','sub_heading','service_name','banner_show','short_desc','description','service_image','service_banner_image','section','title_tag','keyword_tag','description_tag','canonical_tag'];
        $servicedetail = ServiceModel::select($select_table)->where('status','active')
        ->where('url',$urldata);



        if($servicedetail->count() < 1){
            abort(404);
        }
        $data['servicedetail'] = $servicedetail->first();
        $data['seotitle'] = self::seopage();

        $ser_id = '';
        if(isset($data['servicedetail']->ser_id)){
            $ser_id = $data['servicedetail']->ser_id;
            $parent_id = $data['servicedetail']->parent_id;
        }

        $data['serviceMain'] = ServiceModel::select($select_table)->where('status','active')
        ->where('ser_id',$parent_id)->get()->first();

        if ($data['serviceMain']) {
            $main_service_id = $data['serviceMain']->parent_id;
            $data['service_cat'] = ServiceModel::select($select_table)->where('status','active')
            ->where('ser_id',$main_service_id)->get()->first();
        } else {
            $data['service_cat'] = null;
        }

        // dd($data['service_cat']);
        // dd($ser_id,$parent_id,$serviceMain);
        // Pick all records of this Service faq list
        $select_table = ['ser_faq_id', 'service_cat_id','service_id','question', 'answer','order_by', 'status','ser_faq_status'];
        $data['servicefaqs'] = ServiceFaqModel::select($select_table)->where('status','active')
        ->where('service_id',$ser_id)->get();

        // dd($data['servicefaqs']);

        // View::addLocation($data['datadic']);
        return view('website.lasertoning')->with($data);

    }


    public function SubServices($url){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        $select_table = ['ser_id','design_type','video_type','service_cat_id','service_type','service_name','service_image','alt_tag','short_desc','url'];
        $service = ServiceModel::select($select_table)->where('url',$url)->where('status','active');
        if($service->count() < 1){
            abort(404);
        }
        $data['service'] = $service->first();
        // Pick all records of this service list
        $select_table = ['ser_id','design_type','video_type','service_cat_id','service_type','service_name','service_image','alt_tag','short_desc','url'];
        $data['subservice'] = ServiceModel::select($select_table)->where('parent_id',$data['service']->ser_id)->where('status','active')->Paginate(9);
        // View::addLocation($data['datadic']);
        $data['seotitle'] = self::seopage();

        return view('website.sub-services')->with($data);
    }



    public function ErrorPage(){
        return response()->view('website.404', [], 404);
    }


      public function send_mail($from_name,$from_email,$to_email,$subject,$message,$bcc)
    {
        $subjectsec = $subject;
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '';                     // SMTP username
            $mail->Password   = 'ldnektesxztfcfqk';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($from_email, $from_name);
            $mail->addAddress($to_email);     // Add a recipient
            $mail->addCC($bcc);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subjectsec;
            $mail->Body    = $message;
            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }




       public function mailForn(){


             $emailper  = 'ysharma2301@gmail.com';

                     $detailsowner = [
    'name' =>  "yogesh",
    'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
    'clientphone' =>  "9645124545",
    'page' => 'request-owner',
    'message' => "test",
];

        Mail::to('ysharma2301@gmail.com')->send(new OwnerMail($detailsowner));


// $emailper  =   'ysharma2301@gmail.com';
// $message_owner = "testing";

//   $this->send_mail('test', 'ysharma2301@gmail.com', $emailper, 'New Appointment Details', $message_owner, 'ysharma2301@gmail.com');

// echo "SDfd";die;

}

     public function Blogs(){

//                   $detailsowner = [
//     'name' =>  "yogesh",
//     'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
//     'clientphone' =>  "9645124545",
//     'page' => 'request-owner',
//     'message' => "test",
// ];
// Mail::to('ysharma2301@gmail.com')->send(new OwnerMail($detailsowner));

// echo "SDfd";die;


        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this blog list



        $select_table = ['blg_id','blog_type','name','blog_name','short_desc','blog_image','alt_image_name','url','date'];
        $data['blog'] = BlogModel::select($select_table)->where('status','active')->orderBy('date', 'desc')->Paginate(9);

        if (request()->ajax() || request()->wantsJson()) {
            $html = view('website.blog-card-item')->with($data)->render();
            return response()->json([
                'html' => $html,
                'hasMore' => $data['blog']->hasMorePages(),
                'nextPage' => $data['blog']->currentPage() + 1,
                'total' => $data['blog']->total()
            ]);
        }

        $data['blog1'] = BlogModel::select($select_table)->where('status','active')
        ->limit(4)->orderBy('date','desc')->get();

        // View::addLocation($data['datadic']);

        $data['seotitle'] = self::seopage();

        return view('website.blogs')->with($data);
    }

    public function BlogDetails($url){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this blog detail list
        $select_table = ['blg_id','blog_type','name','blog_name','blog_image','blog_description','blog_image_inner','alt_image_name','url','date','title_tag','keyword_tag','description_tag','canonical'];
        $blogdetail = BlogModel::select($select_table)->where('url',$url)
        ->where('status','active');
        if($blogdetail->count() < 1){
            abort(404);
        }
        $data['bloglist'] = $blogdetail->first();
        // Pick 3 records of this blog list
         $data['blog1'] = BlogModel::select($select_table)->where('status','active')
        ->limit(4)->orderBy('date','desc')->get();

        $select_fields = ['contact_id','name','address','address1','address2','pincode','email_id','phone','timings'];
        $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
        ->where('show_type','outside')->first();

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.blog-details')->with($data);
    }


    public function CaseCtudies(){
        // die('hi');
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        // echo $parent_id;die();
        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this case studies list
        $select_table = ['case_id','case_name','case_image','case_banner_image','video_link','alt_tag','description','short_desc','section','url'];
        $data['casestudiesone'] = CaseStudiesModel::select($select_table)->where('status','active')->orderBy('case_id','desc')->limit(1)->first();

        $select_table = ['case_id','case_name','case_image','case_banner_image','video_link','alt_tag','description','short_desc','section','url'];

        $data['casestudies'] = CaseStudiesModel::select($select_table)->where('case_id','!=',$data['casestudiesone']->case_id)->where('status','active')->orderBy('case_id','desc')
        ->paginate(1);

        $data['seotitle'] = self::seopage();

        // echo '<pre>';print_r(count($data['casestudies']));echo '</pre>';
        // View::addLocation($data['datadic']);
        return view('website.case-studies')->with($data);
    }

    public function CaseCtudiesDetails($url){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this blog detail list
        $select_table = ['blg_id','blog_type','name','blog_name','blog_description','blog_image_inner','alt_image_name','url','date','title_tag','keyword_tag','description_tag','canonical'];
        $blogdetail = BlogModel::select($select_table)->where('url',$url)
        ->where('status','active');
        if($blogdetail->count() < 1){
            return redirect('/');
        }
        $data['bloglist'] = $blogdetail->first();
        // Pick five records of this blog list
        $select_table = ['blg_id','blog_type','name','blog_name','short_desc','blog_image','alt_image_name','url','date'];
        $data['blog'] = BlogModel::select($select_table)->where('status','active')
        ->limit(5)->orderBy('blg_id','desc')->get();

        $select_fields = ['contact_id','name','address','address1','address2','pincode','email_id','phone','timings'];
        $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
        ->where('show_type','outside')->first();

        $data['seotitle'] = self::seopage();

        // View::addLocation($data['datadic']);
        return view('website.blog-details')->with($data);
    }

    public function BookAnAppointment(){


        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // $select_fields = ['google_id','site_key','secret_key'];
        // $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')->first();

        // View::addLocation($data['datadic']);

        // 'ExampleCaptcha' => [
        //     'UserInputID' => 'CaptchaCode',
        //     'ImageWidth' => 250,
        //     'ImageHeight' => 50,
        //   ],




        $data['seotitle'] = self::seopage();

        return view('website.schedule-a-consultaion')->with($data);
    }


    public function ContactUs(){
        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $select_fields = ['contact_id','name','address','address1','address2','email_id','phone','timings'];
        $data['contactus'] = ContactDetailModel::select($select_fields)->where('status','active')
        ->get();

        $select_fields = ['google_id','site_key','secret_key'];
        $data['googlerecaptcha'] = GoogleRecaptchaModel::select($select_fields)->where('status','active')
        ->first();

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;
        // View::addLocation($data['datadic']);

        $data['seotitle'] = self::seopage();

        return view('website.contact')->with($data);
    }


 public function Testimonials(){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this testimonial list
        $select_table = ['test_id','name','short_name','designation','source','description','testimonial_image','alt_image_name','rating'];
        $data['testimonial'] = TestimonialModel::select($select_table)->where('status','active')->orderBy('test_id', 'desc')->Paginate(9);

        if (request()->ajax() || request()->wantsJson()) {
            $html = view('website.testimonial-card-item')->with($data)->render();
            return response()->json([
                'html' => $html,
                'hasMore' => $data['testimonial']->hasMorePages(),
                'nextPage' => $data['testimonial']->currentPage() + 1,
                'total' => $data['testimonial']->total()
            ]);
        }

        $data['seotitle'] = self::seopage();

        return view('website.written-testimonials')->with($data);
    }

    public function VideoTestimonials(){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this testimonial list
        $select_table = ['test_video_id','name','image','video','alt_img'];
        $data['testimonial'] = TestimonialVideoModel::select($select_table)->where('status','active')->Paginate(9);
        // View::addLocation($data['datadic']);
        $data['seotitle'] = self::seopage();

        return view('website.video-testimonials')->with($data);
    }

     public function Videos(){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // Pick all records of this video list
        $select_table = ['vid_inn_id','name','image','video','alt_img'];
        $data['video'] = VideoInnerModel::select($select_table)->where('status','active')->Paginate(9);
        // print_r($data['videos']);
        // View::addLocation($data['datadic']);

        $data['seotitle'] = self::seopage();

        return view('website.videos')->with($data);
    }

    public function ThankYou(){
        // Pick all records of this org id
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory.$frontpathurl;

        // print_r($data['videos']);
        // View::addLocation($data['datadic']);

        $data['seotitle'] = self::seopage();

        return view('website.thankyou')->with($data);
    }

    private function initializeSession($result)
    {
        $urlpathget = Helpers::frontpathurl();

        $site_url = request()->root().'/template/'.$urlpathget.'/';
        //set session userinfo
        Session::put('userorginfo', [
            'org_id' => '1',
            'site_id' => '1',
            'site_url' => '1',
        ]);
    }

    public static function seopage()
    {
        $seourl = request()->segment(1);
        $seourl2 = request()->segment(2);
        if($seourl == '' || $seourl == '/'){
            $seourl = 'home';
        }
        // echo $seourl;
        // Pick records of this seo list
        $select_fields = ['seo_id','page_name','title_tag','keyword_tag','description_tag','canonical_tag','url','image','type','site_name'];
        $metatag = SeoPageModel::select($select_fields)->where('url',$seourl)
       ->where('status','active');
        // echo $metatag->count();
       if($metatag->count() > 0){
          return $data['metatag'] = $metatag->first();
       }else{
           $select_fields = ['seo_id','page_name','title_tag','keyword_tag','description_tag','canonical_tag','url','image','type','site_name'];
        $metatag = SeoPageModel::select($select_fields)->where('url',$seourl2)
       ->where('status','active');
       return $data['metatag'] = $metatag->first();
       }
    }

    public function NoAuthorization(){
        return view("401");
    }

    public function Technology()
    {

        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory . $frontpathurl;

        // Pick all records of this technology list

        $select_table = ['tech_id', 'name', 'image', 'short_desc', 'banner_image', 'alt_tag', 'url', 'status', 'tech_status'];
        $data['technology'] = TechnologyModel::select($select_table)->where('status', 'active')->orderBy('tech_id', 'DESC')->Paginate(12);

     // View::addLocation($data['datadic']);

        $data['seotitle'] = self::seopage();

        return view('website.technology')->with($data);
    }


    public function TechnologyDetails($url)
    {

        // Pick all records of this org list
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        //pick resource directory path
        $resdirectory = env('RES_DIRECTORY');
        $frontpathurl = Helpers::frontpathurl();
        $data['datadic'] = $resdirectory . $frontpathurl;

        // Map aliases for clean technology detail URLs
        $aliases = [
            'helios-ndyag' => 'qsndy-q-switched-nd-yag-helios-iii',
            'alma-soprano-ice' => 'alma-soprano-ice-hair-removal-laser',
            'hifu' => 'hifu-ultracelq',
            'vivace-mnrf' => 'vivace-mnrf-microneedling-radio-frequency',
            'radio-frequency' => 'radio-frequencyrf',
            'alma-pixel-co2' => 'alma-pixel-co-2',
            'harmony-xl-pro' => 'alma-harmony-xl-pro',
        ];
        if (isset($aliases[$url])) {
            $url = $aliases[$url];
        }

        // Pick all records of this technology detail list
        $select_table = ['tech_id', 'name', 'image', 'short_desc', 'banner_image', 'alt_tag', 'url', 'description', 'status', 'tech_status'];
        $techdetail = TechnologyModel::select($select_table)->where('url', $url)
            ->where('status', 'active');

        if ($techdetail->count() < 1) {
            return redirect('/');
        }
        $data['techlist'] = $techdetail->first();

        $data['seotitle'] = self::seopage();
        return view('website.technology-details')->with($data);
    }


}
