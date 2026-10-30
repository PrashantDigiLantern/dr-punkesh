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

use App\Models\Emailsubscription;
use App\Jobs\SendEmailJob as jobs;
use App\Jobs\SendOwnerJob as OwnerJobs;


class AppointmentController extends Controller
{



    /****************************Email subscription***************** */

    public function save_emailsubscription(Request $request)
    {



        $validator = Validator::make($request->input(), [

            'email' => 'required',

        ]);



        $emailsubscription = new Emailsubscription();

        $emailsubscription->email = $request->email;

        $emailsubscription->save();



        $detailsowner = [



            'clientemail' => $request->email,



        ];

        $detailsuser = [

            'name' => $request->input('name'),

            'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

            'primarycountrycode' => '91',

            'primaryphone' => '7667445571',

            'secondaryphone' => '',

            'secondarycountrycode' => '',

            'email' => 'info@advanceskinhairclinic.com',

            'url' => '',

            'page' => 'appointment-user',

            'logo' => 'https://advanceskinhairclinic.com/website/assets/images/logo.png'

        ];





        AppointmentController::sendUserEmail($request->input('email'), $detailsuser);

        AppointmentController::sendOwnerSubscriptionEmail('advanceskinhairandlaserclinic@gmail.com', $detailsowner);



        return redirect('/thank-you');



    }





    /****************************End of email subscription********** */

    public static function sendOwnerSubscriptionEmail($to, $details)
    {



        $subject = 'New Contact Email Subscription';



        //creating message

        $message = "<table style='border:1px;text-align:left;'>



<tr>

<th>Email:</th>

<td>" . $details['clientemail'] . "</td>

</tr>



</table>";

        //end of creating message

        \Illuminate\Support\Facades\Mail::html($message, function ($msg) use ($to, $subject) {
            $msg->to($to)->subject($subject);
        });

    }

    public static function sendUserEmail($to, $details)
    {

        $subject = '';

        if ($details['page'] == 'appointment-user') {

            $subject = 'Thank you for your enquiry';

        }

        if ($details['page'] == 'contact-user') {

            $subject = 'Thank you for your enquiry';

        }

        if ($details['page'] == 'quotes-user') {

            $subject = 'Thank you for your enquiry';

        }

        //creating message

        $message = "<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>

<tbody>

        <tr>

                <td style='padding: 10px 0; text-align: center;'>

                        <img style='height: 100; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' src='https://advanceskinhairclinic.com/website/assets/images/logo.png' alt='alt_text' border='0' />

                </td>

        </tr>

</tbody>

</table>

<!-- Email Header : END -->

<p>&nbsp;</p>

<!-- Email Body : BEGIN -->

<table class='email-container' style='margin: auto;' role='presentation' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>

<tbody>

        <tr>

                <td style='padding: 40px 40px 20px; text-align: center;' bgcolor='#ffffff'>

                        <h1 style='margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: normal;'>Thank you for Booking an Appointment!</h1>

                </td>

        </tr>

        <tr>

                <td style='font-family: sans-serif; font-size: 15px; line-height: 24px; color: #555555; text-align: center;' bgcolor='#ffffff'>

                        <p style='margin: 0;'>One of our team members shall get in touch with you shortly. If you would like to speak with someone immediately, connect with us on: <a href='tel:917667445571'>+91 7667445571</a>

                       

                        <a href='mailto:info@advanceskinhairclinic.com'>info@advanceskinhairclinic.com</a></p>

                </td>

        </tr>

        <tr>

                <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;' bgcolor='#ffffff'>

                        <p style='margin: 0;'>Stay connected with us for updates!</p>

                </td>

        </tr>

        <tr>

                <td style='padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;' bgcolor='#ffffff'>

                        <table style='margin: auto; margin-top: -24px;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>

                                <tbody>

                                        <tr>

                                                <td class='button-td' style='border-radius: 3px; background: #000; text-align: center;'>

                                                <a class='button-a' style='background: #000; border: 15px solid #000; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;' href='https://advanceskinhairclinic.com/' target='_blank' rel='noopener'> &nbsp;&nbsp;&nbsp;&nbsp;<span style='color: #ffffff;'>Go to Website</span>&nbsp;&nbsp;&nbsp;&nbsp; </a></td>

                                        </tr>

                                </tbody>

                        </table>

                </td>

        </tr>

</tbody>

</table>";

        //end of creating message

        \Illuminate\Support\Facades\Mail::html($message, function ($msg) use ($to, $subject) {
            $msg->to($to)->subject($subject);
        });

    }

