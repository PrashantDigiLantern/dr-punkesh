<?php

namespace App\Http\Controllers;

use App\Mail\OwnerMail;
use App\Models\RequestAcallbackModel;
use App\Mail\ContactUsMail;
use App\Mail\UserMail;
use App\Models\AppointmentModel;
use App\Models\ContactUsModel;
use App\Models\GetAQuotesModel;
use App\Models\GoogleRecaptchaModel;
use App\Models\CaptchaModel;
use App\Models\MasterOrgModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $select_table = ['app_id', 'name', 'email', 'phone', 'date', 'message','created_at'];
        $data = AppointmentModel::select($select_table)->get();
        return view('admin.appointment.list-appointment', ['view' => $data]);
    }

    public function getaquote()
    {
        $select_table = ['quotes_id', 'name', 'email', 'phone', 'message', 'service_name','quotes', 'created_at'];
        $data = GetAQuotesModel::select($select_table)->get();
        return view('admin.appointment.list-getaqoute', ['view' => $data]);
    }

    public function add_appointment_mail()
    {
        return view('admin.appointment.add-appointment');
    }
	

    public function captcha(Request $request){
        return response()->json(['captcha'=>captcha_img()]);
    }

	public function appointmentsave(Request $request){
        
        $validator = Validator::make($request->input(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date' => 'required',
            'captcha'=> 'required'
        ]);

  
        if ($validator->fails()) {
            // return http_response_code(400);
            return response()->json(['success' => false,'data'=>'validerror'], 400);
        }

        $cap = $request->input('captcha');
        $capuid = $request->input('unic');

        $cp = CaptchaModel::where('capchacode',$cap)->where('uid',$capuid);

        if($cp->count() < 1){
            return response()->json(['success' => false,'data' =>$cp->count()], 400);
        }

        try {
                     //new data will be create in menu table
                            AppointmentModel::create($request->input());
    
                            $url = url('/');
                            $backendurl = env('BACK_FRONT');
    
                            $detailsowner = [
                                'name' =>  $request->input('name'),
                                'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
                                'clientphone' =>  $request->input('phone'),
                                'clientemail' =>  $request->input('email'),
                                'date' => $request->input('date'),
                                'page' => 'appointment-owner',
                                'message' => $request->input('message'),
                            ];
                            $detailsuser = [
                                'name' =>  $request->input('name'),
                                'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
                                'primarycountrycode' => '91',
                                'primaryphone' => ' 7061400830',
                                'secondaryphone' =>  '7667445571',
                                'secondarycountrycode' => '91',
                                'email' =>  'info@advanceskinhairclinic.in',
                                'url' => $url,
                                'page' => 'appointment-user',
                                'logo' => 'http://digilantern.co/punkesh-admin/public/website/assets/images/logo.png'
                            ];
                        
                            Mail::to($request->input('email'))->send(new UserMail($detailsuser));
                            Mail::to('sneha.sharma@digilantern.in')->send(new OwnerMail($detailsowner));
                        
                return response()->json(['success' => true], 200);
            } catch (\Illuminate\Database\QueryException $exception) {
                // You can check get the details of the error using `errorInfo`:
                $errorInfo = $exception->errorInfo;
                return response()->json(['success' => false,'data' =>$errorInfo], 400);
                // Return the response to the client..
            }
        
    }

   
