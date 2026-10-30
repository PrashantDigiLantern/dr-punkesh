<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FooterModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class FooterController extends Controller
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
        
        $select_table = ['footer_id', 'footer_logo', 'header_logo','header_logo2','description', 'alt_tag', 'status','footer_status'];
        $query = FooterModel::select($select_table)->where('footer_type','leftside');
        $data['view'] = $query->get();
        $data['count'] = $query->count();
        return view('admin.logo.list-logo')->with($data);
    }

    public function add()
    {
        $data = FooterModel::find(session('primeid'));
        return view('admin.logo.add-logo',['view' => $data]);
    }

    public function create_logo(Request $request)
    {
        $destinationPath = $this->siteurl->sessionget().'backend/logo';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('footer_logo')) {
            $image = $request->file('footer_logo');
            $footer_img = time() . '_footer_logo.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $footer_img);
        }else{
            $footer_img = $request->input('oldfooter_logo');
        }

        if ($request->hasFile('header_logo')) {
            $image = $request->file('header_logo');
            $header_logo = time() . '_header_logo.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $header_logo);
        }else{
            $header_logo = $request->input('oldheader_logo');
        }

        if ($request->hasFile('header_logo2')) {
            $image = $request->file('header_logo2');
            $header_logo2 = time() . '_header_logo2.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $header_logo2);
        }else{
            $header_logo2 = $request->input('oldheader_logo2');
        }

        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $favicon = time() . '_favicon.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $favicon);
        }else{
            $favicon = $request->input('oldfavicon');
        }

        $footer_id = $request->input('footer_id');
        if($footer_id < 1){
            $footer = FooterModel::create(array_merge(
            $request->input(),
            [
                'footer_logo' => $footer_img,
                'header_logo' => $header_logo,
                'header_logo2' => $header_logo2,
                'favicon' => $favicon
            ]
        ));
        Session::put('primeid', $footer->footer_id);
    }else{
        $footerdata = FooterModel::find($footer_id);
        $footerdata->update(array_merge($request->input(),
            [
                'footer_key' => $footerdata->footer_key,
                'footer_logo' => $footer_img,
                'header_logo' => $header_logo,
                'header_logo2' => $header_logo2,
            ]
        ));
        }
        return redirect('admin/logo-list');
    }

  

    public function edit_logo($id)
    {
        Session::put('primeid', $id);
        $data['view'] = FooterModel::find($id);
        return view('admin.logo.add-logo')->with($data);
    }


    public function delete_logo($id)
    {
        $data = FooterModel::find($id);
        $data->update(['deleted_by' => session('useradmin')['usr_id']]);
        $data->delete();
        return redirect('admin/logo-list');
    }

/***************Footer Menu****************/
    public function FooterMenu()
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

        $select_table = ['footer_id', 'footer_logo', 'header_logo','description', 'alt_tag', 'status','footer_status','order_by'];
        $data['view'] = FooterModel::select($select_table)->where('footer_type','rightside')->get();
        return view('admin.footer-menu.list-footer-menu')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $bloglist = FooterModel::find($id);
        $bloglist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = FooterModel::find($id);
        $presslist->update($request->input());
    }

    public function AddFooterMenu()
    {
        $data['view'] = FooterModel::find(session('primeid'));
        return view('admin.footer-menu.add-footer-menu')->with($data);
    }

    public function AddFooterMenuList()
    {
        return view('admin.footer-menu.add-footer-menu-list');
    }

    public function CreateFooterMenu(Request $request)
    {
        foreach ($request->input('menu_name') as $key => $daylist) {
                $value['menuname'][] = 
                [
                        'menu_name' => $request->input('menu_name')[$key],
                        'menu_url' => $request->input('menu_url')[$key],
                        'menu_order_by' => $request->input('menu_order_by')[$key]
                ];
        }

        $menujsondata = json_encode($value);
    //    print_r($menujsondata);
    //    die();
        $footer_id = $request->input('footer_id');
        if($footer_id < 1){
            // die('hiiii');
            $doctor = FooterModel::create(
                [
                    'footer_name' => $request->input('footer_name'),
                    'footer_type' => $request->input('footer_type'),
                    'menu_name' => $menujsondata,
                ]
            );
            // die('hii');
            Session::put('primeid', $doctor->footer_id);
        } else {
            // die('hi');
            $contactus = FooterModel::find($footer_id);
            $contactus->update(
                [
                    'footer_name' => $request->input('footer_name'),
                    'footer_type' => $request->input('footer_type'),
                    'footer_key' => $contactus->footer_key,
                    'menu_name' => $menujsondata,
                ]
            );
        }

        return redirect('admin/footer-menu');
    }

    public function EditFooterMenu($id)
    {
        Session::put('primeid', $id);
        $data = FooterModel::find($id);
        return view('admin.footer-menu.add-footer-menu', ['view' => $data]);
    }

    public function delete_footer_menu($id)
    {
        $data = FooterModel::find($id);
        $data->update(['deleted_by' => session('useradmin')['usr_id']]);
        $data->delete();
        return redirect('admin/footer-menu');
    }
}