    public static function sendOwnerEmail($to, $details)
    {

        $subject = '';

        if ($details['page'] == 'appointment-owner') {

            $subject = 'New Appointment Details';

        }

        if ($details['page'] == 'contact-owner') {

            $subject = 'New Contact Details';

        }

        if ($details['page'] == 'request-owner') {

            $subject = 'New Request Call Back';

        }





        $name = isset($details['name']) ? $details['name'] : null;

        $clientphone = isset($details['clientphone']) ? $details['clientphone'] : null;

        $clientemail = isset($details['clientemail']) ? $details['clientemail'] : null;

        $date = isset($details['date']) ? $details['date'] : null;

        $message = isset($details['message']) ? $details['message'] : null;

        //creating message

        $message = "<table style='border:1px;text-align:left;'>

<tr>

    <th>Name:</th>

    <td>" . $name . "</td>

</tr>

<tr>

    <th>Phone:</th>

    <td>" . $clientphone . "</td>

</tr>

<tr>

    <th>Email:</th>

    <td>" . $clientemail . "</td>

</tr>

<tr>

    <th>Date:</th>

    <td>" . $date . "</td>

</tr>

<tr>

    <th>Message:</th>

    <td>" . $message . "</td>

</tr>

</table>";

        //end of creating message

        \Illuminate\Support\Facades\Mail::html($message, function ($msg) use ($to, $subject) {
            $msg->to($to)->subject($subject);
        });

    }

    public function index()
    {

        $select_table = ['app_id', 'name', 'email', 'phone', 'date', 'message', 'created_at'];

        $data = AppointmentModel::select($select_table)->get();

        return view('admin.appointment.list-appointment', ['view' => $data]);

    }



    public function getaquote()
    {

        $select_table = ['quotes_id', 'name', 'email', 'phone', 'message', 'service_name', 'quotes', 'created_at'];

        $data = GetAQuotesModel::select($select_table)->get();

        return view('admin.appointment.list-getaqoute', ['view' => $data]);

    }



    public function add_appointment_mail()
    {

        return view('admin.appointment.add-appointment');

    }





    public function captcha(Request $request)
    {

        return response()->json(['captcha' => captcha_img()]);

    }



    public function appointmentsave(Request $request)
    {



        $validator = Validator::make($request->input(), [

            'name' => 'required',

            'phone' => 'required',

            'email' => 'required',

            'date' => 'required',

            'captcha' => 'required'

        ]);





        if ($validator->fails()) {

            // return http_response_code(400);

            return response()->json(['success' => false, 'data' => 'validerror'], 400);

        }



        $cap = $request->input('captcha');

        $capuid = $request->input('unic');



        $cp = CaptchaModel::where('capchacode', $cap)->where('uid', $capuid);



        if ($cp->count() < 1) {

            return response()->json(['success' => false, 'data' => $cp->count()], 400);

        }



        try {

            //new data will be create in menu table

            AppointmentModel::create($request->input());



            $url = url('/');

            $backendurl = env('BACK_FRONT');



            $detailsowner = [

                'name' => $request->input('name'),

                'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

                'clientphone' => $request->input('phone'),

                'clientemail' => $request->input('email'),

                'date' => $request->input('date'),

                'page' => 'appointment-owner',

                'message' => $request->input('message'),

            ];

            $detailsuser = [

                'name' => $request->input('name'),

                'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

                'primarycountrycode' => '91',

                'primaryphone' => '7667445571',

                'secondaryphone' => '7061400830',

                'secondarycountrycode' => '91',

                'email' => 'info@advanceskinhairclinic.com',

                'url' => $url,

                'page' => 'appointment-user',

                'logo' => 'https://advanceskinhairclinic.com/website/assets/images/logo.png'

            ];

            $detailsuser['Useremail'] = $request->input('email');
            dispatch(new jobs($detailsuser));
            dispatch(new OwnerJobs($detailsowner));
            // dd('done');

            //Mail::to($request->input('email'))->send(new UserMail($detailsuser));

            // AppointmentController::sendUserEmail($request->input('email'),$detailsuser);

            //  Mail::to('')->send(new OwnerMail($detailsowner));

            //   AppointmentController::sendOwnerEmail('advanceskinhairandlaserclinic@gmail.com',$detailsowner);



            return response()->json(['success' => true], 200);

        } catch (\Illuminate\Database\QueryException $exception) {

            // You can check get the details of the error using `errorInfo`:

            $errorInfo = $exception->errorInfo;

            return response()->json(['success' => false, 'data' => $errorInfo], 400);

            // Return the response to the client..

        }



    }





