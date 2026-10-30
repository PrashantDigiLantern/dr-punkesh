<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FrontMenuModel;
use App\Models\ResultCategoryModel;
use App\Models\SeoPageModel;
use App\Models\VideoInnerModel;
use App\Models\VideoServiceModel;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ServiceVideoController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }
    
    //=======================Service Result==================//
    public function indexvideoservice()
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
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        $data['view'] = VideoServiceModel::select('*')->where('category_type','service')->get();
        return view('admin.video-service.list-video-service')->with($data);
    }

    public function getactive_video_service(Request $request)
    {
        $id = $request->input('id');
        $service = VideoServiceModel::find($id);
        $service->update($request->input());
    }

    public function orderby_video_service(Request $request)
    {
        $id = $request->input('id');
        $service = VideoServiceModel::find($id);
        $service->update($request->input());
    }

    public function add_video_service()
    {
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        $data['firstcategory'] = VideoServiceModel::select('vid_ser_id', 'name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

        $data['view'] = VideoServiceModel::find(session('primeid'));
       
        if (isset($data['view']->parent_id)) {
            $data['secondsec'] = CategoryTrait::allvideocategorylist($data['view']->parent_id);
        }

        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['view']->url)->where('seo_type', 'videodetail')->first();
            }
        
        // $data['view'] = VideoServiceModel::find(session('primeid'));
        // $data['resultcat'] = ResultCategoryModel::select('vid_ser_id','name')->get();
        // if(isset($data['view']->service_id)){
        // $data['service'] = ServiceModel::select('ser_id', 'service_name')
        //     ->where('ser_id', $data['view']->service_id)->first();
        // }
        return view('admin.video-service.add-video-service')->with($data);
    }
    public function video_servicelist(Request $request)
    {
        $serviceid = $request->input('servicelist');
        //   exit;
        $servicecat = ResultCategoryModel::select('service_cat_id')
            ->where('vid_ser_id', $serviceid)->first();
      $servicecateid = $servicecat->service_cat_id;
        $service = ServiceModel::select('ser_id', 'service_name')
            ->whereIn('service_cat_id', [$servicecateid])
            ->get();
            echo '<option value="">Select Service Category</option>';
        foreach ($service as $servicename) {
            echo '<option value=' . $servicename->ser_id . '>' . $servicename->service_name . '</option>';
        }
    }
    public function create_video_service(Request $request)
    {
        $destinationPath = 'backend/service_video/service';
        $destinationPathbanner = 'backend/service_video/service_banner';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathbanner)) {
            File::makeDirectory($destinationPathbanner, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name2 = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPathbanner, $name2);
        } else {
            $name2 = $request->input('oldbanner_image');
        }

        if ($request->input('video_type') == 'image') {
            $video_link = null;
        } else {
            $video_link = $request->input('video_link');
        }
        $parent_id = null;
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $permissionoprid = explode(',', $permissionoprid);
        if (in_array('47', $permissionoprid)) {
            $parent_id = $request->input('fifth_cat');
        } else {
            if (in_array('46', $permissionoprid)) {
                $parent_id = $request->input('fourt_cat');
            } else {
                if (in_array('45', $permissionoprid)) {
                    $parent_id = $request->input('third_cat');
                } else {
                    if (in_array('44', $permissionoprid)) {
                        $parent_id = $request->input('second_cat');
                    } else {
                        if (in_array('22', $permissionoprid)) {
                            $parent_id = $request->input('service_cat');
                        }
                    }
                }
            }
        }

        $vid_ser_id = $request->input('vid_ser_id');
        if($vid_ser_id < 1){
        $videoser = VideoServiceModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'banner_image' => $name2,
                'video_link' => $video_link,
                'parent_id' => $parent_id
            ]
        ));
        Session::put('primeid', $videoser->vid_ser_id);
    }else{
            $video = VideoServiceModel::find($vid_ser_id);
            $video->update(array_merge($request->input(),
                [
                    'vid_ser_key' => $video->vid_ser_key,
                    'image' => $name,
                    'banner_image' => $name2,
                    'video_link' => $video_link,
                    'parent_id' => $parent_id
                ]
            ));
            }

            if($request->input('url') != '#'){
                $dataseo = [
                    'seo_type' => 'video',
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
                $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','videodetail')->where('seo_status','preview');
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
        return redirect('admin/video-service');
    }

    public function edit_video_service($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = VideoServiceModel::find($id);

        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        $data['firstcategory'] = VideoServiceModel::select('vid_ser_id', 'name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'videodetail')->first();

        // $data['view'] = VideoServiceModel::find(session('primeid'));
       
        if (isset($data['edit']->parent_id)) {
            $data['secondsec'] = CategoryTrait::allvideocategorylist($data['edit']->parent_id);
        }

        return view('admin.video-service.edit-video-service')->with($data);
    }

    public function delete_video_service($id)
    {
        $service = VideoServiceModel::find($id);
        $service->update(['deleted_by' => session('useradmin')['usr_id']]);
        $service->delete();
        return redirect('admin/video-service');
    }
    ///=============Service Result ====================//
    ///=============Service Result Inner ====================//

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

        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        
        // $select_table = ['result_inner.*','result_category.name as servicecatname', 'result_service.name as servicename'];
        $data['view'] = VideoInnerModel::select('*')->get();
        // $data['resultcat'] = ResultCategoryModel::select('vid_ser_id','name')->get();
        $data['resultservice'] = VideoServiceModel::select('vid_ser_id','name')->get();
        return view('admin.video-service-inner.list-video-service-inner')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $service = VideoInnerModel::find($id);
        $service->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $service = VideoInnerModel::find($id);
        $service->update($request->input());
    }

    public function add()
    {
        $data['view'] = VideoInnerModel::find(session('primeid'));
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        
        $data['firstcategory'] = VideoServiceModel::select('vid_ser_id', 'name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();
            $data['servicedata'] = ServiceModel::where('category_type', 'service')->get();
        if(isset($data['view']->video_service_id)){
            $data['service'] = VideoServiceModel::select('vid_ser_id', 'name')
        ->where('vid_ser_id',$data['view']->video_service_id)->where('status','active')->first();
        $data['secondsec'] = CategoryTrait::allvideocategorylist($data['view']->video_service_id);
        }
        // print_r($data['secondsec']);
        // die();
    //    print_r($data['firstcategory']);
        return view('admin.video-service-inner.add-video-service-inner')->with($data);
    }
    public function service_change(Request $request)
    {
        $id = $request->input('servicecat');
        $data = VideoServiceModel::select('vid_ser_id','name')
            ->where('video_cat_id', $id)->get();
        echo "<option value=''>Select Service</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->vid_ser_id}'>{$datalist->name}</option>";
        }
    }

    public function create_service(Request $request)
    {
        $destinationPath = 'backend/service_video/inner';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        $parent_id = null;
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $permissionoprid = explode(',', $permissionoprid);
        if (in_array('47', $permissionoprid)) {
            $parent_id = $request->input('fifth_cat');
        } else {
            if (in_array('46', $permissionoprid)) {
                $parent_id = $request->input('fourt_cat');
            } else {
                if (in_array('45', $permissionoprid)) {
                    $parent_id = $request->input('third_cat');
                } else {
                    if (in_array('44', $permissionoprid)) {
                        $parent_id = $request->input('second_cat');
                    } else {
                        if (in_array('22', $permissionoprid)) {
                            $parent_id = $request->input('service_cat');
                        }
                    }
                }
            }
        }

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }
        $vidser = $request->input('video_service_id');
        if(isset($vidser)){
           $video_service_id = $request->input('video_service_id');
        }else{
            $video_service_id = null;
        }
        $vid_inn_id = $request->input('vid_inn_id');
        if($vid_inn_id < 1){
        $video = VideoInnerModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'video_cat_id' => $parent_id,
                'video_service_id' => $video_service_id,
            ]
        ));
        Session::put('primeid', $video->vid_inn_id);
    }else{
            $videoinner = VideoInnerModel::find($vid_inn_id);
            $videoinner->update(array_merge($request->input(),
                [
                    'vid_inn_key' => $videoinner->vid_inn_key,
                    'image' => $name,
                    'video_cat_id' => $parent_id,
                    'video_service_id' => $video_service_id,
                ]
            ));
            }
        return redirect('admin/service-video-inner');
    }

    public function edit_service($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = VideoInnerModel::find($id);

        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        $data['firstcategory'] = VideoServiceModel::select('vid_ser_id', 'name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

        $data['service'] = VideoServiceModel::select('vid_ser_id', 'name')
        ->where('vid_ser_id',$data['edit']->video_service_id)->where('status','active')->first();
        // $data['resultservice'] = VideoServiceModel::select('vid_ser_id','name')->get();
        $data['servicedata'] = ServiceModel::where('category_type', 'service')->get();
        if(isset($data['edit']->video_service_id)){
        $data['secondsec'] = CategoryTrait::allvideocategorylist($data['edit']->video_service_id);
    }
        return view('admin.video-service-inner.edit-video-service-inner')->with($data);
    }

    public function delete_service($id)
    {
        $service = VideoInnerModel::find($id);
        $service->update(['deleted_by' => session('useradmin')['usr_id']]);
        $service->delete();
        return redirect('admin/service-video-inner');
    }
    ///=============Service Result Inner End ====================//
}
