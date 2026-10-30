<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\SeoPageModel;
use App\Models\TestimonialVideoModel;
use App\Models\VideoServiceModel;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TestimonialVideoController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }

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
        
        $data['view'] = TestimonialVideoModel::get();
       
        return view('admin.testimonials-video.list-testimonials-video')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $service = TestimonialVideoModel::find($id);
        $service->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $service = TestimonialVideoModel::find($id);
        $service->update($request->input());
    }

    public function add()
    {
        $data['view'] = TestimonialVideoModel::find(session('primeid'));
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);
        
        return view('admin.testimonials-video.add-testimonials-video')->with($data);
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

    public function CreateVideoTestimonials(Request $request)
    {
        $destinationPath = 'backend/service_video/inner';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }

        $test_video_id = $request->input('test_video_id');
        if($test_video_id < 1){
        $video = TestimonialVideoModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
            ]
        ));
        Session::put('primeid', $video->test_video_id);
    }else{
            $videoinner = TestimonialVideoModel::find($test_video_id);
            $videoinner->update(array_merge($request->input(),
                [
                    'image' => $name,
                ]
            ));
            }
            // echo '<pre>';print_r($request->input());echo '</pre>';die();
        return redirect('admin/video-testimonials');
    }

    public function EditVideoTestimonials($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = TestimonialVideoModel::find($id);

        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        return view('admin.testimonials-video.edit-testimonials-video')->with($data);
    }

    public function DeleteVideoTestimonials($id)
    {
        $service = TestimonialVideoModel::find($id);
        $service->update(['deleted_by' => session('useradmin')['usr_id']]);
        $service->delete();
        return redirect('admin/video-testimonials');
    }
    ///=============Service Result Inner End ====================//
}
