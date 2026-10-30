<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterMenuController extends Controller
{
    public function MenuView()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach (session('userinfo')['user_operation_permissions'] as $oplist) {
            if ($oplist->op_link == $uri) {
                $uripermission = $oplist->oper_act_id;
                $uripermission = explode(',', $uripermission);
            }
        }
        $data['permission'] = $uripermission;
        // print_r($data['permission']);die;
        //get menu data
        $select_table = ['mnu_id', 'mnu_name', 'mnu_url', 'mnu_icon','mnu_dropdown', 'mnu_order','mnu_status'];
        $data['view'] = MasterMenuModel::select($select_table)->where('mnu_type','backend')->get();
        return view('admin.menu.menulist')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $servicelist = MasterMenuModel::find($id);
        $servicelist->update($request->input());
    }

    public function orderby_menu(Request $request)
    {
        $ser_id = $request->input('id');
        $servicelist = MasterMenuModel::find($ser_id);
        $servicelist->update($request->input());
    }

    public function MenuForm()
    {
        return view('admin.menu.add-menu');
    }

    public function menusave(Request $request)
    {
        //this is menu required field
        $validator = Validator::make($request->input(), [
            'mnu_name' => 'required',
            'mnu_url' => 'required',
            'mnu_icon' => 'required',
            'mnu_type' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-menu');
        }
        //new data will be create in menu table
        MasterMenuModel::create($request->input());
        return redirect('/admin/menu');
    }

    public function MenuEditForm($id)
    {
        //get one menu data through mnu_id
      //  $select_table = ['mnu_id', 'mnu_name', 'mnu_type', 'mnu_url','mnu_dropdown', 'mnu_icon', 'mnu_order'];
        $data = MasterMenuModel::find($id);
        return view('admin.menu.edit-menu', ['edit' => $data]);
    }

    public function menuupdate(Request $request, $id)
    {
        //this is update menu required field
        $validator = Validator::make($request->input(), [
            'mnu_name' => 'required',
            'mnu_url' => 'required',
            'mnu_icon' => 'required',
            'mnu_type' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/edit-menu/' . $id);
        }

        //data will be update in menu table
        $data =  MasterMenuModel::find($id);
        $data->update($request->input());
        return redirect('/admin/menu');
    }

    public function menudelete($id)
    {
        //To delete through menu Id from the menu table
        $data =  MasterMenuModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();
        return redirect('/admin/menu');
    }
}
