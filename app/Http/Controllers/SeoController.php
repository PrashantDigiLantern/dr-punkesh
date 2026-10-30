<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SeoController extends Controller
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
        // print_r(session('useradmin'));
        
       // echo '<pre>';print_r(session('userinfo')['user_menu_permissions']);echo '</pre>';
        foreach(session('userinfo')['user_menu_permissions'] as $oplist){
            if($oplist->mnu_url == $uri){
             $uripermission = $oplist->cfgmnu_act_id;
             $uripermission = explode(',',$uripermission);
            }
         }
        $data['permission'] = $uripermission;
       
        $select_table = ['seo_id', 'page_name','title_tag','keyword_tag','description_tag','canonical_tag','image','type','site_name','url','status','seo_status'];
        $data['view'] = SeoPageModel::select($select_table)->get();
        return view('admin.seo-page.list-seo')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $seo = SeoPageModel::find($id);
        $seo->update($request->input());
    }

    public function add()
    {
        $data['view'] = SeoPageModel::find(session('primeid'));
        return view('admin.seo-page.add-seo')->with($data);
    }

    public function create_seo(Request $request)
    {
    $destinationPath = $this->siteurl->sessionget().'backend/seo';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');;
        }

        $seo_id = $request->input('seo_id');
        if($seo_id < 1){
        $seo = SeoPageModel::create(array_merge($request->input(),
    [
        'image' => $name
    ]
        ));
        Session::put('primeid', $seo->seo_id);
    }else{
            $seolist = SeoPageModel::find($seo_id);
            $seolist->update(array_merge($request->input(),
                [
                    'seo_key' => $seolist->seo_key,
                    'image' => $name
                ]
            ));
            }
        return redirect('admin/seo');
    }

    public function edit_seo($id)
    {
        Session::put('primeid', $id);
        $data = SeoPageModel::find($id);
        return view('admin.seo-page.edit-seo', ['edit' => $data]);
    }

    public function update_seo(Request $request, $id)
    {
        $data = SeoPageModel::find($id);
        $data->update($request->input());
        return redirect('admin/seo');
    }

    public function delete_seo($id)
    {
        $technology = SeoPageModel::find($id);
        $technology->update(['deleted_by' => session('useradmin')['usr_id']]);
        $technology->delete();
        return redirect('admin/seo');
    }
}
