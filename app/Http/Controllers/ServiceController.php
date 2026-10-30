<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FrontMenuModel;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Print_;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
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
        $data['permissionoprid'] = [];
        $permissionoprid = [];
        foreach (session('userinfo')['user_operation_permissions'] as $oplist) {
            if ($oplist->op_link == $uri) {
                $uripermission = $oplist->oper_act_id;
                $uripermission = explode(',', $uripermission);
            }
        }
        $data['permission'] = $uripermission;
        if(isset(session('userinfo')['user_category_operation_permissions'][0]['opid'])){
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        }

        // $select_table = ['service.*','service_category.service_name as sercatname'];
        $data['view'] = ServiceModel::select('*')->where('category_type','service')->get();

        return view('admin.service.list-service')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $servicelist = ServiceModel::find($id);
        $servicelist->update($request->input());
    }

    public function orderby_service(Request $request)
    {
        $ser_id = $request->input('id');
        $servicelist = ServiceModel::find($ser_id);
        $servicelist->update($request->input());
    }

    public function add()
    {
        // Session::put('primeid', '16');
        $data['permissionoprid'] = [];
        if(isset(session('userinfo')['user_category_operation_permissions'][0]['opid'])){
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        }
        $data['firstcategory'] = ServiceModel::select('ser_id', 'service_name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

        $data['view'] = ServiceModel::find(session('primeid'));

        if (isset($data['view']->parent_id)) {
            $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        }

        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'service')->first();
            }

        return view('admin.service.add-service')->with($data);
    }

    public function service_list(Request $request)
    {
        $data = $request->input('servicelist');
        if ($data == 'fulltext') {
            return view('admin.service.full-text-section1');
        } elseif ($data == 'fulltextdifferentlayout') {
            return view('admin.service.full-text-different-layout');
        } elseif ($data == 'imagetext') {
            return view('admin.service.image-text-section2');
        } elseif ($data == 'rightimagetext') {
            return view('admin.service.right-image-left-text-section7');
        } elseif ($data == 'leftheading') {
            return view('admin.service.left-heading-right-text-section3');
        } elseif ($data == 'twoparagraph') {
            return view('admin.service.two-pragraph-text-section4');
        } elseif ($data == 'twoparagraphbgcolor') {
            return view('admin.service.two-pragraph-text-bg-color-section8');
        } elseif ($data == 'threeparagraph') {
            return view('admin.service.three-pragraph-text');
        } elseif ($data == 'sectionthreeparagraph') {
            return view('admin.service.three-pragraph-text-section');
        } elseif ($data == 'tabparagraph') {
            return view('admin.service.tab-pragraph');
        } elseif ($data == 'sectiontabparagraph') {
            return view('admin.service.tab-section-pragraph');
        } elseif ($data == 'educationsection') {
            return view('admin.service.education-section-pragraph');
        } elseif ($data == 'experiencesection') {
            return view('admin.service.experience-section-pragraph');
        } elseif ($data == 'twoparagraphdifflayout') {
            return view('admin.service.two-pragraph-different-layout');
        } elseif ($data == 'sectionvideo') {
            return view('admin.service.section-video');
        }


    }

    public function ThreePragraphList(Request $request){
        return view('admin.service.three-pragraph-text-list');
    }

    public function TabPragraphList(Request $request){
        return view('admin.service.tab-pragraph-text-list');
    }

    public function EducationPragraphList(Request $request){
        return view('admin.service.education-list');
    }

    public function ExperiencePragraphList(Request $request){
        return view('admin.service.experience-list');
    }

    public function service_change_list(Request $request)
    {
        $id = $request->input('servicecat');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }

    function change_key( $array, $old_key, $new_key ) {

        if( ! array_key_exists( $old_key, $array ) )
            return $array;

        $keys = array_keys( $array );
        $keys[ array_search( $old_key, $keys ) ] = $new_key;

        return array_combine( $keys, $array );
    }

    public function ServiceRemovesec(Request $request){
        $view = ServiceModel::find(session('primeid'));
        $keydata = $request->input('keydata');
        $datalistsec = [];
        $datalist = json_decode($view->section);
        unset($datalist[$keydata]);
        foreach($datalist as $key => $datalistsl){
           $threepar = $datalistsl->threepragraph;
           $tabpra = $datalistsl->tabpragraph;

            if(isset($threepar->threeparagraphdata)){
            foreach($threepar->threeparagraphdata as $threekey => $datalistslorder){
                $threepra = [
                    'sec_heading' => $threepar->sec_heading,
                    'threeparagraphdata' => $threepar->threeparagraphdata,
                    'orderby' => $threepar->orderby
                ];
            };
        }else{
            $threepra = [
                'sec_heading' => null,
                'threeparagraphdata' => null,
                'orderby' => null
            ];
        }
// print_r($tabpra->tabheadingdata);
        if(isset($tabpra->tabheadingdata)){
            foreach($tabpra->tabheadingdata as $threekey => $datalistslorder){
                $tabpragraph = [
                    'tabheadingdata' => $tabpra->tabheadingdata,
                    'tabimage' => $tabpra->tabimage,
                    'tabimage_tag' => $tabpra->tabimage_tag,
                    'tab_alttag' => $tabpra->tab_alttag,
                    'tabparagraphdata' => $tabpra->tabparagraphdata,
                    'taborderby' => $tabpra->taborderby
                ];
            };
        }else{
            $tabpragraph = [
                'tabheadingdata' => null,
                'tabimage' => null,
                'tabimage_tag' => null,
                'tab_alttag' => null,
                'tabparagraphdata' => null,
                'taborderby' => null
            ];
        }

        if(isset($datalistsl->secorderby)){
            $secorderby = $datalistsl->secorderby;
        }else{
            $secorderby = null;
        }

        if(isset($datalistsl->service_comman)){
            $service_comman = $datalistsl->service_comman;
        }else{
            $service_comman = null;
        }

        if(isset($datalistsl->servicealt_tag)){
            $servicealt_tag = $datalistsl->servicealt_tag;
        }else{
            $servicealt_tag = null;
        }

            $datalistsec[] = [
                'type' => $datalistsl->type,
                'secorderby' => $secorderby,
                'section_heading' => $datalistsl->section_heading,
                'service_heading' => $datalistsl->service_heading,
                'section_head_type' => $datalistsl->section_head_type,
                // 'button_type' => $datalistsl->button_type,
                // 'button_name' => $datalistsl->button_name,
                // 'button_url' => $datalistsl->button_url,
                // 'button_style' => $datalistsl->button_style,
                // 'appointment_side' => $datalistsl->appointment_side,
                'class_add' => $datalistsl->class_add,
                'bg_type' => $datalistsl->bg_type,
                'bgcolor_style' => $datalistsl->bgcolor_style,
                'bgimage' => $datalistsl->bgimage,
                'tab_type' => $datalistsl->tab_type,
                'section1' => $datalistsl->section1,
                'section2' => $datalistsl->section2,
                'service_comman' => $service_comman,
                'image' => $datalistsl->image,
                'alttag' => $datalistsl->alttag,
                'servicealt_tag' => $servicealt_tag,
                'threepragraph' => $threepra,
                'tabpragraph' => $tabpragraph,
            ];
        }

        // echo '<pre>';print_r($datalistsec);echo '</pre>';die();

        $view->update([
            'section' => json_encode($datalistsec)
        ]);

    }

    public function create_service(Request $request)
    {
        // print_r($request->input());
        $destinationPath = 'backend/service/image';
        $destinationPathbanner = 'backend/service/banner';
        $destinationPathsection = 'backend/service/section';
        $destinationPathsectionbanner = 'backend/service/section_banner';
        // $destinationPathbgimage = 'backend/service/section';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathbanner)) {
            File::makeDirectory($destinationPathbanner, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathsection)) {
            File::makeDirectory($destinationPathsection, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathsectionbanner)) {
            File::makeDirectory($destinationPathsectionbanner, $mode = 0777, true, true);
        }

        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $name = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldservice_image');;
        }

        // if ($request->hasFile('service_icon')) {
        //     $image = $request->file('service_icon');
        //     $name_icon = time() . '_icon.' . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $name_icon);
        // } else {
        //     $name_icon = $request->input('oldservice_icon');;
        // }

        if ($request->hasFile('service_banner_image')) {
            $image = $request->file('service_banner_image');
            $name2 = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPathbanner, $name2);
        } else {
            $name2 = $request->input('oldservice_banner_image');;
        }

        if ($request->hasFile('home_banner_image')) {
            $image = $request->file('home_banner_image');
            $name3 = time() . '_home_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPathbanner, $name3);
        } else {
            $name3 = $request->input('oldhome_banner_image');;
        }
