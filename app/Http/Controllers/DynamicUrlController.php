<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\AppLaunchController;
use App\Models\RedirectUrlModel;
use App\Models\SeoPageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DynamicUrlController extends Controller
{

    public function __construct(AppLaunchController $applanch)
    {      
       $this->applanch = $applanch;
    }
    // use AppLaunchController;
    public function SingleUrl(){
        // die('hi');
        // $tasks_controller = new AppLaunchController;
        $siteview = Helpers::orgnizationlist();
        $result = $siteview->first();
        $urlpathget = Helpers::frontpathurl();
        // print_r($result);
        $site_url = request()->root().'/template/'.$urlpathget.'/';
        //set session userinfo
        Session::put('userorginfo', [
            'org_id' => $result->org_id,
            'site_id' => $result->site_id,
            'site_url' => $site_url,
        ]);

        $matchurl = $_SERVER['REQUEST_URI'];
      $matchurl = ltrim($matchurl,'/');

        if(isset(request()->segments()[0])){
            $url = request()->segments()[0];
             $oldredirect = RedirectUrlModel::where('old_url',$matchurl)->where('status','active')->where('redirect_status','publish');
             if($oldredirect->count()){
                $redirect = $oldredirect->first();
                return redirect($redirect->current_url,$redirect->port);
             }
             $currentredirect = RedirectUrlModel::where('current_url',$matchurl)->where('status','active')->where('redirect_status','publish');
             if($currentredirect->count()){
                $currredirect = $currentredirect->first();
                if($currredirect->page_type == 'home'){
                  return $this->applanch->appLaunch();
                 } elseif($currredirect->page_type == 'aboutclinic'){
                  return $this->applanch->AboutClinic();
                 } elseif($currredirect->page_type == 'doctordetail'){
                  return $this->applanch->AboutDoctorTwo($url);
                 } elseif($currredirect->page_type == 'servicefirst'){
                  return $this->applanch->Services();
                 } elseif($currredirect->page_type == 'servicefirstcategory'){
                  return $this->applanch->Services();
                 } elseif($currredirect->page_type == 'servicesecondcategory'){
                  return $this->applanch->SecondCategory($url);
                 } elseif($currredirect->page_type == 'service'){
                  return $this->applanch->ServiceDetails($url);
                 } elseif($currredirect->page_type == 'writtentestimonials'){
                  return $this->applanch->Testimonials();
                 } elseif($currredirect->page_type == 'blogs'){
                  return $this->applanch->Blogs();
                 } elseif($currredirect->page_type == 'blogdetails'){
                  return $this->applanch->BlogDetails($url);
                 } elseif($currredirect->page_type == 'resultfirst'){
                  return $this->applanch->ResultsFirstCategory();
                 } elseif($currredirect->page_type == 'contactus'){
                  return $this->applanch->ContactUs();
                 } elseif($currredirect->page_type == 'appointment'){
                  return $this->applanch->BookAnAppointment();
                 } elseif($currredirect->page_type == 'gallery'){
                  return $this->applanch->Gallery();
                 }
             }

             $currenturl = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('status','active');
            //  echo $currenturl->count();
             if($currenturl->count()){
                
                $currurl = $currenturl->first();
                // echo $currurl->seo_type;
                // die('hi');
                if($currurl->seo_type == 'home'){
                    return $this->applanch->appLaunch();
                } elseif($currurl->seo_type == 'aboutclinic'){
                    return $this->applanch->AboutClinic();
                } elseif($currurl->seo_type == 'doctordetail'){
                    return $this->applanch->AboutDoctorTwo($url);
                } elseif($currurl->seo_type == 'servicefirst'){
                    return $this->applanch->Services();
                } elseif($currurl->seo_type == 'servicefirstcategory'){
                    return $this->applanch->Services();
                } elseif($currurl->seo_type == 'servicesecondcategory'){
                    return $this->applanch->SecondCategory($url);
                } elseif($currurl->seo_type == 'service'){
                    return $this->applanch->ServiceDetails($url);
                } elseif($currurl->seo_type == 'writtentestimonials'){
                    return $this->applanch->Testimonials();
                } elseif($currurl->seo_type == 'blogs'){
                    return $this->applanch->Blogs();
                } elseif($currurl->seo_type == 'blogdetails'){
                    return $this->applanch->BlogDetails($url);
                } elseif($currurl->seo_type == 'resultfirst'){
                    return $this->applanch->ResultsFirstCategory();
                }  elseif($currurl->seo_type == 'resultfirst'){
                    return $this->applanch->ResultsDetail();
                } elseif($currurl->seo_type == 'videofirst'){
                    return $this->applanch->Videos();
                } elseif($currurl->seo_type == 'contactus'){
                    return $this->applanch->ContactUs();
                } elseif($currurl->seo_type == 'appointment'){
                    return $this->applanch->BookAnAppointment();
                } elseif($currurl->seo_type == 'gallery'){
                    return $this->applanch->Gallery();
                } else{
                    return redirect('/404');
                }
             }else{
                return redirect('/404');
             }
                 
               
                
                //    $old_url = $redirect->old_url;
                //   $current_url = '/'.$redirect->current_url;
                  
             }
     }
    


     public function DobbleUrl(){
      // die('hi');
    //  echo '<pre>'; print_r($_SERVER['REQUEST_URI']);echo '</pre>';die;
      // $tasks_controller = new AppLaunchController;
      $siteview = Helpers::orgnizationlist();
      $result = $siteview->first();
      $urlpathget = Helpers::frontpathurl();
      // print_r($result);
      $site_url = request()->root().'/template/'.$urlpathget.'/';
      //set session userinfo
      Session::put('userorginfo', [
          'org_id' => $result->org_id,
          'site_id' => $result->site_id,
          'site_url' => $site_url,
      ]);
      $urlone = request()->segments()[0];
      $url = request()->segments()[1];
      $matchurl = $_SERVER['REQUEST_URI'];
      $matchurl = ltrim($matchurl,'/');
    //   die;
      $oldredirect = RedirectUrlModel::where('old_url',$matchurl)->where('status','active')->where('redirect_status','publish');
    //  echo $oldredirect->count();
    //  die;
             if($oldredirect->count()){
                $redirect = $oldredirect->first();
                return redirect($redirect->current_url,$redirect->port);
             }
            //  die('fdmk');
    //   if(isset(request()->segments()[1])){
    //       $url = request()->segments()[1];
    //        $oldredirect = RedirectUrlModel::where('old_url',$url);
    //        if($oldredirect->count()){
    //           $redirect = $oldredirect->first();
    //           return redirect($redirect->current_url,301);
    //        }
    //        $currentredirect = RedirectUrlModel::where('current_url',$url);
    //        if($currentredirect->count()){
    //           $currredirect = $currentredirect->first();
    //           if($currredirect->page_type == 'servicesecondcategory'){
    //             return $this->applanch->SecondCategory($url);
    //            } elseif($currredirect->page_type == 'blogdetails'){
    //             return $this->applanch->BlogDetails($url);
    //            } elseif($currredirect->page_type == 'resultfirstcategory'){
    //             return $this->applanch->RealResultsDetail($url);
    //            } 
    //        }

    //        $currenturl = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('status','active');
    //        //  echo $currenturl->count();
    //         if($currenturl->count()){
               
    //            $currurl = $currenturl->first();
    //            // echo $currurl->seo_type;
    //            // die('hi');
    //            if($currurl->seo_type == 'servicesecondcategory'){
    //                return $this->applanch->SecondCategory($url);
    //            } elseif($currurl->seo_type == 'blogdetails'){
    //                return $this->applanch->BlogDetails($url);
    //            } elseif($currurl->seo_type == 'resultfirstcategory'){
    //                return $this->applanch->RealResultsDetail($url);
    //            } else{
    //                // return redirect('/404');
    //            }
    //         }
                
    //        }
            if($urlone=='services'){
                $currentredirect = RedirectUrlModel::where('current_url',$matchurl)->where('status','active')->where('redirect_status','publish')->where('page_type','servicesecondcategory');
                if($currentredirect->count()){
                    // die('hi');
                    return $this->applanch->SecondCategory($url);
                }
                $currenturls = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('seo_type','servicesecondcategory')->where('status','active');
                if($currenturls->count()){
                return $this->applanch->SecondCategory($url);
                }
            }
           if($urlone=='real-results'){
               
            $currentredirect = RedirectUrlModel::where('current_url',$matchurl)->where('status','active')->where('redirect_status','publish')->where('page_type','resultfirstcategory');
                if($currentredirect->count()){
                    return $this->applanch->SecondCategory($url);
                }

                $currenturls = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('seo_type','resultfirstcategory')->where('status','active');
                if($currenturls->count()){
                return $this->applanch->RealResultsDetail($url);
                }
           }

           if($urlone=='videos'){
            $currentredirect = RedirectUrlModel::where('current_url',$matchurl)->where('status','active')->where('redirect_status','publish')->where('page_type','videofirstcategory');
            if($currentredirect->count()){
                // return $this->applanch->SecondCategory($url);
            }

            $currenturlsvideo = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('seo_type','videofirstcategory')->where('status','active');
            if($currenturlsvideo->count()){
            // return $this->applanch->Videos();
            }
        }
            if($urlone=='blogs' || $urlone=='blog'){
                    // die('hi');
                $currentredirect = RedirectUrlModel::where('current_url',$matchurl)->where('status','active')->where('redirect_status','publish')->where('page_type','blogdetails');
                if($currentredirect->count()){
                    return $this->applanch->BlogDetails($url);
                }

                $currenturls = SeoPageModel::where('url',$url)->where('seo_status','publish')->where('seo_type','blogdetails')->where('status','active');
                if($currenturls->count()){
                return $this->applanch->BlogDetails($url);
                }
            }
       
            return redirect('/404');

   }
}
