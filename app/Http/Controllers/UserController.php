<?php

namespace App\Http\Controllers;

use App\Models\CfgRoleMenuModel;
use App\Models\CfgRoleOperationsModel;
use App\Models\CfgUsrRoleModel;
use App\Models\MasterRoleModel;
use App\Models\MasterUsersModel;
use App\Models\SiteMasterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

if (!defined('SUPER_ADMIN')) {
    define("SUPER_ADMIN", 1);
}

class UserController extends Controller
{
    public function index($id,$usr_id,$super_org_id)
    {
        $select_fields = ['master_org.org_id','org_name','org_email','org_plan_id','site_id','site_url'];
        $siteview = SiteMasterModel::select($select_fields)
        ->join('master_org','master_org.org_id','=','site_master.org_id')
        ->join('cfg_subscription','sub_site_id','=','site_master.site_id')
        ->whereRaw('md5(site_id) = "' . $id . '"')
        // ->where('site_id',$id)
        ->where('sub_end_date','>=',date('Y-m-d'));
        // echo $siteview->count();die();
       //subscription is expired 
        if($siteview->count() < 1){
            return redirect('/no-authorization');
        }
        Session::put('isLogin', 'yes');
        $this->initializeSession($siteview->first(),$usr_id,$super_org_id);

    //     $data['orgdata'] = $siteview->first();
    //    return view('home.landing')->with($data);

        return redirect('/admin/dashboard');
    }

    private function initializeSession($result,$usr_id,$super_org_id)
    {
        // echo $usr_id;
        // echo $result->org_id;
        // die();
        $surlget = str_replace(".", "_",  $result->site_url);
		$surlget = 'template/'.str_replace(":", "_",  $surlget).'/';
        $backend = 'backend';
        $active = 'active';
        // $role = MasterRoleModel::where('role_org_id',$result->org_id)->where('role_name','Super User')->first();
        //get user role list
        $usrrole = CfgUsrRoleModel::where('cfg_org_id', $result->org_id)->where('usr_id', $usr_id)->first();
            $role = MasterRoleModel::where('role_org_id',$result->org_id)->where('role_id',$usrrole->role_id)->first();
            // print_r($usrrole);die();
            $plan_id = $usrrole->plan_id;
            $role_name = $role->role_name;
            $role_id = $role->role_id;
            $usrlist = MasterUsersModel::join('master_org','master_org.org_id','=','master_users.usr_org_id')->where('usr_id',$usrrole->usr_id)->first();

        // If not super admin condition will run and set plan id,role name, role id
        if ($result->org_id > SUPER_ADMIN && $usr_id > SUPER_ADMIN) {

        //get user role list
         $usrrole = CfgUsrRoleModel::where('usr_id', $usrrole->usr_id)
            ->where('cfg_org_id', $result->org_id)
            ->first();
            $role = MasterRoleModel::find($usrrole->role_id);
            $plan_id = $usrrole->plan_id;
            $role_name = $role->role_name;
            $role_id = $role->role_id;
        }

        //Taking Data from Role Menu Bag Through Role Id Matching
        $menus  = CfgRoleMenuModel::select(DB::raw('group_concat(cfgmnu_act_id) as cfgmnu_act_id'),DB::raw('group_concat(mnu_id) as mnuid'),'mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon')
            ->join('master_menu', 'mnu_id', '=', 'cfgmnu_mnu_id')
            ->where('cfgmnu_role_id', '=', $role_id)
            ->where('cfgmnu_site_id', '=', $result->site_id)
            ->where('master_menu.mnu_type', $backend)
            ->where('mnu_status', $active)
            ->orderBy('master_menu.mnu_order', 'asc')
            ->groupBy('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon')
            ->get();


        //Taking Data from Role operation Bag Through Role Id Matching
        $operations = CfgRoleOperationsModel::select(DB::raw('group_concat(oper_act_id) as oper_act_id'),DB::raw('group_concat(oper_org_id) as opid'),'op_name','op_type', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->join('master_operations', 'op_id', '=', 'oper_op_id')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->where('oper_role_id', '=',  $role_id)
            ->where('oper_site_id', '=', $result->site_id)
            ->where('master_operations.op_type', $backend)
            ->where('op_status', $active)
            ->orderBy('master_operations.op_view_order', 'asc')
            ->groupBy('op_name','op_type', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->get();


            //find to data service category menu id
            //Taking Data from Role Menu Bag Through Role Id Matching
            $categoryidmenus  = CfgRoleMenuModel::select(DB::raw('GROUP_CONCAT(DISTINCT(mnu_id)) as mnuid'))
            ->join('master_menu', 'mnu_id', '=', 'cfgmnu_mnu_id')
            ->where('cfgmnu_role_id', $role_id)
            ->where('cfgmnu_site_id', $result->site_id)
            ->where('master_menu.mnu_type', $backend)
            ->where('mnu_status', $active)
            ->get();


        //Taking Data from Role operation Bag Through Role Id Matching
        $categoryidoperations = CfgRoleOperationsModel::select(DB::raw('GROUP_CONCAT(DISTINCT(op_id)) as opid'))
            ->join('master_operations', 'op_id', '=', 'oper_op_id')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->where('oper_role_id',  $role_id)
            ->where('oper_site_id', $result->site_id)
            ->where('master_operations.op_type', $backend)
            ->where('op_status', $active)
            ->get();
            
        // $usrlistsec = MasterUsersModel::find($usr_id);

        //set session userinfo
        Session::put('userinfo', [
            'usr_id' => $usrlist->usr_id,
            'usr_email' => $usrlist->usr_email,
            'user_name' => $usrlist->usr_first_name . ' ' . $usrlist->usr_last_name,
            'user_org_id' => $usrlist->usr_org_id,
            'user_org_name' => $usrlist->org_name,
            'org_person_name' => $usrlist->org_person_name,
            'org_logo' => $usrlist->org_logo,
            'user_plan_id' => $plan_id,
            'user_role_name' => $role_name,
            'user_role_id' => $role_id,
            'user_home_page' => '',
            'user_category_menu_permissions' => $categoryidmenus,
            'user_category_operation_permissions' => $categoryidoperations,
            'user_menu_permissions' => $menus,
            'user_operation_permissions' => $operations
        ]);

        //set session userinfo
        Session::put('useradmin', [
            'org_id' => $result->org_id,
            'super_org_id' => $super_org_id,
            'site_id' => $result->site_id,
            'usr_id' => $usr_id,
            'site_url' => $surlget
        ]);
    }

    public function Dashboard()
    {
        return view('admin.dashboard.dashboard');
    }
}