$servicesection = $request->input('servicesection');
$datalist  = [];
if(isset($servicesection)){
    foreach ($request->input('servicesection') as $key => $servicesection) {

        $rand = rand(99, 999);

                if (isset($request->input('service_section_id')[$key])) {
                    $sersecid = $request->input('service_section_id')[$key];
                } else {
                    $sersecid = '';
                }
                // print_r($request->file('serviceimage'));
                if (isset($request->file('serviceimage')[$key])) {
                    $filename = time() . $rand;
                    $image = $request->file('serviceimage')[$key];
                    $name3 = $filename . '.' . $image->getClientOriginalExtension();
                    $image->move($destinationPathsection, $name3);

                } else {
                    if (isset($request->input('oldserviceimage')[$key])) {
                        $name3 = $request->input('oldserviceimage')[$key];
                    } else {
                        $name3 = null;
                    }
                }
                // echo $name3;
                if(isset($request->input('bg_type')[$key])){
                if ($request->input('bg_type')[$key] == 'bgimage') {
                if (isset($request->file('bgimage')[$key])) {
                    $filename = time() . $rand;
                    $image4 = $request->file('bgimage')[$key];
                    $name4 = $filename . '_bannersction.' . $image4->getClientOriginalExtension();
                    $image4->move($destinationPathsectionbanner, $name4);

                } else {
                    if (isset($request->input('oldbgimage')[$key])) {
                        $name4 = $request->input('oldbgimage')[$key];
                    } else {
                        $name4 = null;
                    }
                }
            }else{
                $name4 = null;
            }
        }else{
            $name4 = null;
        }


                // if ($request->input('button_type')[$key] == 'Yes') {
                //     $button_name = $request->input('button_name')[$key];
                //     $button_url = $request->input('button_url')[$key];
                //     $button_style = $request->input('button_style')[$key];
                // } else {
                //     $button_name = null;
                //     $button_url = null;
                //     $button_style = null;
                // }

            if(isset($request->input('bg_type')[$key])){
                if ($request->input('bg_type')[$key] == 'bgcolor') {
                    $bgcolor_style = $request->input('bgcolor_style')[$key];
                } else {
                    $bgcolor_style = null;
                }
            }else{
                $bgcolor_style = null;
            }
            
            // dd($bgcolor_style);
            // if(isset($request->input('bg_type')[$key])){
            //     if ($request->input('bg_type')[$key] == 'bgClass') {
            //         $classadd = $request->input('class_add')[$key];
            //     } else {
            //         $classadd = null;
            //     }
            // }else{
            //     $classadd = null;
            // }


            if(isset($request->input('appointment_side')[$key])){
                    $appointment_side = $request->input('appointment_side')[$key];
            }else{
                $appointment_side = null;
            }

            if(isset($request->input('bg_type')[$key])){
                $bg_type = $request->input('bg_type')[$key];
            }else{
                $bg_type = null;
            }


                if(isset($request->input('service1')[$key])){
                    if($request->input('service1')[$key] != ''){
                    $service1 = $request->input('service1')[$key];
                    }else{
                        $service1 = null;
                    }
                } else {
                    $service1 = null;
                }


                if($request->input('service_type')[$key] == 'threeparagraph' || $request->input('service_type')[$key] == 'sectionthreeparagraph'){
                    $service2 = null;
            }else{
                if(isset($request->input('service2')[$key])){
                    $service2 = $request->input('service2')[$key];
                } else {
                    $service2 = null;
                }

            }
            if(isset($request->input('service_comman')[$key])){
                   $service_comman = $request->input('service_comman')[$key];
                }else{
                    $service_comman = null;
                }
                if(isset($request->input('secorderby')[$key])){
                   $secorderby = $request->input('secorderby')[$key];
                }else{
                    $secorderby = null;
                }

                if(isset($request->input('service_heading1')[$key])){
                    $service_heading1 = $request->input('service_heading1')[$key];
                 }else{
                     $service_heading1 = null;
                 }

                 if(isset($request->input('service_heading')[$key])){
                    $service_heading = $request->input('service_heading')[$key];
                 }else{
                     $service_heading = null;
                 }

                 

                 if(isset($request->input('tab_type')[$key])){
                    $tab_type = $request->input('tab_type')[$key];
                 }else{
                     $tab_type = null;
                 }
                 if(isset($request->input('alttag')[$key])){
                    $alttag = $request->input('alttag')[$key];
                 }else{
                     $alttag = null;
                 }

                 if(isset($request->input('class_add')[$key])){
                    $classadd = $request->input('class_add')[$key];
                 }else{
                     $classadd = null;
                 }

                 if(isset($request->input('section_heading')[$key])){
                    $section_heading = $request->input('section_heading')[$key];
                 }else{
                     $section_heading = null;
                 }

                 if(isset($request->input('section_head_type')[$key])){
                    $section_head_type = $request->input('section_head_type')[$key];
                 }else{
                     $section_head_type = null;
                 }

                //  if(isset($request->input('section_heading')[$key])){
                //     $section_heading = $request->input('section_heading')[$key];
                //  }else{
                //      $section_heading = null;
                //  }

                 $keyData = $key+1;
                 $ders = $request->input('threepragraph'.$keyData);
                 if(isset($ders)){
                    $sec_heading = $request->input('sec_heading'.$keyData);
                    $threepragraph = $request->input('threepragraph'.$keyData);
                    $threedesignstart = $request->input('threedesignstart'.$keyData);
                    $orderbypragraph = $request->input('orderbypragraph'.$keyData);
                 }else{
                    $sec_heading = null;
                    $threepragraph = null;
                    $threedesignstart = null;
                    $orderbypragraph = null;
                }
                $dff = $request->input('tab_heading'.$keyData);
                // print_r($dff);
                if(isset($dff)){
                    $tabheading = $request->input('tab_heading'.$keyData);
                    $tabheading2 = $request->input('tab_heading2'.$keyData);
                    $tab_alttag = $request->input('tab_alttag'.$keyData);
                    $tabpragraph = $request->input('tabpragraph'.$keyData);
                    $orderbytabpragraph = $request->input('orderbytabpragraph'.$keyData);
                 }else{
                    $tabheading = null;
                    $tabheading2 = null;
                    $tab_alttag = null;
                    $tabpragraph = null;
                    $orderbytabpragraph = null;
                }

                if(isset($dff)){
                    foreach($request->input('tab_heading'.$keyData) as $threekey1 => $datalistslorder){
                        if (isset($request->file('tabimage'.$keyData)[$threekey1])) {
                            $randtab = rand('99999','999999');
                            $filename = time() . $randtab;
                            $image5 = $request->file('tabimage'.$keyData)[$threekey1];
                            $name5 = $filename . '.' . $image5->getClientOriginalExtension();
                            $image5->move($destinationPathsection, $name5);
                            $tabimg[] = $name5;
                        } else {
                            if (isset($request->input('oldtabimage'.$keyData)[$threekey1])) {
                                $tabimg[] = $request->input('oldtabimage'.$keyData)[$threekey1];
                            } else {
                                $tabimg = null;
                            }
                        }
                    }

                }else{
                    $tabimg = null;
                }

      
            $service_type = $request->input('service_type')[$key];
            $datalist[] = [
            'type' => $request->input('service_type')[$key],
            'secorderby' => $secorderby,
            'section_heading' => $section_heading,
            'service_heading' => $service_heading,
            'service_heading1' => $service_heading1,
            'section_head_type' =>$section_head_type,
            // 'button_type' => $request->input('button_type')[$key],
            // 'button_name' => $button_name,
            // 'button_url' => $button_url,
            // 'button_style' => $button_style,
            'class_add' => $classadd,
            // 'appointment_side' => $appointment_side,
            'bg_type' => $bg_type,
            'bgcolor_style' => $bgcolor_style,
            'bgimage' => $name4,
            'tab_type' => $tab_type,
            'section1' => $service1,
            'section2' => $service2,
            'service_comman' => $service_comman,
            'image' => $name3,
            'alttag' => $alttag,
            'threepragraph' => [
                'sec_heading' => $sec_heading,
                'threeparagraphdata' => $threepragraph,
                'threedesignstart' => $threedesignstart,
                'orderby' => $orderbypragraph,
            ],
            'tabpragraph' => [
                'tabheadingdata' => $tabheading,
                'tabheadingdata2' => $tabheading2,
                'tabimage' => $tabimg,
                'tab_alttag' => $tab_alttag,
                'tabparagraphdata' => $tabpragraph,
                'taborderby' => $orderbytabpragraph,
            ],
            ];
            }
        }
    //        echo '<pre>';print_r($datalist);echo '</pre>';
    // die();
        $parent_id = null;
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $permissionoprid = explode(',', $permissionoprid);
        if (in_array('39', $permissionoprid)) {
            $parent_id = $request->input('fifth_cat');
        } else {
            if (in_array('38', $permissionoprid)) {
                $parent_id = $request->input('fourt_cat');
            } else {
                if (in_array('37', $permissionoprid)) {
                    $parent_id = $request->input('third_cat');
                } else {
                    if (in_array('36', $permissionoprid)) {
                        $parent_id = $request->input('second_cat');
                    } else {
                        if (in_array('16', $permissionoprid)) {
                            $parent_id = $request->input('service_cat');
                        }
                    }
                }
            }
        }
