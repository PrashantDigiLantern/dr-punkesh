<?php

namespace App\Http\Controllers;

use App\Models\ContactDetailModel;
use App\Models\ContactUsModel;
use App\Models\RequestModel;
use App\Models\CountryModel;
use App\Models\SocialDetailModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    public function index()
    {
        $select_table = ['contactus_id', 'name', 'email', 'phone', 'message', 'created_at'];
        $data = ContactUsModel::select($select_table)->get();
        return view('admin.contact_us.list-contact_us', ['view' => $data]);
    }


    public function request_a_callback()
    {
        $select_table = ['request_id', 'name', 'phone', 'created_at'];
        $data = RequestModel::select($select_table)->get();
        return view('admin.request_a_callback.list-request', ['view' => $data]);
    }


    public function AddressList()
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

        $select_table = ['contact_id', 'name', 'address','address1','address2','pincode', 'email_id', 'phone', 'timings','status','contact_status','order_by'];
        $data['view'] = ContactDetailModel::select($select_table)->get();
        return view('admin.contact-detail.list-contact-detail')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $bloglist = ContactDetailModel::find($id);
        $bloglist->update($request->input());
    }

    public function orderby(Request $request)
    {
        $id = $request->input('id');
        $presslist = ContactDetailModel::find($id);
        $presslist->update($request->input());
    }

    public function AddAddress()
    {
        $data['view'] = ContactDetailModel::find(session('primeid'));
        $data['country'] = CountryModel::get();
        return view('admin.contact-detail.add-contact-detail')->with($data);
    }

    // public function contact_detail()
    // {
    //     $select_table = ['contact_id', 'name', 'address', 'email_id', 'phone', 'timings'];
    //     $data['view'] = ContactDetailModel::select($select_table)->first();
    //     $data['count'] = ContactDetailModel::select($select_table)->count();
    //     return view('admin.contact-detail.add-contact-detail')->with($data);
    // }

    public function addphone()
    {
        $data['country'] = CountryModel::get();
        return view('admin.contact-detail.add-phone')->with($data);
    }

    public function addemail()
    {
        return view('admin.contact-detail.add-email');
    }

    public function addday()
    {
        return view('admin.contact-detail.add-day');
    }

    public function create_address(Request $request)
    {
      
        $emailstatus = $request->input('emailstatus');
       
        foreach ($emailstatus as $key => $daylist) {
            if ($daylist == 'primary') {
                $value[$daylist][] = 
                [
                        'email' => $request->input('email')[$key],
                        'email_order_by' => $request->input('email_order_by')[$key],
                        'emailstatus' => $request->input('emailstatus')[$key]
                ];
            }

            if ($daylist == 'secondary') {
                $value[$daylist][] = 
                [
                        'email' => $request->input('email')[$key],
                        'email_order_by' => $request->input('email_order_by')[$key],
                        'emailstatus' => $request->input('emailstatus')[$key]
                ];
            }
        }
        $emailjsondata = json_encode($value);
        // print_r($emailjsondata);
        // die();
        foreach ($request->input('phonestatus') as $key => $phonelist) {
            if ($phonelist == 'primary') {
                $valuephone[$phonelist][] = 
                [
                        'phonecode' => $request->input('phonecode')[$key],
                        'phone' => $request->input('phone')[$key],
                        'phone_order_by' => $request->input('phone_order_by')[$key],
                        'phonestatus' => $phonelist
                ];
            }

            if ($phonelist == 'secondary') {
                $valuephone[$phonelist][] = 
                [
                        'phonecode' => $request->input('phonecode')[$key],
                        'phone' => $request->input('phone')[$key],
                        'phone_order_by' => $request->input('phone_order_by')[$key],
                        'phonestatus' => $phonelist
                ];
            }
        }

        foreach ($request->input('day') as $key => $daylist) {
                $valuedays['days'][] = 
                [
                        'day' => $request->input('day')[$key],
                        'start_time' => $request->input('start_time')[$key],
                        'end_time' => $request->input('end_time')[$key],
                        'status' => $request->input('status')[$key],
                        'timing_order_by' => $request->input('timing_order_by')[$key]
                ];
        }

        $emailjsondata = json_encode($value);
        // print_r($emailjsondata);
        $phonejsondata = json_encode($valuephone);
        $daysjsondata = json_encode($valuedays);
        // print_r($daysjsondata);
        // die('hi');
        
        $contact_id = $request->input('contact_id');
        if($contact_id < 1){
            // die('hiiii');
            $doctor = ContactDetailModel::create(
                [
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'address1' => $request->input('address1'),
                    'address2' => $request->input('address2'),
                    'pincode' => $request->input('pincode'),
                    'show_type' => $request->input('show_type'),
                    'email_id' => $emailjsondata,
                    'phone' => $phonejsondata,
                    'timings' => $daysjsondata,
                ]
            );
            // die('hii');
            Session::put('primeid', $doctor->contact_id);
        } else {
            // die('hi');
            $contactus = ContactDetailModel::find($contact_id);
            $contactus->update(
                [
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'address1' => $request->input('address1'),
                    'address2' => $request->input('address2'),
                    'pincode' => $request->input('pincode'),
                    'show_type' => $request->input('show_type'),
                    'contact_key' => $contactus->contact_key,
                    'email_id' => $emailjsondata,
                    'phone' => $phonejsondata,
                    'timings' => $daysjsondata,
                ]
            );
        }

        return redirect('admin/address-list');
    }



    public function EditAddress($id)
    {
        Session::put('primeid', $id);
        $data['view'] = ContactDetailModel::find($id);
        $data['country'] = CountryModel::get();
        return view('admin.contact-detail.add-contact-detail')->with($data);
    }

    public function DeleteAddress(){
        return redirect('admin/address-list');
    }

    public function socail_media()
    {
        $select_table = ['social_id', 'name', 'icon', 'link'];
        $data['view'] = SocialDetailModel::select($select_table)->get();
        return view('admin/social-media/list-social-media')->with($data);
    }
    public function add()
    {

        return view('admin.social-media.add-social-media');
    }

    public function create_socail(Request $request)
    {
        SocialDetailModel::create($request->input());
        return redirect('admin/social-media');
    }

    public function edit_socail($id)
    {
        $data = SocialDetailModel::find($id);
        return view('admin.social-media.edit-social-media', ['edit' => $data]);
    }

    public function update_socail(Request $request, $id)
    {
        $service = SocialDetailModel::find($id);
        $service->update($request->input());

        return redirect('admin/social-media');
    }
    public function delete_socail($id)
    {
        $servicelist = SocialDetailModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();
        return redirect('admin/social-media');
    }
}
