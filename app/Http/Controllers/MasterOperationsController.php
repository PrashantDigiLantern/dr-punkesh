<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuModel;
use App\Models\MasterOperationsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterOperationsController extends Controller
{
    public function OperationView()
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

        //get operation data
        $select_table = ['op_id', 'op_name', 'op_title', 'op_link', 'op_view_order','op_status'];
        $data['view'] = MasterOperationsModel::select($select_table)->where('op_type','backend')->get();
        return view('admin.operations.operationlist')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $servicelist = MasterOperationsModel::find($id);
        $servicelist->update($request->input());
    }

    public function orderby_operation(Request $request)
    {
        $ser_id = $request->input('id');
        $servicelist = MasterOperationsModel::find($ser_id);
        $servicelist->update($request->input());
    }

    public function OperationForm()
    {
        //get operation data
        $select_table = ['mnu_id', 'mnu_name'];
        $data = MasterMenuModel::select($select_table)->get();
        return view('admin.operations.add-operation', ['view' => $data]);
    }

    public function operationsave(Request $request)
    {
        //this is operation required field
        $validator = Validator::make($request->input(), [
            'op_name' => 'required',
            'op_link' => 'required',
            'op_icon_link' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-operation');
        }

        //new data will be create in menu table
        MasterOperationsModel::create($request->input());
        return redirect('/admin/operation');
    }

    public function OperationEditForm($id)
    {
        //get one operation data through op_id
       // $select_table = ['op_id', 'op_name', 'op_type', 'op_title', 'op_link', 'op_icon_link'];
        $data['edit'] = MasterOperationsModel::find($id);
        //get menu list
        $data['menu'] = MasterMenuModel::select('mnu_id', 'mnu_name')->get();

        return view('admin.operations.edit-operation')->with($data);
    }

    public function operationupdate(Request $request, $id)
    {
        //this is update operation required field
        $validator = Validator::make($request->input(), [
            'op_name' => 'required',
            'op_link' => 'required',
            'op_icon_link' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/edit-operation/' . $id);
        }
        //data will be update in operation table
        $data =  MasterOperationsModel::find($id);
        $data->update($request->input());
        return redirect('/admin/operation');
    }

    public function operationdelete($id)
    {
        //To delete through operation Id from the operation table
        $data =  MasterOperationsModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();
        return redirect('/admin/operation');
    }
}