// dd($request->input('category_type'));
        if($request->input('category_type') == "secondcategory" ){
            $parent_id = $request->input('service_cat');
        }
        // dd($parent_id);

        // if(!empty($request->input('parent_id'))){
        //     $parent_id = $request->input('parent_id');
        //  }else{
        //      $parent_id = null;
        //  }
        // $parent_id = $request->input('parent_id');
        // dd($parent_id);
        if($request->input('show_type')=='outside'){
            $homedescription = $request->input('homedescription');
        }else{
            $homedescription = null;
        }
        $ser_id = $request->input('ser_id');
        if ($ser_id < 1) {
            $service = ServiceModel::create(array_merge(
                $request->input(),
                [
                    'service_type' => 'treatments',
                    'service_image' => $name,
                    // 'service_icon' => $name_icon,
                    'homedescription' => $homedescription,
                    'service_banner_image' => $name2,
                    'home_banner_image' => $name3,
                    'parent_id' => $parent_id,
                    'section' => json_encode($datalist)
                ]
            ));
            Session::put('primeid', $service->ser_id);
        } else {
            $servicedata = ServiceModel::find($ser_id);
            $servicedata->update(array_merge(
                $request->input(),
                [
                    'ser_key' => $servicedata->ser_key,
                    'service_type' => 'treatments',
                    'service_image' => $name,
                    // 'service_icon' => $name_icon,
                    'homedescription' => $homedescription,
                    'service_banner_image' => $name2,
                    'home_banner_image' => $name3,
                    'parent_id' => $parent_id,
                    'section' => json_encode($datalist)
                ]
            ));
        }
        // echo $request->input('canonical_tag');die();
        if($request->input('url') != '#'){
            $dataseo = [
                'seo_type' => 'service',
                'page_name' => $request->input('service_name'),
                'title_tag' => $request->input('title_tag'),
                'keyword_tag' => $request->input('keyword_tag'),
                'description_tag' => $request->input('description_tag'),
                'canonical_tag' => $request->input('canonical_tag'),
                'image' => $name,
                'type' => $request->input('type'),
                'site_name' => $request->input('site_name'),
                'url' => $request->input('url')
            ];
            $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','service')->where('seo_status','preview');
            // echo $seo->count();
            // die();
            if($seo->count() < 1){
            SeoPageModel::create(array_merge($dataseo,['created_by' => session('useradmin')['usr_id']]));
            }else{
                $seo->update(array_merge($dataseo,[
                    'updated_by' => session('useradmin')['usr_id'],
                    'seo_key' => $seo->first()->seo_key,
                    ]));
            }
        }

        $frontmenu = FrontMenuModel::where('urllink',$request->input('oldurl'))->where('menu_status','preview');

            if($frontmenu->count() > 0){
                $frontmenu->update(array_merge([
                    'updated_by' => session('useradmin')['usr_id'],
                    'urllink' => $request->input('url')
                ]));
            }
// die();
// dd( $request->input('category_type'));
if($request->input('category_type') == "secondcategory" ){
    return redirect('admin/second-category');
}else{
    return redirect('admin/service');
}
        
    }


    public function edit_service($id)
    {
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        Session::put('primeid', $id);
        $data['firstcategory'] = ServiceModel::select('ser_id', 'service_name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

        $data['edit'] = ServiceModel::find($id);

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'service')->first();
        $data['secondsec'] = CategoryTrait::allcategorylist($data['edit']->parent_id);
        return view('admin.service.edit-service')->with($data);
    }

    public function delete_service($id)
    {
        $servicelist = ServiceModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();

        return redirect('admin/service');
    }

}
