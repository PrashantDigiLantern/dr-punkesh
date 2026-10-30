<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\PressMediaCategoryModel;
use App\Models\PressMediaModel;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PressMediaController extends Controller
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

        $select_table = ['press_cat_id', 'name', 'description', 'image','logo','alt_tag','videolink','title_tag','keyword_tag','description_tag','canonical','url', 'status','press_status', 'order_by'];
        $data['view'] = PressMediaCategoryModel::select($select_table)->get();
        return view('admin.pressmedia_category.list-pressmedia-category')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $presslist = PressMediaCategoryModel::find($id);
        $presslist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = PressMediaCategoryModel::find($id);
        $presslist->update($request->input());
    }

    public function add_pressmedia_category()
    {
        $data = PressMediaCategoryModel::find(session('primeid'));
        return view('admin.pressmedia_category.add-pressmedia-category',['view' => $data]);
    }

    public function create_pressmedia_category(Request $request)
    {
        $destinationPath = 'backend/pressmedia/category';
        $destinationPathlogo = 'backend/pressmedia/logo';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if (!File::exists($destinationPathlogo)) {
            File::makeDirectory($destinationPathlogo, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name2 = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPathlogo, $name2);
        } else {
            $name2 = $request->input('oldlogoimage');
        }
        $press_cat_id = $request->input('press_cat_id');
        if($press_cat_id < 1){
            $press = PressMediaCategoryModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'logo' => $name2,
            ]
        ));
        Session::put('primeid', $press->press_cat_id);
    }else{
        $pressdata = PressMediaCategoryModel::find($press_cat_id);
        $pressdata->update(array_merge($request->input(),
            [
                'press_cat_key' => $pressdata->press_cat_key,
                'image' => $name,
                'logo' => $name2,
            ]
        ));
        }

        if($request->input('url') != '#'){
            $dataseo = [
                'seo_type' => 'pressmediacategory',
                'page_name' => $request->input('name'),
                'title_tag' => $request->input('title_tag'),
                'keyword_tag' => $request->input('keyword_tag'),
                'description_tag' => $request->input('description_tag'),
                'canonical_tag' => $request->input('canonical'),
                'image' => $name,
                'type' => $request->input('type'),
                'site_name' => $request->input('site_name'),
                'url' => $request->input('url')
            ];
        $seo = SeoPageModel::where('url',$request->input('url'))->where('seo_type','pressmediacategory')->where('seo_status','preview');
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
    
        return redirect('admin/pressmedia-category');
    }

    public function edit_pressmedia_category($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = PressMediaCategoryModel::find($id);
        return view('admin.pressmedia_category.edit-pressmedia-category')->with($data);
    }

    public function delete_pressmedia_category(Request $request, $id)
    {
        $presslist = PressMediaCategoryModel::find($id);
        $presslist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $presslist->delete();
        return redirect('admin/pressmedia-category');
    }



    public function pressmediaindex()
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

        $select_table = ['press_media.*', 'press_media_category.name as category_name'];
        $data['view'] = PressMediaModel::select($select_table)
            ->join('press_media_category', 'press_media_category.press_cat_id', 'press_media.press_cat_id')->get();
        return view('admin.pressmedia.list-pressmedia')->with($data);
    }

    public function getactive_pressmedia(Request $request)
    {
        $id = $request->input('id');
        $technology = PressMediaModel::find($id);
        $technology->update($request->input());
    }

    public function add_pressmedia()
    {
        $data['view'] = PressMediaModel::find(session('primeid'));
        $data['presscat'] = PressMediaCategoryModel::select('press_cat_id','name')->get();
        return view('admin.pressmedia.add-pressmedia')->with($data);
    }

    public function addpressmedia()
    {
        return view('admin.pressmedia.add-image-type');
    }
    public function create_pressmedia(Request $request)
    {
        $destinationPath = 'backend/pressmedia/image';
        $destinationPathbanner = 'backend/pressmedia/banner';

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
            $bannerimage = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPathbanner, $bannerimage);
        } else {
            $bannerimage = $request->input('oldbannerimage');
        }


        $press_id = $request->input('press_id');
        if($press_id < 1){
        $press = PressMediaModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'banner_image' => $bannerimage,
                // 'all_image' => $all_image,
            ]
        ));
        Session::put('primeid', $press->press_id);
    }else{
            $testimonial = PressMediaModel::find($press_id);
            $testimonial->update(array_merge($request->input(),
                [
                    'press_key' => $testimonial->press_key,
                    'image' => $name,
                    'banner_image' => $bannerimage,
                    // 'all_image' => $all_image,
                ]
            ));
            }

            
        return redirect('admin/pressmedia');
    }

    public function edit_pressmedia($id)
    {
        Session::put('primeid', $id);
        $data['view'] = PressMediaCategoryModel::select('press_cat_id','name')->get();
        $data['edit'] = PressMediaModel::find($id);
        return view('admin.pressmedia.edit-pressmedia')->with($data);
    }

    public function delete_pressmedia($id)
    {
        $press = PressMediaModel::find($id);
        $press->update(['deleted_by' => session('useradmin')['usr_id']]);
        $press->delete();
        return redirect('admin/pressmedia');
    }
}