//****************************Request a callback Form Open********* */

  
public function requestAcallback(Request $request){
    $validator  = Validator::make($request->input(),[
        'name' => 'required',
        'phone' => 'required',
        'captcha'=>'required'
    ]);

    if ($validator->fails()) {
        // return http_response_code(400);
        return response()->json(['success' => false,'data'=>'validerror'], 400);
    }
    $cap = $request->input('captcha');
   
    $capuid = $request->input('unic');
    // dd($cap,$capuid);
    $cp = CaptchaModel::where('capchacode',$cap)->where('uid',$capuid);

    if($cp->count() < 1){
        return response()->json(['success' => false,'data' =>$cp->count()], 400);
    }

    try {
        RequestAcallbackModel::create($request->input());
        $url = url('/');
        $backendurl = env('BACK_FRONT');

        $detailsowner = [
            'name' =>  $request->input('name'),
            'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
            'clientphone' =>  $request->input('phone'),
            'page' => 'request-owner',
            'message' => $request->input('message'),
        ];

        Mail::to('sneha.sharma@digilantern.in')->send(new OwnerMail($detailsowner));

            return response()->json(['success' => true], 200);
        } catch (\Illuminate\Database\QueryException $exception) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $exception->errorInfo;
            return response()->json(['success' => false,'data' =>$errorInfo], 400);
            // Return the response to the client..
        }

}

//****************************Request a callback Form Close********* */


    public function contactussave(Request $request){
       
        $validator  = Validator::make($request->input(),[
            'name' => 'required',
            'phone' => 'required',
            'email'=>'required',
            'captcha'=>'required'
        ]);
  
        if ($validator->fails()) {
            // return http_response_code(400);
            return response()->json(['success' => false,'data'=>'validerror'], 400);
        }
        $cap = $request->input('captcha');
        $capuid = $request->input('unic');

        $cp = CaptchaModel::where('capchacode',$cap)->where('uid',$capuid);

        if($cp->count() < 1){
            return response()->json(['success' => false,'data' =>$cp->count()], 400);
        }

            try {
                     //new data will be create in menu table
                     ContactUsModel::create($request->input());
    
                            $url = url('/');
                            $backendurl = env('BACK_FRONT');
    
                            $detailsowner = [
                                'name' =>  $request->input('name'),
                                'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
                                'clientphone' =>  $request->input('phone'),
                                'clientemail' =>  $request->input('email'),
                                'date' => $request->input('date'),
                                'page' => 'contact-owner',
                                'message' => $request->input('message')
                            ];
                            $detailsuser = [
                                'name' =>  $request->input('name'),
                                'orgname' =>  'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',
                                'primarycountrycode' => '91',
                                'primaryphone' => ' 7061400830',
                                'secondaryphone' =>  '7667445571',
                                'secondarycountrycode' => '91',
                                'email' =>  'info@advanceskinhairclinic.in',
                                'url' => $url,
                                'page' => 'contact-user',
                                'logo' => 'http://digilantern.co/punkesh-admin/public/website/assets/images/logo.png'
                            ];
                        
                            Mail::to($request->input('email'))->send(new UserMail($detailsuser));
                            Mail::to('sneha.sharma@digilantern.in')->send(new OwnerMail($detailsowner));
                           
                return response()->json(['success' => true], 200);
            } catch (\Illuminate\Database\QueryException $exception) {
                // You can check get the details of the error using `errorInfo`:
                $errorInfo = $exception->errorInfo;
                return response()->json(['success' => false,'data' =>$errorInfo], 400);
                // Return the response to the client..
            }
    }

    

    public function mailcheck()
    {
        $url = url('/');
        $backendurl = env('BACK_FRONT');
        $details = [
            'name' =>  'Test',
            'orgname' =>  'Test',
            'primarycountrycode' => '91',
            'primaryphone' =>  '9654451152',
            'secondaryphone' =>  '+91',
            'secondarycountrycode' => '9654451155',
            'email' =>  'info@gmail.com',
            'url' => $url,
            'page' => 'appointment-user',
            'logo' => $backendurl.'images/orgnization/',
        ];
        Mail::to('info@drparagtelang.com')->send(new UserMail($details));

        return view('mail.appointment-user-mail', ['details' => $details]);
    }


    //list of request call back

    public function request_callback_list()
    {
       // $select_table = ['contactus_id', 'name', 'email', 'phone', 'message', 'created_at'];
        $data = RequestAcallbackModel::all();
        return view('admin.requestcallback.requestcallback-list', ['view' => $data]);
    }

}
