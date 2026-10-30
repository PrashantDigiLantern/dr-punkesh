<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DoctorListModel;
use App\Models\DoctorModel;
use App\Models\FrontMenuModel;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
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
        foreach(session('userinfo')['user_menu_permissions'] as $oplist){
            if($oplist->mnu_url == $uri){
             $uripermission = $oplist->cfgmnu_act_id;
             $uripermission = explode(',',$uripermission);
            }
         }
        $data['permission'] = $uripermission;

        $select_table = ['doc_id', 'name', 'sort_desc', 'image','banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','status','doctor_status'];
        $data['view'] = DoctorModel::select($select_table)->get();
        return view('admin.doctor.list-doctor')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $bloglist = DoctorModel::find($id);
        $bloglist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = DoctorModel::find($id);
        $presslist->update($request->input());
    }

    public function add()
    {
        // echo session('primeid');
        $data['view'] = DoctorModel::find(session('primeid'));
        // print_r($data['view']);
        // die();
        return view('admin.doctor.add-doctor')->with($data);
    }

    public function DoctorRemovesec(Request $request){
        $view = DoctorModel::find(session('primeid'));
        $keydata = $request->input('keydata');
        $datalistsec = [];
        $datalist = json_decode($view->section);
        unset($datalist[$keydata]);
        foreach($datalist as $key => $datalistsl){
           $threepar = $datalistsl->threepragraph;
           $tabpra = $datalistsl->tabpragraph;
           $educationsec = $datalistsl->education;
           $experencesec = $datalistsl->experence;

            if(isset($threepar->threeparagraphdata)){
            foreach($threepar->threeparagraphdata as $threekey => $datalistslorder){
                $threepra = [
                    'threeparagraphdata' => $threepar->threeparagraphdata,
                    'threedesignstart' => $threepar->threedesignstart,
                    'orderby' => $threepar->orderby
                ];
            };
        }else{
            $threepra = [
                'threeparagraphdata' => null,
                'threedesignstart' => null,
                'orderby' => null
            ];
        }
// print_r($tabpra->tabheadingdata);
        if(isset($tabpra->tabheadingdata)){
            foreach($tabpra->tabheadingdata as $threekey => $datalistslorder){
                $tabpragraph = [
                    'tabheadingdata' => $tabpra->tabheadingdata,
                    'tabimage' => $tabpra->tabimage,
                    'tab_alttag' => $tabpra->tab_alttag,
                    'tabparagraphdata' => $tabpra->tabparagraphdata,
                    'taborderby' => $tabpra->taborderby
                ];
            };
        }else{
            $tabpragraph = [
                'tabheadingdata' => null,
                'tabimage' => null,
                'tab_alttag' => null,
                'tabparagraphdata' => null,
                'taborderby' => null
            ];
        }

        if(isset($educationsec->education_college)){
            foreach($educationsec->education_college as $edukey => $datalistslorder){
                $education = [
                    'education_name' => $educationsec->education_name,
                    'education_year' => $educationsec->education_year,
                    'education_college' => $educationsec->education_college,
                    'education_order_by' => $educationsec->education_order_by
                ];
            };
        }else{
            $education = [
                'education_name' => null,
                'education_year' => null,
                'education_college' => null,
                'education_order_by' => null
            ];
        }

        if(isset($experencesec->experience_address)){
            foreach($experencesec->experience_address as $edukey => $datalistslorder){
                $experence = [
                    'experience_name' => $experencesec->experience_name,
                    'experience_year' => $experencesec->experience_year,
                    'experience_address' => $experencesec->experience_address,
                    'experience_order_by' => $experencesec->experience_order_by
                ];
            };
        }else{
            $experence = [
                'experience_name' => null,
                'experience_year' => null,
                'experience_address' => null,
                'experience_order_by' => null
            ];
        }


        if(isset($datalistsl->secorderby)){
            $secorderby = $datalistsl->secorderby;
        }else{
            $secorderby = null;
        }

        if(isset($datalistsl->class_add)){
            $classadd = $datalistsl->class_add;
        }else{
            $classadd = null;
        }

        // if(isset($datalistsl->service2)){
        //     $service2 = $datalistsl->service2;
        // }else{
        //     $service2 = null;
        // }
    
            $datalistsec[] = [
                'type' => $datalistsl->type,
                'secorderby' => $secorderby,
                'service_heading' => $datalistsl->service_heading,
                'button_type' => $datalistsl->button_type,
                'button_name' => $datalistsl->button_name,
                'button_url' => $datalistsl->button_url,
                'button_style' => $datalistsl->button_style,
                'class_add' => $datalistsl->class_add,
                'appointment_side' => $datalistsl->appointment_side,
                'bg_type' => $datalistsl->bg_type,
                'bgcolor_style' => $datalistsl->bgcolor_style,
                'bgimage' => $datalistsl->bgimage,
                'service_heading1' => $datalistsl->service_heading1,
                'section1' => $datalistsl->section1,
                'section2' => $datalistsl->section2,
                'image' => $datalistsl->image,
                'alttag' => $datalistsl->alttag,
                'threepragraph' => $threepra,
                'tabpragraph' => $tabpragraph,
                'education' => $education,
                'experence' => $experence
            ];
        }

       
        // echo '<pre>';print_r($datalistsec);echo '</pre>';die();

        $view->update([
            'section' => json_encode($datalistsec)
        ]);
       
    }

    public function create_doctor(Request $request)
    {
        
    //   echo '<pre>';  print_r($request->input()); echo '<pre>'; echo '<br>';
        $destinationPath = $this->siteurl->sessionget().'backend/doctor';
        $destinationPathbanner = $this->siteurl->sessionget().'backend/doctor/banner';
        $destinationPathsection = $this->siteurl->sessionget().'backend/doctor/section';
        $destinationPathsectionbanner = $this->siteurl->sessionget().'backend/doctor/section_banner';


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

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $homeimage = time() . '_home_image.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $homeimage);
        } else {
            $homeimage = $request->input('oldhome_image');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }

        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $image2 = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $image2 = $request->input('oldimage2');
        }

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name2 = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name2);
        } else {
            $name2 = $request->input('oldbanner_image');
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
           
                
                    if ($request->input('button_type')[$key] == 'Yes') {
                        $button_name = $request->input('button_name')[$key];
                        $button_url = $request->input('button_url')[$key];
                        $button_style = $request->input('button_style')[$key];
                    } else {
                        $button_name = null;
                        $button_url = null;
                        $button_style = null;
                    }

                    if(isset($request->input('bg_type')[$key])){
                    if ($request->input('bg_type')[$key] == 'bgcolor') {
                        $bgcolor_style = $request->input('bgcolor_style')[$key];
                    } else {
                        $bgcolor_style = null;
                    }
                }else{
                    $bgcolor_style = null;
                }

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
                    if(isset($request->input('secorderby')[$key])){
                       $secorderby = $request->input('secorderby')[$key];
                    }else{
                        $secorderby = null;
                    }

                    if(isset($request->input('service_heading')[$key])){
                        $service_heading = $request->input('service_heading')[$key];
                     }else{
                         $service_heading = null;
                     }

                     if(isset($request->input('service_heading1')[$key])){
                        $service_heading1 = $request->input('service_heading1')[$key];
                     }else{
                         $service_heading1 = null;
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

                     $ders = $request->input('threepragraph'.$key+1);
                     if(isset($ders)){
                        $threepragraph = $request->input('threepragraph'.$key+1);
                        $threedesignstart = $request->input('threedesignstart'.$key+1);
                        $orderbypragraph = $request->input('orderbypragraph'.$key+1);
                     }else{
                        $threepragraph = null;
                        $threedesignstart = null;
                        $orderbypragraph = null;
                    }
                    $dff = $request->input('tab_heading'.$key+1);
                    // print_r($dff);
                    if(isset($dff)){
                        $tabheading = $request->input('tab_heading'.$key+1);
                        $tabheading2 = $request->input('tab_heading2'.$key+1);
                        $tab_alttag = $request->input('tab_alttag'.$key+1);
                        $tabpragraph = $request->input('tabpragraph'.$key+1);
                        $orderbytabpragraph = $request->input('orderbytabpragraph'.$key+1);
                     }else{
                        $tabheading = null;
                        $tabheading2 = null;
                        $tab_alttag = null;
                        $tabpragraph = null;
                        $orderbytabpragraph = null;
                    }

                    if(isset($dff)){
                        foreach($request->input('tab_heading'.$key+1) as $threekey1 => $datalistslorder){
                            if (isset($request->file('tabimage'.$key+1)[$threekey1])) {
                                $randtab = rand('99999','999999');
                                $filename = time() . $randtab;
                                $image5 = $request->file('tabimage'.$key+1)[$threekey1];
                                $name5 = $filename . '.' . $image5->getClientOriginalExtension();
                                $image5->move($destinationPathsection, $name5);
                                $tabimg[] = $name5;
                            } else {
                                if (isset($request->input('oldtabimage'.$key+1)[$threekey1])) {
                                    $tabimg[] = $request->input('oldtabimage'.$key+1)[$threekey1];
                                } else {
                                    $tabimg = null;
                                }
                            }
                        }

                    }else{
                        $tabimg = null;
                    }

                    $educationcollege = $request->input('education_college'.$key+1);

                    if(isset($educationcollege)){
                        $education_name = $request->input('education_name'.$key+1);
                        $education_year = $request->input('education_year'.$key+1);
                        $education_college = $request->input('education_college'.$key+1);
                        $education_order_by = $request->input('education_order_by'.$key+1);
                     }else{
                        $education_name = null;
                        $education_year = null;
                        $education_college = null;
                        $education_order_by = null;
                    }

                    $experienceaddress = $request->input('experience_address'.$key+1);

                    if(isset($experienceaddress)){
                        $experience_name = $request->input('experience_name'.$key+1);
                        $experience_year = $request->input('experience_year'.$key+1);
                        $experience_address = $request->input('experience_address'.$key+1);
                        $experience_order_by = $request->input('experience_order_by'.$key+1);
                     }else{
                        $experience_name = null;
                        $experience_year = null;
                        $experience_address = null;
                        $experience_order_by = null;
                    }
            // print_r($tabimg);
            $service_type = $request->input('service_type')[$key];
            $datalist[] = [
                'type' => $request->input('service_type')[$key],
                'secorderby' => $secorderby,
                'service_heading' => $service_heading,
                'service_heading1' => $service_heading1,
                'button_type' => $request->input('button_type')[$key],
                'button_name' => $button_name,
                'button_url' => $button_url,
                'button_style' => $button_style,
                'class_add' => $classadd,
                'appointment_side' => $appointment_side,
                'bg_type' => $bg_type,
                'bgcolor_style' => $bgcolor_style,
                'bgimage' => $name4,
                'tab_type' => $tab_type,
                'section1' => $service1,
                'section2' => $service2,
                'image' => $name3,
                'alttag' => $alttag,
                'threepragraph' => [
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
                'education' => [
                    'education_name' => $education_name,
                    'education_year' => $education_year,
                    'education_college' => $education_college,
                    'education_order_by' => $education_order_by,
                ],
                'experence' => [
                    'experience_name' => $experience_name,
                    'experience_year' => $experience_year,
                    'experience_address' => $experience_address,
                    'experience_order_by' => $experience_order_by,
                ],
            ];
            }
            }
            //        echo '<pre>';print_r($datalist);echo '</pre>';
            // die();
       

        $doc_id = $request->input('doc_id');
        if($doc_id < 1){
        $doctor = DoctorModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'banner_image' => $name2,
                'image2' => $image2,
                'home_image' => $homeimage,
                'section' => json_encode($datalist)
            ]
        ));
            Session::put('primeid', $doctor->doc_id);
        }else{
            $doctordata = DoctorModel::find($doc_id);
            $doctordata->update(array_merge($request->input(),
                [
                    'doctor_key' => $doctordata->doctor_key,
                    'image' => $name,
                    'image2' => $image2,
                    'home_image' => $homeimage,
                    'banner_image' => $name2,
                    'section' => json_encode($datalist)
                ]
            ));
            }

            if($request->input('url') != '#'){
                $dataseo = [
                    'seo_type' => 'doctordetail',
                    'page_name' => $request->input('name'),
                    'title_tag' => $request->input('title_tag'),
                    'keyword_tag' => $request->input('keyword_tag'),
                    'description_tag' => $request->input('description_tag'),
                    'canonical_tag' => $request->input('canonical_tag'),
                    'image' => $name,
                    'type' => $request->input('type'),
                    'site_name' => $request->input('site_name'),
                    'url' => $request->input('url')
                ];
            $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','doctordetail')->where('seo_status','preview');
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
            // echo $frontmenu->first()->mnu_id;
            // echo $frontmenu->count();die;
        return redirect('admin/doctor-list');
    }


    public function edit_doctor($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = DoctorModel::find($id);
        // print_r(session('useradmin'));
        // die();
        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'doctordetail')->first();

        return view('admin.doctor.edit-doctor')->with($data);
    }

    public function delete_doctor($id)
    {
        $servicelist = DoctorModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();
        return redirect('admin/doctor-list');
    }


    public function doctor_detail()
    {
        $select_table = ['doc_lit_id', 'description', 'banner_image', 'doctor.name'];
        $data['view'] = DoctorListModel::select($select_table)
            ->join('doctor', 'doctor.doc_id', '=', 'doctor_list.doctor_id')
            ->get();
        return view('admin.doctor-detail.list-doctor-detail')->with($data);
    }

    public function add_detail()
    {
        $select_table = ['doc_id', 'name'];
        $data['doctorlist'] = DoctorModel::select($select_table)->get();
        return view('admin.doctor-detail.add-doctor-detail')->with($data);
    }

    public function addeducation()
    {
        return view('admin.doctor.add-education-detail');
    }

    public function addexperience()
    {
        return view('admin.doctor.add-experience-detail');
    }

    // public function create_doctor_detail(Request $request)
    // {
    //     $destinationPath = $this->siteurl->sessionget().'backend/doctor';

    //     if (!File::exists($destinationPath)) {
    //         File::makeDirectory($destinationPath, $mode = 0777, true, true);
    //     }

    //     if ($request->hasFile('banner_image')) {
    //         $image = $request->file('banner_image');
    //         $name = time() . '_banner.' . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $name);
    //     } else {
    //         $name = null;
    //     }
    //     DoctorListModel::create(array_merge(
    //         $request->input(),
    //         [
    //             'banner_image' => $name,
    //             'education_name' => implode('@@', $request->input('education_name')),
    //             'education_college' => implode('@@', $request->input('education_college')),
    //             'experience_name' => implode('@@', $request->input('experience_name')),
    //             'experience_address' => implode('@@', $request->input('experience_address')),
    //         ]
    //     ));
        

    //     return redirect('admin/doctor-detail');
    // }

    public function edit_doctor_detail($id)
    {
        
        $data['edit'] = DoctorListModel::find($id);
        $select_table = ['doc_id', 'name'];
        $data['doctorlist'] = DoctorModel::select($select_table)->get();

        return view('admin.doctor-detail.edit-doctor-detail')->with($data);
    }

    // public function update_doctor_detail(Request $request, $id)
    // {
        
    //     // $query = DB::table('doctor_list')->where('id', $id);
    //     $datavideo = DoctorListModel::find($id);

    //     if ($request->hasFile('banner_image')) {
    //         $image = $request->file('banner_image');
    //         $name = time() . '_banner.' . $image->getClientOriginalExtension();
    //         $destinationPath = Session::get('useradmin')['site_url'].'backend/doctor';
    //         $image->move($destinationPath, $name);

    //         if ($datavideo->banner_image != '') {
    //             $path = $destinationPath . $datavideo->banner_image;
    //             if (file_exists($path)) {
    //                 unlink($path);
    //             }
    //         }
    //     } else {
    //         $name = $request->input('oldbanner_image');
    //     }

    //     $datavideo->update(array_merge(
    //         $request->input(),
    //         [
    //             'banner_image' => $name,
    //             'education_name' => implode('@@', $request->input('education_name')),
    //             'education_college' => implode('@@', $request->input('education_college')),
    //             'experience_name' => implode('@@', $request->input('experience_name')),
    //             'experience_address' => implode('@@', $request->input('experience_address')),
    //         ]
    //     ));


    //     // $update = DB::table('doctor_list')->where('id', $id)->limit(1)->update(
    //     //     [
    //     //         'doctor_id' => $request->input('doctor_id'),
    //     //         'video_type' => $request->input('video_type'),
    //     //         'video_link' => $request->input('video_link'),
    //     //         'description' => $request->input('description'),
    //     //         'section1' => $request->input('section1'),
    //     //         'section2' => $request->input('section2'),
    //     //         'banner_image' => $name,
    //     //         'education_name' => implode('@@', $request->input('education_name')),
    //     //         'education_college' => implode('@@', $request->input('education_college')),
    //     //         'experience_name' => implode('@@', $request->input('experience_name')),
    //     //         'experience_address' => implode('@@', $request->input('experience_address')),
    //     //         'alt_tag' => $request->input('alt_tag'),
    //     //         'title_tag' => $request->input('title_tag'),
    //     //         'keyword_tag' => $request->input('keyword_tag'),
    //     //         'description_tag' => $request->input('description_tag'),
    //     //         'canonical_tag'  => $request->input('canonical_tag'),
    //     //         'url' => $request->input('url'),
    //     //         'modified_at' => date('d-m-Y H:i'),
    //     //     ]
    //     // );

    //     return redirect('admin/doctor-detail');
    // }
    public function delete_doctor_detail($id)
    {
        $servicelist = DoctorListModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();

        return redirect('admin/doctor-detail');
    }
}
