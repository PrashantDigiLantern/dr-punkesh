<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\FrontMenuModel;
use App\Trait\CategoryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FrontMenuController extends Controller
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

        $select_table = ['mnu_id', 'name','type','page_heading','urllink','dropdown','menu_banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical','status','menu_status','order_by'];
        $data['view'] = FrontMenuModel::select($select_table)->whereNull('parent_id')->where('menu_type', 'primarymenu')->get();

        $select_table = ['mnu_id', 'name'];
        $data['menuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','publish')->get();

        $select_table = ['mnu_id', 'name'];
        $data['premenuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','preview')->get();

        return view('admin.menu-primary.list-primary-menu')->with($data);
    }

    public function getactive(Request $request)
    { 
        $id = $request->input('id');
        $menulist = FrontMenuModel::find($id);
        $menulist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = FrontMenuModel::find($id);
        $presslist->update($request->input());
    }

    public function add()
    {
        $data['view'] = FrontMenuModel::find(session('primeid'));
        return view('admin.menu-primary.add-primary-menu')->with($data);
    }

    public function create_primary(Request $request)
    {
        $destinationPath = $this->siteurl->sessionget().'backend/menu';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }


        $menutype = $request->input('menu_type');
        if($menutype=='primarymenu'){
            $redirect_blade = 'admin/primary-menu-preview';
            $redirect_blade_fail = 'admin/add-primary-menu';
            $redirect_blade_list = 'admin/primary-menu';
        }elseif($menutype=='secondarymenu'){
            $redirect_blade = 'admin/secondary-menu-preview';
            $redirect_blade_fail = 'admin/add-secondary-menu';
            $redirect_blade_list = 'admin/secondary-menu';
        }elseif($menutype=='thirdmenu'){
            $redirect_blade = 'admin/third-menu-preview';
            $redirect_blade_fail = 'admin/add-third-menu';
            $redirect_blade_list = 'admin/third-menu';
        }elseif($menutype=='fourthmenu'){
            $redirect_blade = 'admin/fourth-menu-preview';
            $redirect_blade_fail = 'admin/add-fourth-menu';
            $redirect_blade_list = 'admin/fourth-menu';
        }elseif($menutype=='fifthmenu'){
            $redirect_blade = 'admin/fifth-menu-preview';
            $redirect_blade_fail = 'admin/add-fifth-menu';
            $redirect_blade_list = 'admin/fifth-menu';
        }

        //this is assign plan required field
        $validator = Validator::make($request->input(), [
            'name' => 'required',
        ]);
        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect($redirect_blade_fail);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            if($request->input('oldimage')!=''){
            $name = $request->input('oldimage');
            }else{
                $name = null;
            }
        }

        $prim_id = $request->input('mnu_id');
        if($prim_id < 1){
        $primary = FrontMenuModel::create(array_merge(
            $request->input(),
            [
                'menu_banner_image' => $name,
                'status' => 'active',
            ]
        ));
        Session::put('primeid', $primary->mnu_id);
    }else{
            $primarymenu = FrontMenuModel::find($prim_id);
            $primarymenu->update(array_merge($request->input(),
                [
                    'menu_key' => $primarymenu->menu_key,
                    'menu_banner_image' => $name,
                ]
            ));
            }
        return redirect($redirect_blade_list);
    }

    public function edit_primary($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = FrontMenuModel::find($id);
        $data['primerymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('dropdown','Yes')->get();
        // print_r($data['primerymenu']);
        if($data['edit']->menu_type=='primarymenu'){
            $redirect_blade = 'admin.menu-primary.edit-primary-menu';
        }elseif($data['edit']->menu_type=='secondarymenu'){
            if(isset($data['edit']->parent_id)){
                $data['secondsec'] = CategoryTrait::allmenulist($data['edit']->parent_id);
            }
            $redirect_blade = 'admin.menu-secondary.edit-secondary-menu';
        }
        return view($redirect_blade)->with($data);
    }

    public function SecondMenuIndex()
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
        // die('hi');
        $data['permission'] = $uripermission;
        $select_table_primary = ['mnu_id', 'name'];
        $select_table = ['mnu_id', 'parent_id','menu_type','name','type','page_heading','urllink','dropdown','menu_banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical','status','menu_status','order_by'];
        $data['primarymenu'] = FrontMenuModel::select($select_table_primary)->whereNull('parent_id')->where('menu_type','primarymenu')->get();
        // dd($data['primarymenu']);
        $data['view'] = FrontMenuModel::select($select_table)->whereNotNull('parent_id')->where('menu_type','secondarymenu')->get();

        $select_table = ['mnu_id', 'name'];
        $data['menuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','publish')->get();

        $select_table = ['mnu_id', 'name'];
        $data['premenuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','preview')->get();

        return view('admin.menu-secondary.list-secondary-menu')->with($data);
    }

    public function SecondMenuAdd()
    {
        $data['primerymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->where('dropdown','Yes')->get();
        $data['view'] = FrontMenuModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        }
        return view('admin.menu-secondary.add-secondary-menu')->with($data);
    }

    public function ThirdMenuIndex()
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
        $select_table = ['mnu_id', 'name'];
        $data['menuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','publish')->get();

        $select_table = ['mnu_id', 'name'];
        $data['premenuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','preview')->get();

        $select_table_sec = ['mnu_id', 'name'];
        $select_table = ['mnu_id', 'parent_id','menu_type', 'name','type','page_heading','urllink','dropdown','menu_banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical','status','menu_status','order_by'];
        $data['secondcatview'] = FrontMenuModel::select($select_table_sec)->whereNotNull('parent_id')->where('menu_type','secondarymenu')->get();
        $data['thirdcatview'] = FrontMenuModel::select($select_table)->whereNotNull('parent_id')->where('menu_type','thirdmenu')->get();
        return view('admin.menu-third.list-third-menu')->with($data);
    }

    public function ThirdMenuAdd()
    {
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->where('dropdown','Yes')->get();
        $data['view'] = FrontMenuModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        }
        return view('admin.menu-third.add-third-menu')->with($data);
    }

    public function ThirdMenuEdit($id)
    {
        Session::put('primeid', $id);
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->where('dropdown','Yes')->get();
        $data['edit'] = FrontMenuModel::find($id);
        
        if(isset($data['edit']->parent_id)){
        $data['secondsec'] = CategoryTrait::allmenulist($data['edit']->parent_id);
        }
        return view('admin.menu-third.edit-third-menu')->with($data);
    }

    public function ThirdMenuPreview()
    {
        $data['view'] = FrontMenuModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        return view('admin.menu-third.preview-third-menu')->with($data);
    }

    public function FourthMenuIndex()
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
        $select_table = ['mnu_id', 'name'];
        $data['menuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','publish')->get();

        $select_table = ['mnu_id', 'name'];
        $data['premenuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','preview')->get();

        $select_table_third = ['mnu_id', 'name'];
        $select_table = ['mnu_id','parent_id','menu_type','name','type','page_heading','urllink','dropdown','menu_banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical','status','menu_status','order_by'];
        $data['thirdmenuview'] = FrontMenuModel::select($select_table_third)->whereNotNull('parent_id')->where('menu_type','thirdmenu')->get();
        $data['fourthmenuview'] = FrontMenuModel::select($select_table)->whereNotNull('parent_id')->where('menu_type','fourthmenu')->get();
        return view('admin.menu-fourth.list-fourth-menu')->with($data);
    }

    public function FourthMenuAdd()
    {
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->get();
        $data['view'] = FrontMenuModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        }
        return view('admin.menu-fourth.add-fourth-menu')->with($data);
    }

    public function FourthMenuEdit($id)
    {
        Session::put('primeid', $id);
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->get();
        $data['edit'] = FrontMenuModel::find($id);
        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['edit']->parent_id);
        }
        return view('admin.menu-fourth.edit-fourth-menu')->with($data);
    }

    public function FourthMenuPreview()
    {
        $data['view'] = FrontMenuModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        return view('admin.menu-fourth.preview-fourth-menu')->with($data);
    }

    public function FifthMenuIndex()
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
        $select_table = ['mnu_id', 'name'];
        $data['menuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','publish')->get();

        $select_table = ['mnu_id', 'name'];
        $data['premenuview'] = FrontMenuModel::select($select_table)->where('dropdown','Yes')->where('menu_status','preview')->get();

        $select_table_fifth = ['mnu_id', 'name'];
        $select_table = ['mnu_id', 'parent_id','menu_type', 'name','type','page_heading','urllink','dropdown','menu_banner_image','alt_tag','title_tag','keyword_tag','description_tag','canonical','status','menu_status','order_by'];
        $data['fourthmenuview'] = FrontMenuModel::select($select_table_fifth)->whereNotNull('parent_id')->where('menu_type','fourthmenu')->get();
        $data['fifthmenuview'] = FrontMenuModel::select($select_table)->whereNotNull('parent_id')->where('menu_type','fifthmenu')->get();
        return view('admin.menu-fifth.list-fifth-menu')->with($data);
    }

    public function FifthMenuAdd()
    {
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->get();
        $data['view'] = FrontMenuModel::find(session('primeid'));
        if(isset($data['view']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        }
        return view('admin.menu-fifth.add-fifth-menu')->with($data);
    }

    public function FifthMenuEdit($id)
    {
        Session::put('primeid', $id);
        $data['primarymenu'] = FrontMenuModel::select('mnu_id','name')->whereNull('parent_id')
        ->where('menu_type','primarymenu')->get();
        $data['edit'] = FrontMenuModel::find($id);

        if(isset($data['edit']->parent_id)){
            $data['secondsec'] = CategoryTrait::allmenulist($data['edit']->parent_id);
        }
        return view('admin.menu-fifth.edit-fifth-menu')->with($data);
    }

    public function FifthMenuPreview()
    {
        $data['view'] = FrontMenuModel::find(session('primeid'));
        $data['secondsec'] = CategoryTrait::allmenulist($data['view']->parent_id);
        return view('admin.menu-fifth.preview-fifth-menu')->with($data);
    }

    public function PrimaryMenu(Request $request)
    {
        $menuid = $request->input('menuid');
        $select_table = ['mnu_id','name'];
        $data = FrontMenuModel::select($select_table)->where('parent_id', $menuid)->get();
        echo "<option value=''>Select Menu</option>";
        foreach ($data as $datalist) {
            echo "<option value='{$datalist->mnu_id}'>{$datalist->name}</option>";
        }
    }

    public function menuassign(Request $request){
        $menuid = $request->input('id');
        $parent_id = $request->input('parent_id');
        if($parent_id != 'null'){
        $parentid = FrontMenuModel::find($parent_id);
        if($parentid->menu_type == 'primarymenu'){
            $menutype = 'secondarymenu';
        }elseif($parentid->menu_type == 'secondarymenu'){
            $menutype = 'thirdmenu';
        }elseif($parentid->menu_type == 'thirdmenu'){
            $menutype = 'fourthmenu';
        }elseif($parentid->menu_type == 'fourthmenu'){
            $menutype = 'fifthmenu';
        }
    }else{
        $menutype = 'primarymenu';
    }
      $menulist = FrontMenuModel::find($menuid);
      if($parent_id != 'null'){
        $menulist->update([
            'parent_id' => $parent_id,
            'menu_type' => $menutype
        ]);
    }else{
        $menulist->update([
            'parent_id' => null,
            'menu_type' => $menutype
        ]);
    }
    }


    public function delete_primary($id)
    {
        $menulist = FrontMenuModel::find($id);
        $menulist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $menulist->delete();
        return redirect('admin/primary-menu');
    }
}
