<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\HomePictureModel;
use App\Models\HomeTechnologyModel;
use App\Models\OurServiceModel;
use App\Models\SliderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }
    
    public function slider()
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

        $select_table = ['slider_id','name','image','alt_tag','description','button_type','button_name','button_url','button_style','status','slider_status','order_by'];
        $data['view'] = SliderModel::select($select_table)->get();
        return view('admin.home.slider.list-slider')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $presslist = SliderModel::find($id);
        $presslist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = SliderModel::find($id);
        $presslist->update($request->input());
    }

    public function add_slider()
    {
        $data['view'] = SliderModel::find(session('primeid'));
        return view('admin.home.slider.add-slider')->with($data);
    }

    public function create_slider(Request $request)
    {
        $destinationPath = 'backend/slider';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        }else{
            $name = $request->input('oldimage');
        }
        if($request->input('button_type')=='Yes'){
            $button_name = $request->input('button_name');
            $button_url = $request->input('button_url');
            $button_style = $request->input('button_style');
        }else{
            $button_name = null;
            $button_url = null;
            $button_style = null;
        }
        $slider_id = $request->input('slider_id');
        if($slider_id < 1){
        $slider = SliderModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'button_name' => $button_name,
                'button_url' => $button_url,
                'button_style' => $button_style
            ]
        ));
        Session::put('primeid', $slider->slider_id);
    }else{
            $sliderlist = SliderModel::find($slider_id);
            $sliderlist->update(array_merge($request->input(),
                [
                    'slider_key' => $sliderlist->slider_key,
                    'image' => $name,
                    'button_name' => $button_name,
                    'button_url' => $button_url,
                    'button_style' => $button_style
                ]
            ));
            }
        return redirect('admin/slider');
    }

   

    public function edit_slider($id)
    {
        Session::put('primeid', $id);
        $data = SliderModel::find($id);
        return view('admin.home.slider.edit-slider', ['edit' => $data]);
    }

    
    public function delete_slider(Request $request, $id)
    {
        $sliderlist = SliderModel::find($id);
        $sliderlist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $sliderlist->delete();

        return redirect('admin/slider');
    }


}
