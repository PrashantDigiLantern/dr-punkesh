<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Mail\CreateUser;
use App\Models\MasterUsersModel;
use App\Models\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    // // Register
    // public function showRegistrationForm()
    // {
    //     $pageConfigs = ['bodyCustomClass' => 'register-bg', 'isCustomizer' => false];

    //     return view('/auth/register', [
    //         'pageConfigs' => $pageConfigs
    //     ]);
    // }

    public function RegistrationView()
    {
        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Register View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        $uri = request()->segments()[1];
        $uripermission = [];
        // echo '<pre>';print_r(session('userinfo')['user_operation_permissions']);echo '</pre>';
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;
        // print_r($data['permission']);die;
        $select_table = ['usr_id', 'usr_first_name', 'usr_last_name','usr_email','usr_mobile'];
        $data['view'] = MasterUsersModel::select($select_table)->where('usr_org_id',session('userinfo')['user_org_id'])->get();

        return view('admin.register.view-register')->with($data);
    }

    public function RegistrationForm()
    {
        $data['breadcrumbs'] = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Register View"],
        ];
        $data['pageConfigs'] = ['pageHeader' => true];
        return view('admin.register.add-register')->with($data);
    }

    public function UserRegisterSave(Request $request)
    {
        //this is register required field
        $validator = Validator::make($request->input(), [
            'usr_email' => 'required',
            'usr_first_name' => 'required',
            'usr_last_name' => 'required',
            'usr_mobile' => 'required',
            'usr_password' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/add-register');
        }
        // print_r($request->input());
        // die('hi');
        //new data will be create in user table
        MasterUsersModel::create([
            'usr_first_name' => $request->input('usr_first_name'),
            'usr_last_name' => $request->input('usr_last_name'),
            'usr_email' => $request->input('usr_email'),
            'usr_mobile' => $request->input('usr_mobile'),
            'usr_password' => md5($request->input('usr_password')),
            'usr_org_id' => session('userinfo')['user_org_id'],
            'created_by' => $request->input('created_by'),
            'usr_mode' => '1',
            'usr_reporting_to' => session('userinfo')['usr_id']
        ]);

        // $details = [   
        //     'usr_first_name' =>  $request->input('usr_first_name'),
        //     'usr_last_name' =>  $request->input('usr_last_name'),
        //     'usr_email' => $request->input('usr_email'),
        //     'usr_password' => $request->input('usr_password'),
        // ];

        // Mail::to($request->input('usr_email'))->send(new CreateUser($details));
        
        return redirect('admin/user');
    }

    public function UserRegisterEdit($id)
    {
        //get one menu data through mnu_id
        $select_table = ['usr_id', 'usr_email', 'usr_first_name', 'usr_last_name', 'usr_password','usr_mobile'];
        $data = MasterUsersModel::select($select_table)->where('usr_id', $id)->first();
        return view('admin.register.edit-register', ['edit' => $data]);
    }

    public function UserRegisterUpdate(Request $request, $id)
    {
        //this is update register required field
        $validator = Validator::make($request->input(), [
            'usr_email' => 'required',
            'usr_first_name' => 'required',
            'usr_last_name' => 'required',
            'usr_mobile' => 'required',
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('/admin/edit-register/' . $id);
        }
        //data will be update in user table
        $data =  MasterUsersModel::find($id);

        if($request->input('oldusr_email')!=$request->input('usr_email')){
            $data->update([
                'usr_first_name' => $request->input('usr_first_name'),
                'usr_last_name' => $request->input('usr_last_name'),
                'usr_email' => $request->input('usr_email'),
                'usr_mobile' => $request->input('usr_mobile'),
                'usr_password' => md5($request->input('usr_password')),
            ]);

            $details = [   
                'usr_first_name' =>  $request->input('usr_first_name'),
                'usr_last_name' =>  $request->input('usr_last_name'),
                'usr_email' => $request->input('usr_email'),
                'usr_password' => $request->input('usr_password'),
            ];

            //Mail::to($request->input('usr_email'))->send(new CreateUser($details));
        }

        $data->update([
            'usr_first_name' => $request->input('usr_first_name'),
            'usr_last_name' => $request->input('usr_last_name'),
            'usr_mobile' => $request->input('usr_mobile'),
            'usr_password' => md5($request->input('usr_password')),
        ]);


        return redirect('admin/user');
    }

    public function UserRegisterDelete($id)
    {
        //To delete through register Id from the register table
        $data =  MasterUsersModel::find($id);
        $data->update(['deleted_by' => session('userinfo')['usr_id']]);
        $data->delete();
        return redirect('admin/user');
    }
}
