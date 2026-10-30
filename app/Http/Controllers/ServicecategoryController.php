<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FrontMenuModel;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ServicecategoryController extends Controller
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
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        $select_table = ['ser_id','parent_id','video_type','service_type', 'service_name','service_image','service_banner_image','video_link','alt_tag','description','short_desc','title_tag','keyword_tag','description_tag','canonical_tag','url', 'order_by', 'status','ser_status'];
        $data['view'] = ServiceModel::select($select_table)->whereNull('parent_id')->get();
        return view('admin.service-category.list-service-category')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $servicelist = ServiceModel::find($id);
        $servicelist->update($request->input());
    }

    public function orderby_service_category(Request $request)
    {
        $id = $request->input('id');
        $servicelist = ServiceModel::find($id);
        $servicelist->update($request->input());
    }

    public function add()
    {
        $data['view'] = ServiceModel::find(session('primeid'));
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'service'.$data['view']->category_type)->first();
            }
        return view('admin.service-category.add-service-category')->with($data);
    }

    public function create_service(Request $request)
    {
        $destinationPath = 'backend/service/image';
        $destinationPathbanner = 'backend/service/banner';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathbanner)) {
            File::makeDirectory($destinationPathbanner, $mode = 0777, true, true);
        }

        $categorytype = $request->input('category_type');
        if($categorytype=='firstcategory'){
            $redirect_blade = 'admin/service-category-preview';
            $redirect_blade_fail = 'admin/add-service-category';
            $redirect_blade_list = 'admin/service-category';
        }elseif($categorytype=='secondcategory'){
            $redirect_blade = 'admin/second-category-preview';
            $redirect_blade_fail = 'admin/add-second-service-category';
            $redirect_blade_list = 'admin/second-category';
        }elseif($categorytype=='thirdcategory'){
            $redirect_blade = 'admin/third-category-preview';
            $redirect_blade_fail = 'admin/add-third-service-category';
            $redirect_blade_list = 'admin/third-category';
        }elseif($categorytype=='fourthcategory'){
            $redirect_blade = 'admin/fourth-category-preview';
            $redirect_blade_fail = 'admin/add-fourth-service-category';
            $redirect_blade_list = 'admin/fourth-category';
        }elseif($categorytype=='fifthcategory'){
            $redirect_blade = 'admin/fifth-category-preview';
            $redirect_blade_fail = 'admin/add-fifth-service-category';
            $redirect_blade_list = 'admin/fifth-category';
        }

        //this is assign plan required field
        $validator = Validator::make($request->input(), [
            'service_name' => 'required',
        ]);
        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect($redirect_blade_fail);
        }
        
        if ($request->hasFile('service_image')) {
            $image = $request->file('service_image');
            $name = $categorytype.'_image_'.time().'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldservice_image');
        }
        
        if ($request->hasFile('service_icon')) {
            $image = $request->file('service_icon');
            $name_icon = $categorytype.'_image_icon_'.time().'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_icon);
        } else {
            $name_icon = $request->input('oldservice_icon');
        }

        if ($request->hasFile('service_banner_image')) {
            $image = $request->file('service_banner_image');
            $name2 = $categorytype.'_banner_'.time().'.'. $image->getClientOriginalExtension();
            $image->move($destinationPathbanner, $name2);
        } else {
            $name2 = $request->input('oldservice_banner_image');
        }

        $ser_id = $request->input('ser_id');
        if($ser_id < 1){
            $service = ServiceModel::create(array_merge(
            $request->input(),
            [
                'service_image' => $name,
                'service_banner_image' => $name2,
                // 'service_icon' => $name_icon,
            ]
        ));
        Session::put('primeid', $service->ser_id);
    }else{
        $servicedata = ServiceModel::find($ser_id);
        $servicedata->update(array_merge($request->input(),
            [
                'ser_key' => $servicedata->ser_key,
                'service_image' => $name,
                'service_banner_image' => $name2,
                // 'service_icon' => $name_icon,
            ]
        ));
        }

        if($request->input('url') != '#'){
            $dataseo = [
                'seo_type' => 'servicecategory',
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
            $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','service'.$categorytype)->where('seo_status','preview');
            // echo $seo->count();
            // die();
            if($seo->count() < 1){
            SeoPageModel::create(array_merge($dataseo,['created_by' => session('useradmin')['usr_id']]));
            }else{
                $seo->update(array_merge($dataseo,[
                    'updated_by' => session('useradmin')['usr_id'],
                    'seo_key' => $seo->first()->seo_key,
                    'seo_type' => 'service'.$categorytype,
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
    
        return redirect($redirect_blade_list);
    }

    public function edit_service($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = ServiceModel::find($id);
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'service'.$data['edit']->category_type)->first();
            
        if($data['edit']->category_type=='firstcategory'){
            $redirect_blade = 'admin.service-category.edit-service-category';
        }elseif($data['edit']->category_type=='secondcategory'){
            $redirect_blade = 'admin.service-category-second.edit-service-category-second';
        }
      
        return view($redirect_blade)->with($data);
    }

    public function SecondIndex()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        $select_table = ['ser_id','parent_id','video_type','service_type', 'service_name','service_image','service_banner_image','video_link','alt_tag','description','short_desc','title_tag','keyword_tag','description_tag','canonical_tag','url', 'order_by', 'status','ser_status'];
        $data['view'] = ServiceModel::select($select_table)->whereNull('parent_id')->where('category_type','firstcategory')->get();
        $data['secondcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','secondcategory')->get();
        
        return view('admin.service-category-second.list-service-category-second')->with($data);
    }

    public function SecondAdd()
    {
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ServiceModel::find(session('primeid'));
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
            ->where('url', $data['view']->url)->where('seo_type', 'service'.$data['view']->category_type)->first();
            }
        return view('admin.service-category-second.add-service-category-second')->with($data);
    }

    public function ThirdIndex()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        $select_table = ['ser_id','parent_id','video_type','service_type', 'service_name','service_image','service_banner_image','video_link','alt_tag','description','short_desc','title_tag','keyword_tag','description_tag','canonical_tag','url', 'order_by', 'status','ser_status'];
        $data['secondcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','secondcategory')->get();
        $data['thirdcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','thirdcategory')->get();
        return view('admin.service-category-third.list-service-category-third')->with($data);
    }

    public function ThirdAdd()
    {
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'service'.$data['view']->category_type)->first();
            }
        return view('admin.service-category-third.add-service-category-third')->with($data);
    }

    public function ThirdEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ServiceModel::find($id);
        
        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'service'.$data['edit']->category_type)->first();

        if(isset($data['edit']->parent_id)){
        $data['secondsec'] = CategoryTrait::allcategorylist($data['edit']->parent_id);
        }
        return view('admin.service-category-third.edit-service-category-third')->with($data);
    }

    public function ThirdCategoryPreview()
    {
        $data['view'] = ServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        return view('admin.service-category-third.preview-service-category-third')->with($data);
    }

    public function FourthIndex()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        $select_table = ['ser_id','parent_id','video_type','service_type', 'service_name','service_image','service_banner_image','video_link','alt_tag','description','short_desc','title_tag','keyword_tag','description_tag','canonical_tag','url', 'order_by', 'status','ser_status'];
        $data['thirdcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','thirdcategory')->get();
        $data['fourthcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fourthcategory')->get();
        return view('admin.service-category-fourth.list-service-category-fourth')->with($data);
    }

    public function FourthAdd()
    {
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        }

        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
            ->where('url', $data['view']->url)->where('seo_type', 'service'.$data['view']->category_type)->first();
        }

        return view('admin.service-category-fourth.add-service-category-fourth')->with($data);
    }

    public function FourthEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ServiceModel::find($id);
        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allcategorylist($data['edit']->parent_id);
        }

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'service'.$data['edit']->category_type)->first();

        return view('admin.service-category-fourth.edit-service-category-fourth')->with($data);
    }

    public function FourthCategoryPreview()
    {
        $data['view'] = ServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        return view('admin.service-category-fourth.preview-service-category-fourth')->with($data);
    }

    public function FifthIndex()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        $select_table = ['ser_id','parent_id','video_type','service_type', 'service_name','service_image','service_banner_image','video_link','alt_tag','description','short_desc','title_tag','keyword_tag','description_tag','canonical_tag','url', 'order_by', 'status','ser_status'];
        $data['fourthcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fourthcategory')->get();
        $data['fifthcatview'] = ServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fifthcategory')->get();
        return view('admin.service-category-fifth.list-service-category-fifth')->with($data);
    }

    public function FifthAdd()
    {
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'service'.$data['view']->category_type)->first();
            }
        return view('admin.service-category-fifth.add-service-category-fifth')->with($data);
    }

    public function FifthEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ServiceModel::select('ser_id','service_name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ServiceModel::find($id);

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'service'.$data['edit']->category_type)->first();

        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allcategorylist($data['edit']->parent_id);
        }
        return view('admin.service-category-fifth.edit-service-category-fifth')->with($data);
    }

    public function FifthCategoryPreview()
    {
        $data['view'] = ServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->parent_id);
        return view('admin.service-category-fifth.preview-service-category-fifth')->with($data);
    }

    // public function SecondCategory(Request $request)
    // {
    //     $ser_id = $request->input('servicecategory');
    //     // $secondsec = CategoryTrait::allcategorylist($ser_id);
    //     $secondsec = ServiceModel::tree();
    //     return response()->json(['data'=>$secondsec]);
    // }

    public function SecondCategory(Request $request)
    {
        $ser_id = $request->input('servicecategory');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }

    public function ThirdCategory(Request $request)
    {
        $ser_id = $request->input('secondcategory');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }

    public function FourthCategory(Request $request)
    {
        $ser_id = $request->input('thirdcategory');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }

    public function FifthCategory(Request $request)
    {
        $ser_id = $request->input('fourthcategory');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }

    public function ServiceSection(Request $request)
    {
        $ser_id = $request->input('fifthcategory');
        $select_table = ['ser_id', 'service_name'];
        $data = ServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->ser_id}'>{$datalist->service_name}</option>";
        }
    }
    
    // public function SecondEditService($id)
    // {
    //     Session::put('primeid', $id);
    //     $data = ServiceModel::find($id);
    //     return view('admin.service-category-second.edit-service-category-second', ['edit' => $data]);
    // }

    // public function CategoryPreviewSecond()
    // {
    //     $data = ServiceModel::find(session('primeid'));
    //     return view('admin.service-category-second.preview-service-category-second', ['view' => $data]);
    // }

    // public function update_service(Request $request, $id)
    // {
    //     $servicecatlist = ServiceCategoryModel::find($id);

    //     if ($request->hasFile('service_image')) {
    //         $image = $request->file('service_image');
    //         $name = time() . '_banner.' . $image->getClientOriginalExtension();
    //         $destinationPath = Session::get('useradmin')['site_url'].'backend/service_category/image';
    //         $image->move($destinationPath, $name);
    //     } else {
    //         $name = $request->input('oldservice_image');
    //     }

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $name2 = time() . '.' . $image->getClientOriginalExtension();
    //         $destinationPath = Session::get('useradmin')['site_url'].'backend/service_category/image';
    //         $image->move($destinationPath, $name2);
    //     } else {
    //         $name2 = $request->input('oldimage');
    //     }

    //     if ($request->input('video_type') == 'image') {
    //         $videolink = '';
    //     } else {
    //         $videolink = $request->input('video_link');
    //     }
    //     $servicecatlist->update(array_merge(
    //         $request->input(),
    //         [
    //             'service_video' =>  $videolink,
    //             'service_image' => $name,
    //             'image' => $name2,
    //         ]
    //     ));

    //     return redirect('admin/service-category');
    // }
    public function delete_service($id)
    {
        $servicelist = ServiceModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();
        return redirect('admin/service-category');
    }
}
