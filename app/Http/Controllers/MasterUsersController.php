<?php

namespace App\Http\Controllers;

use App\Mail\ForgotMail;
use App\Models\MasterUsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MasterUsersController extends Controller
{
    public function matchEmail(Request $request){
        $data = MasterUsersModel::Matchemail($request->input());
        $list = $data->first();
        
       if($data->count() > 0){
        $details = [   
            'usr_id' =>  $list->usr_id,
            'usr_first_name' =>  $list->usr_first_name,
            'usr_last_name' =>  $list->usr_last_name,
            'email' => $request->input('email'),
        ];
        Mail::to($request->input('email'))->send(new ForgotMail($details));
        return redirect('admin/password-send');
       }
        return redirect("password/reset");
     
    }                  
    
    public function PasswordSend(){
        return view("auth.passwords.password-send");
    }

    public function CreatePassword(){
        return view("auth.passwords.create-password");
    }

    public function PasswordUpdate(){
        return view("auth.passwords.go-to-login");
    }

    public function NoAuthorization(){
        return view("pages.401");
    }

    public function passwordsave(Request $request){

        //this is role config required field
        $validator = Validator::make($request->input(), [
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        //Will get redirected if validator is not matched
        if ($validator->fails()) {
            return redirect('admin/create-password/'. $request->input('usr_id'));
        }
        $md5_valued_string_get_from_url = $request->input('usr_id');
     // echo $usr_id = md5('usr_id'); echo '<br>';
        $data = MasterUsersModel::whereRaw('md5(usr_id) = "' . $md5_valued_string_get_from_url . '"')->first();;
        // print_r($data);die();
        $data->update([
            'usr_password' => md5($request->input('password'))
        ]);
        return redirect("admin/password-update");
       
             
    } 
}
