<?php

namespace App\Http\Controllers;

use App\Models\CfgMnuOperationsModel;
use App\Models\MasterMenuModel;
use App\Models\MasterOperationsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CfgMnuOperationsController extends Controller
{
    public function MenuOperationView()
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

        //get menu data
        $data['menu'] = MasterMenuModel::select('mnu_id', 'mnu_name')->get();

        //get menu-operation data
        $select_table = ['mnu_oper_id', 'mnu_name', 'op_name', 'cfg_mun_id'];
        $data['view'] = CfgMnuOperationsModel::select($select_table)
            ->join('master_menu', 'mnu_id', '=', 'cfg_mun_id')
            ->join('master_operations', 'op_id', '=', 'cfg_op_id')
            ->get();

        return view('admin.menu-operation.menu-operation-list')->with($data);
    }

    public function MenuOperationForm()
    {
        //get menu data
        $data['menu'] = MasterMenuModel::select('mnu_id', 'mnu_name')->get();
        //get operation data
        $data['operation'] = MasterOperationsModel::select('op_id', 'op_name')->get();
        return view('admin.menu-operation.add-menu-operation')->with($data);
    }

    public function MenuOperationSave(Request $request)
    {
        //this is menu-operation required field
        $validator = Validator::make($request->input(), [
            'cfg_mun_id' => 'required',
            'cfg_op_id' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-menu-operation');
        }

        //operation Id will save multiple time data through menu-operation table
        foreach ($request->input('cfg_op_id') as $cfg_op_id) {

            //get menu-operation data
            $cfguserrole = CfgMnuOperationsModel::where('cfg_mun_id', $request->input('cfg_mun_id'))
                ->where('cfg_op_id', $cfg_op_id);

            //Once the menu-operation id is saved in the menu-operation table, it will not be saved again.
            if ($cfguserrole->count() == 0) {

                //Data will be saved in menu-operation table
                CfgMnuOperationsModel::create([
                    'cfg_mun_id' => $request->input('cfg_mun_id'),
                    'cfg_op_id' => $cfg_op_id,
                    'created_by' => $request->input('cfg_mun_id')
                ]);
            }
        }
        return redirect('/admin/menu-operation');
        // iska blade dikhao
    }

    public function MenuOperationEditForm($id)
    {
        //get menu list
        $data['menu'] = MasterMenuModel::select('mnu_id', 'mnu_name')->get();
        //get operations list
        $data['operation'] = MasterOperationsModel::select('op_id', 'op_name')->get();

        //get one menu-operation data through mnu_oper_id
        $select_table = ['mnu_oper_id', 'cfg_mun_id', 'cfg_op_id'];
        $data['edit'] = CfgMnuOperationsModel::select($select_table)->where('mnu_oper_id', $id)->first();

        return view('admin.menu-operation.edit-menu-operation')->with($data);
    }

    public function PlanConfigUpdate(Request $request, $id)
    {
        //this is assign menu-operation update required field
        $validator = Validator::make($request->input(), [
            'cfg_mun_id' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/edit-menu-operation/' . $id);
        }
        //data will be update in menu-operation table
        $data =  CfgMnuOperationsModel::find($id);
        $data->update($request->input());
        return redirect('admin/menu-operation');
    }

    public function PlanConfigDelete($id)
    {
        //To delete through menu-operation Id from the menu operation table
        $data =  CfgMnuOperationsModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();
        return redirect('admin/menu-operation');
    }
}