    //****************************Request a callback Form Open********* */





    public function requestAcallback(Request $request)
    {

        $validator = Validator::make($request->input(), [

            'name' => 'required',

            'phone' => 'required',

            'captcha' => 'required'

        ]);



        if ($validator->fails()) {

            // return http_response_code(400);

            return response()->json(['success' => false, 'data' => 'validerror'], 400);

        }

        $cap = $request->input('captcha');



        $capuid = $request->input('unic');

        // dd($cap,$capuid);

        $cp = CaptchaModel::where('capchacode', $cap)->where('uid', $capuid);



        if ($cp->count() < 1) {

            return response()->json(['success' => false, 'data' => $cp->count()], 400);

        }



        try {

            RequestAcallbackModel::create($request->input());

            $url = url('/');

            $backendurl = env('BACK_FRONT');



            $detailsowner = [

                'name' => $request->input('name'),

                'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

                'clientphone' => $request->input('phone'),

                'page' => 'request-owner',

                'message' => $request->input('message'),

            ];



            // Mail::to('sneha.sharma@digilantern.in')->send(new OwnerMail($detailsowner));

            // AppointmentController::sendOwnerEmail('advanceskinhairandlaserclinic@gmail.com',$detailsowner);

            dispatch(new OwnerJobs($detailsowner));


            return response()->json(['success' => true], 200);

        } catch (\Illuminate\Database\QueryException $exception) {

            // You can check get the details of the error using `errorInfo`:

            $errorInfo = $exception->errorInfo;

            return response()->json(['success' => false, 'data' => $errorInfo], 400);

            // Return the response to the client..

        }



    }



    //****************************Request a callback Form Close********* */





    public function contactussave(Request $request)
    {



        $validator = Validator::make($request->input(), [

            'name' => 'required',

            'phone' => 'required',

            'email' => 'required',

            'captcha' => 'required'

        ]);



        if ($validator->fails()) {

            // return http_response_code(400);

            return response()->json(['success' => false, 'data' => 'validerror'], 400);

        }

        $cap = $request->input('captcha');

        $capuid = $request->input('unic');



        $cp = CaptchaModel::where('capchacode', $cap)->where('uid', $capuid);



        if ($cp->count() < 1) {

            return response()->json(['success' => false, 'data' => $cp->count()], 400);

        }



        try {

            //new data will be create in menu table

            ContactUsModel::create($request->input());



            $url = url('/');

            $backendurl = env('BACK_FRONT');



            $detailsowner = [

                'name' => $request->input('name'),

                'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

                'clientphone' => $request->input('phone'),

                'clientemail' => $request->input('email'),

                'date' => $request->input('date'),

                'page' => 'contact-owner',

                'message' => $request->input('message')

            ];

            $detailsuser = [

                'name' => $request->input('name'),

                'orgname' => 'Dr. Punkesh`s Advance Skin Hair and Laser Clinic',

                'primarycountrycode' => '91',

                'primaryphone' => ' 7061400830',

                'secondaryphone' => '7667445571',

                'secondarycountrycode' => '91',

                'email' => 'info@advanceskinhairclinic.com',

                'url' => $url,

                'page' => 'contact-user',

                'logo' => 'https://advanceskinhairclinic.com/website/assets/images/logo.png'

            ];


            $detailsuser['Useremail'] = $request->input('email');
            dispatch(new jobs($detailsuser));
            dispatch(new OwnerJobs($detailsowner));


            // Mail::to($request->input('email'))->send(new UserMail($detailsuser));

            //Mail::to('sneha.sharma@digilantern.in')->send(new OwnerMail($detailsowner));

            //  AppointmentController::sendUserEmail($request->input('email'),$detailsuser);

            //  AppointmentController::sendOwnerEmail('advanceskinhairandlaserclinic@gmail.com',$detailsowner);



            return response()->json(['success' => true], 200);

        } catch (\Illuminate\Database\QueryException $exception) {

            // You can check get the details of the error using `errorInfo`:

            $errorInfo = $exception->errorInfo;

            return response()->json(['success' => false, 'data' => $errorInfo], 400);

            // Return the response to the client..

        }

    }



    //list of request call back



    public function request_callback_list()
    {

        // $select_table = ['contactus_id', 'name', 'email', 'phone', 'message', 'created_at'];

        $data = RequestAcallbackModel::orderBy('request_id', 'desc')->get();

        return view('admin.requestcallback.requestcallback-list', ['view' => $data]);

    }



}

