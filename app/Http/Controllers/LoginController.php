<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\CfgRoleMenuModel;
use App\Models\CfgRoleOperationsModel;
use App\Models\CfgUsrRoleModel;
use App\Models\MasterMenuModel;
use App\Models\MasterOperationsModel;
use App\Models\MasterRoleModel;
use App\Models\MasterUsersModel;
use Faker\Extension\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function index()
    {
        if (session('isLogin') != 'yes') {
          $url = Helpers::adminurlget();
            return view('admin.adminlogin');  
        }
      
        // print_r(session('useradmin'));
        return view('admin.dashboard.dashboard'); 
    }

    public function login(Request $request)
    {
        // die;
        $validator = Validator::make($request->input(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
// die('bhh');
        if ($validator->fails()) {
            return redirect('admin/login');
        }
        // die('hi');
        $data = MasterUsersModel::login($request->input());
// print_r($data->count());die();
        if ($data->count() < 1) {
                //go back
                return redirect('/admin/login');
            }
        //  die('hi');  
        // $subscription = CfgSubscriptionModel::select('sub_org_id')
        // ->where('sub_org_id',$data->first()->org_id)
        // ->where('sub_end_date','>=',date('Y-m-d'));
        // $url = Helpers::fronturl();
        // $subscription = SiteMasterModel::select('sub_org_id')
        // ->join('cfg_subscription','sub_site_id','=','site_master.site_id')
        // ->where('site_url',$url)
        // ->where('sub_end_date','>=',date('Y-m-d'));

        // if($subscription->count() < 1){
        //     return redirect('/no-authorization');
        // }
        // die('hi');

        //Add user info into session
        $this->initializeSession($data->first());
//         print_r(session('isLogin'));
// die();
        $redirect_blade = session('isLogin') == 'yes' ? '/admin/dashboard' : '/admin/login';

        return redirect($redirect_blade);
    }

    private function initializeSession($result)
    {
        // $surlget = str_replace(".", "_",  $result->site_url);
		// $surlget = 'template/'.str_replace(":", "_",  $surlget).'/';
        $backend = 'backend';
        $active = 'active';
        //get user role list
        // $usrrolelist = CfgUsrRoleModel::where('usr_id', $result->usr_id)
        //     ->where('cfg_org_id', $result->usr_org_id);
            //echo $usrrolelist->count();die();
            // if($usrrolelist->count() < 1){
            //     return redirect('/no-authorization');
            // }

            // $usrrole = $usrrolelist->first();
        // If not super admin condition will run and set plan id,role name, role id
        // if ($result->usr_org_id > SUPER_ADMIN) {
            // $role = MasterRoleModel::find($usrrole->role_id);
            // $plan_id = $usrrole->plan_id;
            // $role_name = $role->role_name;
            // $role_id = $role->role_id;
        // }
        if($result->usr_id == '1'){
            $role_id = '1';
            $categoryidmenus = [];
            $categoryidoperations = [];
            $menus  = MasterMenuModel::select('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon')
            ->where('mnu_type', '=', 'backend')
            ->where('mnu_status', '=', 'active')
            ->orderBy('master_menu.mnu_order', 'asc')
            ->groupBy('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon','mnu_order')
            ->get();

            $operations = MasterOperationsModel::select('op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->where('op_type', '=', 'backend')
            ->where('op_status', '=', 'active')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->orderBy('master_operations.op_view_order', 'asc')
            ->groupBy('op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id','op_view_order')
            ->get();

            $categoryidmenus  = MasterMenuModel::selectRaw('GROUP_CONCAT(mnu_id) as mnuid')
            ->where('mnu_type', '=', 'backend')
            ->where('mnu_status', '=', 'active')
            ->get();

            $categoryidoperations = MasterOperationsModel::select(DB::raw('GROUP_CONCAT(op_id) as opid'))
            ->where('op_type', '=', 'backend')
            ->where('op_status', '=', 'active')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->get();

        }else{

           $usrrole = CfgUsrRoleModel::where('usr_id',$result->usr_id);
           if($usrrole->count() < 1){
                return redirect('admin/login');
           }
          $usrroles = $usrrole->first();
            $role_id = $usrroles->role_id;
// $role_id = '1';
        //Taking Data from Role Menu Bag Through Role Id Matching
        $menus  = CfgRoleMenuModel::select(DB::raw('group_concat(cfgmnu_act_id) as cfgmnu_act_id'),'mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon')
            ->where('cfgmnu_role_id', '=', $role_id)
            ->where('mnu_type', '=', 'backend')
            ->where('mnu_status', '=', 'active')
            ->join('master_menu', 'mnu_id', '=', 'cfgmnu_mnu_id')
            ->orderBy('master_menu.mnu_order', 'asc')
            ->groupBy('mnu_name', 'mnu_id', 'mnu_url','mnu_dropdown', 'mnu_icon','mnu_order')
            ->get();


        //Taking Data from Role operation Bag Through Role Id Matching
        $operations = CfgRoleOperationsModel::select(DB::raw('group_concat(oper_act_id) as oper_act_id'),'op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id')
            ->where('oper_role_id', '=',  $role_id)
            ->where('op_type', '=', 'backend')
            ->where('op_status', '=', 'active')
            ->join('master_operations', 'op_id', '=', 'oper_op_id')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->orderBy('master_operations.op_view_order', 'asc')
            ->groupBy('op_name', 'op_id', 'op_link', 'op_icon_link', 'mnu_id', 'cfg_mun_id','op_view_order')
            ->get();

               //find to data service category menu id
            //Taking Data from Role Menu Bag Through Role Id Matching
            $categoryidmenus  = CfgRoleMenuModel::select(DB::raw('GROUP_CONCAT(DISTINCT(mnu_id)) as mnuid'))
            ->join('master_menu', 'mnu_id', '=', 'cfgmnu_mnu_id')
            ->where('cfgmnu_role_id', $role_id)
            ->where('master_menu.mnu_type', $backend)
            ->where('mnu_status', $active)
            ->get();


        //Taking Data from Role operation Bag Through Role Id Matching
        $categoryidoperations = CfgRoleOperationsModel::select(DB::raw('GROUP_CONCAT(DISTINCT(op_id)) as opid'))
            ->join('master_operations', 'op_id', '=', 'oper_op_id')
            ->join('cfg_mnu_operations', 'cfg_op_id', '=', 'master_operations.op_id')
            ->join('master_menu', 'mnu_id', '=', 'cfg_mnu_operations.cfg_mun_id')
            ->where('oper_role_id',  $role_id)
            ->where('master_operations.op_type', $backend)
            ->where('op_status', $active)
            ->get();
        }
            // echo '<pre>';print_r($categoryidoperations); echo '</pre>';
            // die();
        Session::put('isLogin', 'yes');
$role_name = 'Super User';
        //set session userinfo
        Session::put('userinfo', [
            'usr_id' => $result->usr_id,
            'usr_email' => $result->usr_email,
            'user_name' => $result->usr_first_name . ' ' . $result->usr_last_name,
            'user_org_id' => $result->usr_org_id,
            'user_org_name' => $result->org_name,
            'org_person_name' => $result->org_person_name,
            'org_logo' => $result->org_logo,
            'user_role_name' => $role_name,
            'user_role_id' => $role_id,
            'client_usr_id' => $result->usr_id,
            'user_home_page' => '',
            'user_category_menu_permissions' => $categoryidmenus,
            'user_category_operation_permissions' => $categoryidoperations,
            'user_menu_permissions' => $menus,
            'user_operation_permissions' => $operations
        ]);

        //set session userinfo
        Session::put('useradmin', [
            'org_id' => $result->org_id,
            'super_org_id' => $result->usr_id,
            'site_id' => $result->site_id,
            'usr_id' => $result->usr_id,
            'site_url' => ''
        ]);
    }
}
