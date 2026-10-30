<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FrontMenuModel;
use App\Models\ResultInnerModel;
use App\Models\ResultServiceModel;
use App\Models\SeoPageModel;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ResultCategoryController extends Controller
{

    public function __construct(Helpers $siteurl)
    {
       $this->siteurl = $siteurl;
    }
        //=======================Service Result Category==================//
    public function indexcategory()
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

        $select_table = ['res_ser_id','parent_id', 'category_type', 'result_cat_id','service_id','name','image','banner_image','video_type','video_link','alt_tag','description','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','result_status','status'];
        $data['view'] = ResultServiceModel::select($select_table)->whereNull('parent_id')->get();
        return view('admin.result-category.list-result-category')->with($data);
    }

    public function getactive_result_category(Request $request)
    {
        $id = $request->input('id');
        $service = ResultServiceModel::find($id);
        $service->update($request->input());
    }

    public function orderby_result_category(Request $request)
    {
        $id = $request->input('id');
        $service = ResultServiceModel::find($id);
        $service->update($request->input());
    }

    public function add_result_category()
    {
        $data['view'] = ResultServiceModel::find(session('primeid'));
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'result'.$data['view']->category_type)->first();
            }
        return view('admin.result-category.add-result-category')->with($data);
    }

    public function create_service_category(Request $request)
    {
        $destinationPath = 'backend/service_result/category_banner';
        $destinationPathimage = 'backend/service_result/image';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathimage)) {
            File::makeDirectory($destinationPathimage, $mode = 0777, true, true);
        }

        $categorytype = $request->input('category_type');
        if($categorytype=='firstcategory'){
            $redirect_blade = 'admin/result-category-preview';
            $redirect_blade_fail = 'admin/add-service-result-category';
            $redirect_blade_list = 'admin/add-service-result-category';
            $redirect_blade_list = 'admin/service-result-category';
        }elseif($categorytype=='secondcategory'){
            $redirect_blade = 'admin/second-result-category-preview';
            $redirect_blade_fail = 'admin/add-second-result-category';
            $redirect_blade_list = 'admin/second-result-category';
        }elseif($categorytype=='thirdcategory'){
            $redirect_blade = 'admin/third-result-category-preview';
            $redirect_blade_fail = 'admin/add-third-result-category';
            $redirect_blade_list = 'admin/admin/third-result-category';
        }elseif($categorytype=='fourthcategory'){
            $redirect_blade = 'admin/fourth-result-category-preview';
            $redirect_blade_fail = 'admin/add-fourth-result-category';
            $redirect_blade_list = 'admin/admin/fourth-result-category';
        }elseif($categorytype=='fifthcategory'){
            $redirect_blade = 'admin/fifth-result-category-preview';
            $redirect_blade_fail = 'admin/add-fifth-result-category';
            $redirect_blade_list = 'admin/admin/fifth-result-category';
        }

        //this is assign plan required field
        $validator = Validator::make($request->input(), [
            'name' => 'required',
        ]);
        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect($redirect_blade_fail);
        }

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldbanner_image');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name2 = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPathimage, $name2);
        } else {
            $name2 = $request->input('oldimage');
        }

        if ($request->input('video_type') == 'image') {
            $video_link = null;
        } else {
            $video_link = $request->input('video_link');
        }

        $res_ser_id = $request->input('res_ser_id');
        if($res_ser_id < 1){
            $video = ResultServiceModel::create(array_merge(
            $request->input(),
            [
                'banner_image' => $name,
                'image' => $name2,
                'video_link' => $video_link,
            ]
        ));
        Session::put('primeid', $video->res_ser_id);
    }else{
        $videodata = ResultServiceModel::find($res_ser_id);
        $videodata->update(array_merge($request->input(),
            [
                'result_key' => $videodata->result_key,
                'banner_image' => $name,
                'image' => $name2,
                'video_link' => $video_link,
            ]
        ));
        }

        if($request->input('url') != '#'){
            $dataseo = [
                'seo_type' => 'result'.$categorytype,
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
            $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','result'.$categorytype)->where('seo_status','preview');
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

        return redirect($redirect_blade_list);
    }


    public function edit_service_category($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = ResultServiceModel::find($id);
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'result'.$data['edit']->category_type)->first();

        if($data['edit']->category_type=='firstcategory'){
            $redirect_blade = 'admin.result-category.edit-result-category';
        }elseif($data['edit']->category_type=='secondcategory'){
            $redirect_blade = 'admin.result-category-second.edit-result-category-second';
        }
        // $data['servicecat'] = ServiceCategoryModel::select('ser_cat_id','service_name')->get();
        return view($redirect_blade)->with($data);
    }

    public function SecondResultIndex()
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
        $select_table = ['res_ser_id','parent_id', 'category_type', 'result_cat_id','service_id','name','image','banner_image','video_type','video_link','alt_tag','description','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','result_status','status'];
        $data['view'] = ResultServiceModel::select($select_table)->whereNull('parent_id')->where('category_type','firstcategory')->get();
        $data['secondcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','secondcategory')->get();
        return view('admin.result-category-second.list-result-category-second')->with($data);
    }

    public function SecondResultAdd()
    {
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ResultServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'result'.$data['view']->category_type)->first();
            }
        return view('admin.result-category-second.add-result-category-second')->with($data);
    }

    public function ThirdResultIndex()
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
        $select_table = ['res_ser_id','parent_id', 'category_type', 'result_cat_id','service_id','name','image','banner_image','video_type','video_link','alt_tag','description','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','result_status','status'];
        $data['secondcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','secondcategory')->get();
        $data['thirdcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','thirdcategory')->get();
        return view('admin.result-category-third.list-result-category-third')->with($data);
    }

    public function ThirdResultAdd()
    {
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ResultServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'result'.$data['view']->category_type)->first();
            }
        return view('admin.result-category-third.add-result-category-third')->with($data);
    }

    public function ThirdResultEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ResultServiceModel::find($id);

        if(isset($data['edit']->parent_id)){
        $data['secondsec'] = CategoryTrait::allresultcategorylist($data['edit']->parent_id);
        }
        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'result'.$data['edit']->category_type)->first();

        return view('admin.result-category-third.edit-result-category-third')->with($data);
    }

    public function ThirdResultCategoryPreview()
    {
        $data['view'] = ResultServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        return view('admin.result-category-third.preview-result-category-third')->with($data);
    }

    public function FourthResultIndex()
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
        $select_table = ['res_ser_id','parent_id', 'category_type', 'result_cat_id','service_id','name','image','banner_image','video_type','video_link','alt_tag','description','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','result_status','status'];
        $data['thirdcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','thirdcategory')->get();
        $data['fourthcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fourthcategory')->get();
        return view('admin.result-category-fourth.list-result-category-fourth')->with($data);
    }

    public function FourthResultAdd()
    {
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ResultServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'result'.$data['view']->category_type)->first();
            }
        return view('admin.result-category-fourth.add-result-category-fourth')->with($data);
    }

    public function FourthResultEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ResultServiceModel::find($id);
        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['edit']->parent_id);
        }
        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'result'.$data['edit']->category_type)->first();

        return view('admin.result-category-fourth.edit-result-category-fourth')->with($data);
    }

    public function FourthResultCategoryPreview()
    {
        $data['view'] = ResultServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        return view('admin.result-category-fourth.preview-result-category-fourth')->with($data);
    }

    public function FifthResultIndex()
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
        $select_table = ['res_ser_id','parent_id', 'category_type', 'result_cat_id','service_id','name','image','banner_image','video_type','video_link','alt_tag','description','title_tag','keyword_tag','description_tag','canonical_tag','url','order_by','result_status','status'];
        $data['fourthcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fourthcategory')->get();
        $data['fifthcatview'] = ResultServiceModel::select($select_table)->whereNotNull('parent_id')->where('category_type','fifthcategory')->get();
        return view('admin.result-category-fifth.list-result-category-fifth')->with($data);
    }

    public function FifthResultAdd()
    {
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['view'] = ResultServiceModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        }
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
            ->where('url', $data['view']->url)->where('seo_type', 'result'.$data['view']->category_type)->first();
            }
        return view('admin.result-category-fifth.add-result-category-fifth')->with($data);
    }

    public function FifthResultEditService($id)
    {
        Session::put('primeid', $id);
        $data['firstcategory'] = ResultServiceModel::select('res_ser_id','name')->whereNull('parent_id')
        ->where('category_type','firstcategory')->get();
        $data['edit'] = ResultServiceModel::find($id);

        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allresultcategorylist($data['edit']->parent_id);
        }

        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'result'.$data['edit']->category_type)->first();

        return view('admin.result-category-fifth.edit-result-category-fifth')->with($data);
    }

    public function FifthResultCategoryPreview()
    {
        $data['view'] = ResultServiceModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allresultcategorylist($data['view']->parent_id);
        return view('admin.result-category-fifth.preview-result-category-fifth')->with($data);
    }

    // public function SecondCategory(Request $request)
    // {
    //     $ser_id = $request->input('servicecategory');
    //     // $secondsec = CategoryTrait::allresultcategorylist($ser_id);
    //     $secondsec = ServiceModel::tree();
    //     return response()->json(['data'=>$secondsec]);
    // }

    public function SecondResultCategory(Request $request)
    {
        $ser_id = $request->input('servicecategory');
        $select_table = ['res_ser_id','name'];
        $data = ResultServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->res_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function ThirdResultCategory(Request $request)
    {
        $ser_id = $request->input('secondcategory');
        $select_table = ['res_ser_id','name'];
        $data = ResultServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->res_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function FourthResultCategory(Request $request)
    {
        $ser_id = $request->input('thirdcategory');
        $select_table = ['res_ser_id','name'];
        $data = ResultServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->res_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function FifthResultCategory(Request $request)
    {
        $ser_id = $request->input('fourthcategory');
        $select_table = ['res_ser_id','name'];
        $data = ResultServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->res_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function ServiceResultSection(Request $request)
    {
        $ser_id = $request->input('fifthcategory');
        $select_table = ['res_ser_id','name'];
        $data = ResultServiceModel::select($select_table)->where('parent_id', $ser_id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->res_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function delete_service_category($id)
    {
        $service = ResultServiceModel::find($id);
        $service->update(['deleted_by' => session('useradmin')['usr_id']]);
        $service->delete();
        return redirect('admin/service-result-category');
    }

}
