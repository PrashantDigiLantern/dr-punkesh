<?php

namespace App\Http\Controllers;

use App\Models\CfgMnuOperationsModel;
use App\Models\CfgPlanConfigModel;
use App\Models\CfgRoleMenuModel;
use App\Models\CfgRoleOperationsModel;
use App\Models\CfgUsrRoleModel;
use App\Models\MasterActionsModel;
use App\Models\MasterMenuModel;
use App\Models\MasterOperationsModel;
use App\Models\MasterRoleModel;
use App\Models\MasterUsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MasterRoleController extends Controller
{
    public function RoleView()
    {
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;

        //get role data
        $select_table = ['role_id', 'role_name', 'role_desc'];
        $data['view'] = MasterRoleModel::select($select_table)->where('role_org_id', session('userinfo')['user_org_id'])->get();

        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Role View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        return view('admin.role.view-role')->with($data);
    }

    public function RoleForm()
    {
        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Role View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        return view('admin.role.add-role')->with($data);
    }

    public function UserRoleSave(Request $request)
    {
        //this is role required field
        $validator = Validator::make($request->input(), [
            'role_name' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-role');
        }
        //new data will be create in action table
        MasterRoleModel::create($request->input());
        return redirect('admin/role');
    }

    public function UserRoleEdit($id)
    {
        //get one role data through role_id
        $select_table = ['role_id', 'role_name', 'role_desc'];
        $data = MasterRoleModel::select($select_table)->where('role_id', $id)->first();
        return view('admin.role.edit-role', ['edit' => $data]);
    }

    public function UserRoleUpdate(Request $request, $id)
    {
        //this is update role required field
        $validator = Validator::make($request->input(), [
            'role_name' => 'required',
        ]);
        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/edit-role/' . $id);
        }
        //data will be update in role table
        $data =  MasterRoleModel::find($id);
        $data->update($request->input());
        return redirect('admin/role');
    }

    public function UserRoleDelete($id)
    {
        //To delete through role Id from the role table
        $data =  MasterRoleModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();
        return redirect('admin/role');
    }

    public function RoleConfigView()
    {
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        
        //get user role data
        $select_table = ['usr_role_id', 'role_name', 'usr_first_name', 'usr_last_name'];
        $data['view'] = CfgUsrRoleModel::select($select_table)
            ->join('master_users', 'master_users.usr_id', '=', 'cfg_usr_role.usr_id')
            ->join('master_role', 'master_role.role_id', '=', 'cfg_usr_role.role_id')
            ->where('cfg_org_id', session('userinfo')['user_org_id'])->get();


        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Role View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        return view('admin.permission.view-permission')->with($data);
    }
    public function RoleConfigForm()
    {
        //get role data
        $data['role'] = MasterRoleModel::select('role_id', 'role_name')->get();
        //get user data
        $data['user'] = MasterUsersModel::select('usr_id', 'usr_first_name', 'usr_last_name')
            ->whereNotIn('usr_id',[session('userinfo')['client_usr_id']])->get();
        //get action data
        $data['action'] = MasterActionsModel::select('act_id', 'act_name')->get();

        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Role View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        return view('admin.permission.add-permission')->with($data);
    }

    public function RoleConfigmenulist(Request $request)
    {
        $act_id =  explode(',',$request->input('act_id'));
        $role_id = $request->input('role_id');
        // echo session('useradmin')['super_org_id'];
        // print_r($act_id);die();
        //get menu data
        if(session('useradmin')['super_org_id'] == '1'){
            $data['menu']  = MasterMenuModel::select('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon','mnu_type')
            ->where('mnu_type', '=', 'backend')
            ->where('mnu_status', '=', 'active')
            ->orderBy('master_menu.mnu_order', 'asc')
            ->groupBy('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon','mnu_order','mnu_type')
            ->get();

            $data['operations'] = MasterOperationsModel::select('op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id','mnu_type')
            ->where('op_type', '=', 'backend')
            ->where('op_status', '=', 'active')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->orderBy('master_operations.op_view_order', 'asc')
            ->groupBy('op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id','op_view_order','mnu_type')
            ->get();
        }else{
        
        $data['menu']  = CfgRoleMenuModel::select(DB::raw('group_concat(cfgmnu_act_id) as cfgmnu_act_id'),'mnu_name', 'mnu_id', 'mnu_url','mnu_type','mnu_dropdown', 'mnu_icon')
            ->where('cfgmnu_role_id', '=', session('userinfo')['user_role_id'])
            ->where('mnu_type', '=', 'backend')
            ->where('mnu_status', '=', 'active')
            ->join('master_menu', 'mnu_id', '=', 'cfgmnu_mnu_id')
            ->orderBy('master_menu.mnu_order', 'asc')
            ->groupBy('mnu_name', 'mnu_id', 'mnu_url','mnu_type','mnu_dropdown', 'mnu_icon')
            ->get();
        
        $data['operations'] = CfgRoleOperationsModel::select(DB::raw('group_concat(oper_act_id) as oper_act_id'),'op_name', 'op_id', 'op_link', 'op_type','op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->where('oper_role_id', '=',  session('userinfo')['user_role_id'])
            ->where('op_type', '=', 'backend')
            ->where('op_status', '=', 'active')
            ->join('master_operations', 'op_id', '=', 'oper_op_id')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->orderBy('master_operations.op_view_order', 'asc')
            ->groupBy('op_name', 'op_id', 'op_link', 'op_type','op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->get();
        }
        //Taking role menu Id from role menu
        $data['cfgplan'] = CfgRoleMenuModel::select(
            DB::raw('group_concat(cfgmnu_mnu_id) as cfgmnu_mnu_id')
        )
            ->where('cfgmnu_org_id', session('userinfo')['user_org_id'])
            ->whereIn('cfgmnu_act_id', $act_id)
            ->where('cfgmnu_role_id', $role_id)
            ->get();

        //Taking role operation Id from role operation
        $data['cfgplanorg'] = CfgRoleOperationsModel::select(
            DB::raw('group_concat(oper_op_id) as oper_op_id')
        )
            ->where('oper_org_id', session('userinfo')['user_org_id'])
            ->whereIn('oper_act_id', $act_id)
            ->where('oper_role_id', $role_id)
            ->get();
        //    echo '<pre>'; print_r($data['menu']);echo '</pre>';
            // die();
        return view('admin.permission.menu-permission')->with($data);
    }

    public function RoleConfigSave(Request $request)
    {
        //this is role config required field
        $validator = Validator::make($request->input(), [
            'usr_id' => 'required',
            'role_id' => 'required',
            'act_id' => 'required',
        ]);
    //    print_r($request->input());die();
        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-permission');
        }
        $org_id = session('userinfo')['user_org_id'];

        //get user role data
        $cfguserrole = CfgUsrRoleModel::where('usr_id', $request->input('usr_id'))
            ->where('role_id', $request->input('role_id'))
            ->where('cfg_org_id', $org_id);

        //Once the user role id is saved in the user role table, it will not be saved again.
        if ($cfguserrole->count() == 0) {

            //Data will be saved in user role table
            CfgUsrRoleModel::create([
                'usr_id' => $request->input('usr_id'),
                'role_id' => $request->input('role_id'),
                'plan_id' => '1',
                'created_by' => $request->input('created_by'),
                'cfg_org_id' => $org_id,
            ]);
        }

        $menumain = $request->input('menu');
        if(isset($menumain)){
        foreach ($request->input('act_id') as $key => $actlist) {

        //menu Id will save multiple time data through role menu table
        foreach ($request->input('menu') as $key => $menulist) {
            
            //get role menu data
            $menuid = CfgRoleMenuModel::where('cfgmnu_act_id', $actlist)
                ->where('cfgmnu_role_id', $request->input('role_id'))
                ->where('cfgmnu_mnu_id', $menulist);
                // echo $request->input('created_by');
                // print_r($menuid->count());
                // die;
            //Once the role menu id is saved in the role menu table, it will not be saved again.
            if ($menuid->count() == 0) {

                //Data will be saved in role menu table
                CfgRoleMenuModel::create([
                    'cfgmnu_act_id' => $actlist,
                    'cfgmnu_mnu_id' => $request->input('menu')[$key],
                    'cfgmnu_org_id' => '1',
                    'cfgmnu_role_id' => $request->input('role_id'),
                    'created_by' => $request->input('created_by'),
                ]);
            }

            //role menu Id not selected will be deleted from the role operation table
            $menudeleteid = CfgRoleMenuModel::where('cfgmnu_act_id', $actlist)
                ->where('cfgmnu_role_id', $request->input('role_id'))
                ->whereNotIn('cfgmnu_mnu_id', $request->input('menu'));
            $menudeleteid->update(['deleted_by' => $request->input('created_by')]);
            $menudeleteid->delete();
        }
        }
    }
    // die;
    $oper = $request->input('operation');
        if(isset($oper)){
        // die();
        foreach ($request->input('act_id') as $key => $opactlist) {
        //operation Id will save multiple time data through role operation table
        foreach ($request->input('operation') as $key => $operationlist) {
            //get role operation data
            $menuopid = CfgRoleOperationsModel::where('oper_act_id', $opactlist)
                ->where('oper_role_id', $request->input('role_id'))
                ->where('oper_op_id', $operationlist);

            //Once the role operation id is saved in the role-operation table, it will not be saved again.
            if ($menuopid->count() == 0) {
                //Data will be saved in role operation table
                CfgRoleOperationsModel::create([
                    'oper_act_id' => $opactlist,
                    'oper_org_id' => '1',
                    'oper_role_id' => $request->input('role_id'),
                    'created_by' => $request->input('created_by'),
                    'oper_op_id' => $operationlist,
                ]);
            }
            //role operation Id not selected will be deleted from the plan operation table
            $menuopdeleteid = CfgRoleOperationsModel::where('oper_act_id', $opactlist)
                ->where('oper_role_id', $request->input('role_id'))
                ->whereNotIn('oper_op_id', $request->input('operation'));
            $menuopdeleteid->update(['deleted_by' => $request->input('created_by')]);
            $menuopdeleteid->delete();
        }
        }
    }

        return redirect('admin/permission');
    }

    public function RoleConfigDelete($id)
    {
        //To delete through user role Id from the user role table
        $data =  CfgUsrRoleModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();

        return redirect('admin/permission');
    }
}
