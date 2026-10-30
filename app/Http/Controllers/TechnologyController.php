<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\TechnologyModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TechnologyController extends Controller
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

        // $select_table = ['tech_id', 'name','image','banner_image','alt_tag','short_desc','description','title_tag','order_by','status'];
        $data['view'] = TechnologyModel::select('*')->get();
        return view('admin.technology.list-technology')->with($data);
    }

    public function add()
    {
        $data = TechnologyModel::find(session('primeid'));
        return view('admin.technology.add-technology', ['view' => $data]);
    }
    

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $technology = TechnologyModel::find($id);
        $technology->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $technology = TechnologyModel::find($id);
        $technology->update($request->input());
    }

    public function create_technology(Request $request)
    {
        $destinationPath = 'backend/service_video/technology';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('tech_image')) {
            $image = $request->file('tech_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldtech_image');
        }
        if ($request->hasFile('tech_banner')) {
            $image = $request->file('tech_banner');
            $name2 = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name2);
        } else {
            $name2 = $request->input('oldtech_banner');
        }
// die();
        $tech_id = $request->input('tech_id');
        if($tech_id < 1){
        $tech = TechnologyModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'banner_image' => $name2,
            ]
        ));
        Session::put('primeid', $tech->tech_id);
    }else{
            $testimonial = TechnologyModel::find($tech_id);
            $testimonial->update(array_merge($request->input(),
                [
                    'tech_key' => $testimonial->tech_key,
                    'image' => $name,
                    'banner_image' => $name2,
                ]
            ));
            }
            return redirect('admin/technology');
    }

    public function edit_technology($id)
    {
        Session::put('primeid', $id);
        $data = TechnologyModel::find($id);
        return view('admin.technology.edit-technology', ['edit' => $data]);
    }

    public function delete_technology($id)
    {
        $technology = TechnologyModel::find($id);
        $technology->update(['deleted_by' => session('useradmin')['usr_id']]);
        $technology->delete();
        return redirect('admin/technology');
    }
}
