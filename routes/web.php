<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppLaunchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
// use App\Http\Controllers\BridalDermatologyController;
// use App\Http\Controllers\BridalDermatologyFaqController;
use App\Http\Controllers\CaseStudiesController;
use App\Http\Controllers\CfgMnuOperationsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorCertificateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExclusiveFaqController;
use App\Http\Controllers\ExclusiveTreatmentsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FooterController;
// use App\Http\Controllers\FromController;
use App\Http\Controllers\FrontMenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\FrontPrimaryMenuController;
// use App\Http\Controllers\FrontSecondMenuController;
// use App\Http\Controllers\FrontThirdMenuController;
use App\Http\Controllers\GoogleRecaptchaController;
use App\Http\Controllers\MasterMenuController;
use App\Http\Controllers\MasterOperationsController;
use App\Http\Controllers\MasterRoleController;
use App\Http\Controllers\MemberShipController;
use App\Http\Controllers\PressMediaController;
use App\Http\Controllers\RedirectUrlController;
use App\Http\Controllers\ResultCategoryController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServicecategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFaqController;
use App\Http\Controllers\ServiceResultController;
use App\Http\Controllers\ServiceVideoController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TestimonialVideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\AppLaunchTwoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [LoginController::class, 'index']);
// Route::get('/admin/', [UserController::class, 'index']);

// clear cache start
Route::get('/clear-cache', function () {
    try {
        Artisan::call('optimize:clear');

        return response()->json([
            'success' => true,
            'message' => 'Laravel application cache cleared successfully.',
            'output' => Artisan::output(),
        ]);
    } catch (\Throwable $e) {
        \Log::error('Cache clear failed: '.$e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Unable to clear cache. Check Laravel logs.',
        ], 500);
    }
});


Route::get('/diagnose-storage-temp', function () {
    return response()->json([
        'base_path' => base_path(),
        'storage_path' => storage_path(),
        'session_path' => config('session.files'),
        'session_driver' => config('session.driver'),
        'session_directory_exists' => is_dir(
            storage_path('framework/sessions')
        ),
        'session_directory_writable' => is_writable(
            storage_path('framework/sessions')
        ),
    ]);
})->withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
]);

Route::get('test-email', function(){
 $email = new Test();
 if(Mail::to('ajay.pandey@digilantern.in')->send($email)){
    return "success";
 }
});

Route::get('/admin/login', [LoginController::class, 'index']);
Route::post('/admin/user-login', [LoginController::class, 'login']);
Route::get('verkopen/{id}/{usr_id}/{super_org_id}', [UserController::class, 'index']);
Route::get('/admin/logout', function () {
    session()->forget('userinfo');
    session()->forget('isLogin');
    session()->forget('user_type');
    session()->forget('useradmin');
    return redirect('/admin/login');
});


Route::get('email-test', function(){

    $details['email'] = 'sneha@yopmail.com';
   
    dispatch(new App\Jobs\SendEmailJobTest($details));
  
    dd('done');
});


    Route::get('/no-authorization', [AppLaunchController::class, 'NoAuthorization']);
    Route::get('/',  [AppLaunchController::class, 'appLaunch']);
    // Route::group(['middleware' => ['checksubscription']], function(){
    
    
    // });
    Route::get('/mailcheck',  [AppointmentController::class, 'mailcheck']);
    Route::get('/mailcheckclient',  [AppointmentController::class, 'mailcheckclient']);
    Route::get('/contactmailclient',  [AppointmentController::class, 'contactmailclient']);
    
Route::group(['middleware' => ['login']], function(){
    Route::get('/admin/dashboard', [UserController::class, 'Dashboard']);
       //-----------Register---------------// 
    Route::get('/admin/user', [RegisterController::class, 'RegistrationView']);
Route::get('/admin/add-register', [RegisterController::class, 'RegistrationForm']);
Route::post('/admin/user-register-save', [RegisterController::class, 'UserRegisterSave']);
Route::get('/admin/edit-register/{id}', [RegisterController::class, 'UserRegisterEdit']);
Route::post('/admin/user-register-update/{id}', [RegisterController::class, 'UserRegisterUpdate']);
Route::get('/admin/delete-user-register/{id}', [RegisterController::class, 'UserRegisterDelete']);

//-----------Role---------------//
Route::get('/admin/role', [MasterRoleController::class, 'RoleView']);
Route::get('/admin/add-role', [MasterRoleController::class, 'RoleForm']);
Route::post('/admin/user-role-save', [MasterRoleController::class, 'UserRoleSave']);
Route::get('/admin/edit-role/{id}', [MasterRoleController::class, 'UserRoleEdit']);
Route::post('/admin/user-role-update/{id}', [MasterRoleController::class, 'UserRoleUpdate']);
Route::get('/admin/delete-user-role/{id}', [MasterRoleController::class, 'UserRoleDelete']);
Route::get('/admin/permission', [MasterRoleController::class, 'RoleConfigView']);
Route::get('/admin/add-permission', [MasterRoleController::class, 'RoleConfigForm']);
Route::post('/admin/permission-menulists', [MasterRoleController::class, 'RoleConfigmenulist']);
Route::post('/admin/user-role-permission-save', [MasterRoleController::class, 'RoleConfigSave']);
Route::get('/admin/delete-permission/{id}', [MasterRoleController::class, 'RoleConfigDelete']);


/************************Service category section*********************/    
Route::get('/admin/service-category', [ServicecategoryController::class, 'index']);
Route::post('/admin/getactive-service-category', [ServicecategoryController::class, 'getactive']);
Route::post('/admin/orderby-service-category', [ServicecategoryController::class, 'orderby_service_category']);
Route::get('/admin/add-service-category', [ServicecategoryController::class, 'add']);
Route::post('/admin/create_service_category', [ServicecategoryController::class, 'create_service']);
Route::get('/admin/service-category-preview', [ServicecategoryController::class, 'service_category_preview']);
Route::get('/admin/service_category_publish/{id}', [ServicecategoryController::class, 'service_category_publish']);
Route::get('/admin/edit_service_category/{id}', [ServicecategoryController::class, 'edit_service']);
Route::post('/admin/update_service_category/{id}', [ServicecategoryController::class, 'update_service']);
Route::get('/admin/delete_service_category/{id}', [ServicecategoryController::class, 'delete_service']);

/**************************second category section*********************/
Route::get('/admin/second-category', [ServicecategoryController::class, 'SecondIndex']);
Route::get('/admin/add-second-service-category', [ServicecategoryController::class, 'SecondAdd']);
Route::get('/admin/second-category-preview', [ServicecategoryController::class, 'service_category_preview']);

/**************************third category section*********************/
Route::get('/admin/third-category', [ServicecategoryController::class, 'ThirdIndex']);
Route::get('/admin/add-third-service-category', [ServicecategoryController::class, 'ThirdAdd']);
Route::post('/admin/secondcategory', [ServicecategoryController::class, 'SecondCategory']);
Route::get('/admin/third-category-preview', [ServicecategoryController::class, 'ThirdCategoryPreview']);
Route::get('/admin/edit-third-category/{id}', [ServicecategoryController::class, 'ThirdEditService']);

/**************************fourth category section*********************/
Route::get('/admin/fourth-category', [ServicecategoryController::class, 'FourthIndex']);
Route::get('/admin/add-fourth-service-category', [ServicecategoryController::class, 'FourthAdd']);
Route::post('/admin/thirdcategory', [ServicecategoryController::class, 'ThirdCategory']);
Route::get('/admin/fourth-category-preview', [ServicecategoryController::class, 'FourthCategoryPreview']);
Route::get('/admin/edit-fourth-category/{id}', [ServicecategoryController::class, 'FourthEditService']);

/***************************fifth category section*********************/
Route::get('/admin/fifth-category', [ServicecategoryController::class, 'FifthIndex']);
Route::get('/admin/add-fifth-service-category', [ServicecategoryController::class, 'FifthAdd']);
Route::post('/admin/fourthcategory', [ServicecategoryController::class, 'FourthCategory']);
Route::post('/admin/fifthcategory', [ServicecategoryController::class, 'FifthCategory']);
Route::post('/admin/servicesection', [ServicecategoryController::class, 'ServiceSection']);
Route::get('/admin/fifth-category-preview', [ServicecategoryController::class, 'FifthCategoryPreview']);
Route::get('/admin/edit-fifth-category/{id}', [ServicecategoryController::class, 'FifthEditService']);

/****************************service section***************************/
Route::get('/admin/service', [ServiceController::class, 'index']);
Route::post('/admin/getactive-service', [ServiceController::class, 'getactive']);
Route::post('/admin/orderby-service', [ServiceController::class, 'orderby_service']);
Route::get('/admin/add-service', [ServiceController::class, 'add']);
Route::get('/admin/service-preview', [ServiceController::class, 'service_preview']);
Route::get('/admin/service_publish/{id}', [ServiceController::class, 'service_publish']);
Route::post('/admin/service-list', [ServiceController::class, 'service_list']);
Route::post('/admin/threepragraph-list', [ServiceController::class, 'ThreePragraphList']);
Route::post('/admin/service-change-list', [ServiceController::class, 'service_change_list']);
Route::post('/admin/service-section-delete', [ServiceController::class, 'service_section_delete']);
Route::post('/admin/service-section-order', [ServiceController::class, 'service_section_order']);
Route::post('/admin/create_service', [ServiceController::class, 'create_service']);
Route::get('/admin/edit_service/{id}', [ServiceController::class, 'edit_service']);
Route::post('/admin/tabpragraph-list', [ServiceController::class, 'TabPragraphList']);
Route::post('/admin/edupragraph-list', [ServiceController::class, 'EducationPragraphList']);
Route::post('/admin/exppragraph-list', [ServiceController::class, 'ExperiencePragraphList']);
Route::post('/admin/update_service/{id}', [ServiceController::class, 'update_service']);
Route::post('/admin/service-removesec', [ServiceController::class, 'ServiceRemovesec']);
Route::get('/admin/delete_service/{id}', [ServiceController::class, 'delete_service']);

/**************************service faq section***************************/
Route::get('/admin/service-faq', [ServiceFaqController::class, 'index']);
Route::post('/admin/getactive-service-faq', [ServiceFaqController::class, 'getactive']);
Route::post('/admin/orderby-service-faq', [ServiceFaqController::class, 'orderby_service']);
Route::get('/admin/add-service-faq', [ServiceFaqController::class, 'add']);
Route::get('/admin/service-faq-preview', [ServiceFaqController::class, 'service_faq_preview']);
Route::get('/admin/service_faq_publish/{id}', [ServiceFaqController::class, 'service_faq_publish']);
Route::post('/admin/create_service_faq', [ServiceFaqController::class, 'create_service']);
Route::get('/admin/edit_service_faq/{id}', [ServiceFaqController::class, 'edit_service']);
Route::post('/admin/update_service_faq/{id}', [ServiceFaqController::class, 'update_service']);
Route::get('/admin/delete_service_faq/{id}', [ServiceFaqController::class, 'delete_service']);

/****************************service exclusive section*************************/
// Route::get('/admin/exclusive', [ExclusiveTreatmentsController::class, 'index']);
// Route::post('/admin/getactive-exclusive', [ExclusiveTreatmentsController::class, 'getactive']);
// Route::post('/admin/orderby-exclusive', [ExclusiveTreatmentsController::class, 'orderby']);
// Route::get('/admin/add-exclusive', [ExclusiveTreatmentsController::class, 'add']);
// Route::post('/admin/exclusive-list', [ExclusiveTreatmentsController::class, 'exclusive_list']);
// Route::post('/admin/create_exclusive', [ExclusiveTreatmentsController::class, 'create_exclusive']);
// Route::get('/admin/edit_exclusive/{id}', [ExclusiveTreatmentsController::class, 'edit_exclusive']);
// Route::post('/admin/update_exclusive/{id}', [ExclusiveTreatmentsController::class, 'update_exclusive']);
// Route::get('/admin/delete_exclusive/{id}', [ExclusiveTreatmentsController::class, 'delete_exclusive']);

/****************************service exclusive faq section**************************/
// Route::get('/admin/exclusive-faq', [ExclusiveFaqController::class, 'index']);
// Route::post('/admin/getactive-exclusive-faq', [ExclusiveFaqController::class, 'getactive']);
// Route::post('/admin/orderby-exclusive-faq', [ExclusiveFaqController::class, 'orderby_service']);
// Route::get('/admin/add-exclusive-faq', [ExclusiveFaqController::class, 'add']);
// Route::post('/admin/create_exclusive_faq', [ExclusiveFaqController::class, 'create_service']);
// Route::get('/admin/edit_exclusive_faq/{id}', [ExclusiveFaqController::class, 'edit_service']);
// Route::post('/admin/update_exclusive_faq/{id}', [ExclusiveFaqController::class, 'update_service']);
// Route::get('/admin/delete_exclusive_faq/{id}', [ExclusiveFaqController::class, 'delete_service']);

/****************************service bridal section******************************/
// Route::get('/admin/bridal', [BridalDermatologyController::class, 'index']);
// Route::post('/admin/getactive-bridal', [BridalDermatologyController::class, 'getactive']);
// Route::post('/admin/orderby-bridal', [BridalDermatologyController::class, 'orderby']);
// Route::get('/admin/add-bridal', [BridalDermatologyController::class, 'add']);
// Route::post('/admin/bridal-list', [BridalDermatologyController::class, 'bridal_list']);
// Route::post('/admin/create_bridal', [BridalDermatologyController::class, 'create_bridal']);
// Route::get('/admin/edit_bridal/{id}', [BridalDermatologyController::class, 'edit_bridal']);
// Route::post('/admin/update_bridal/{id}', [BridalDermatologyController::class, 'update_bridal']);
// Route::get('/admin/delete_bridal/{id}', [BridalDermatologyController::class, 'delete_bridal']);

/****************************service bridal faq section***************************/
// Route::get('/admin/bridal-faq', [BridalDermatologyFaqController::class, 'index']);
// Route::post('/admin/getactive-bridal-faq', [BridalDermatologyFaqController::class, 'getactive']);
// Route::post('/admin/orderby-bridal-faq', [BridalDermatologyFaqController::class, 'orderby_service']);
// Route::get('/admin/add-bridal-faq', [BridalDermatologyFaqController::class, 'add']);
// Route::post('/admin/create_bridal_faq', [BridalDermatologyFaqController::class, 'create_service']);
// Route::get('/admin/edit_bridal_faq/{id}', [BridalDermatologyFaqController::class, 'edit_service']);
// Route::post('/admin/update_bridal_faq/{id}', [BridalDermatologyFaqController::class, 'update_service']);
// Route::get('/admin/delete_bridal_faq/{id}', [BridalDermatologyFaqController::class, 'delete_service']);

/***************************first result category Section**************************/
Route::get('/admin/service-result-category', [ResultCategoryController::class, 'indexcategory']);
Route::post('/admin/getactive-result-category', [ResultCategoryController::class, 'getactive_result_category']);
Route::post('/admin/orderby-result-category', [ResultCategoryController::class, 'orderby_result_category']);
Route::get('/admin/add-service-result-category', [ResultCategoryController::class, 'add_result_category']);
Route::get('/admin/result-category-preview', [ResultCategoryController::class, 'result_category_preview']);
Route::get('/admin/result_category_publish/{id}', [ResultCategoryController::class, 'result_category_publish']);
Route::post('/admin/create_service_result_category', [ResultCategoryController::class, 'create_service_category']);
Route::get('/admin/edit_service_result_category/{id}', [ResultCategoryController::class, 'edit_service_category']);
Route::post('/admin/update_service_result_category/{id}', [ResultCategoryController::class, 'update_service_category']);
Route::get('/admin/delete_service_result_category/{id}', [ResultCategoryController::class, 'delete_service_category']);

/******************************second result category Section**************************/
Route::get('/admin/second-result-category', [ResultCategoryController::class, 'SecondResultIndex']);
Route::get('/admin/add-second-result-category', [ResultCategoryController::class, 'SecondResultAdd']);
Route::get('/admin/second-result-category-preview', [ResultCategoryController::class, 'result_category_preview']);

/******************************third result category Section***************************/
Route::get('/admin/third-result-category', [ResultCategoryController::class, 'ThirdResultIndex']);
Route::get('/admin/add-third-result-category', [ResultCategoryController::class, 'ThirdResultAdd']);
Route::post('/admin/secondresultcategory', [ResultCategoryController::class, 'SecondResultCategory']);
Route::get('/admin/third-result-category-preview', [ResultCategoryController::class, 'ThirdResultCategoryPreview']);
Route::get('/admin/edit-third-result-category/{id}', [ResultCategoryController::class, 'ThirdResultEditService']);

/******************************fourth result category Section****************************/
Route::get('/admin/fourth-result-category', [ResultCategoryController::class, 'FourthResultIndex']);
Route::get('/admin/add-fourth-result-category', [ResultCategoryController::class, 'FourthResultAdd']);
Route::post('/admin/thirdresultcategory', [ResultCategoryController::class, 'ThirdResultCategory']);
Route::get('/admin/fourth-result-category-preview', [ResultCategoryController::class, 'FourthResultCategoryPreview']);
Route::get('/admin/edit-fourth-result-category/{id}', [ResultCategoryController::class, 'FourthResultEditService']);

/***************************fifth result category Section******************************/
Route::get('/admin/fifth-result-category', [ResultCategoryController::class, 'FifthResultIndex']);
Route::get('/admin/add-fifth-result-category', [ResultCategoryController::class, 'FifthResultAdd']);
Route::post('/admin/fourthresultcategory', [ResultCategoryController::class, 'FourthResultCategory']);
Route::post('/admin/fifthresultcategory', [ResultCategoryController::class, 'FifthResultCategory']);
Route::post('/admin/serviceresultsection', [ResultCategoryController::class, 'ServiceResultSection']);
Route::get('/admin/fifth-result-category-preview', [ResultCategoryController::class, 'FifthResultCategoryPreview']);
Route::get('/admin/edit-fifth-result-category/{id}', [ResultCategoryController::class, 'FifthResultEditService']);

/***************************result service Section*******************************/
Route::get('/admin/result-service', [ServiceResultController::class, 'indexresultservice']);
Route::post('/admin/getactive-result-service', [ServiceResultController::class, 'getactive_result_service']);
Route::post('/admin/orderby-result-service', [ServiceResultController::class, 'orderby_result_service']);
Route::get('/admin/add-result-service', [ServiceResultController::class, 'add_result_service']);
Route::get('/admin/result-service-preview', [ServiceResultController::class, 'result_service_preview']);
Route::get('/admin/result_service_publish/{id}', [ServiceResultController::class, 'result_service_publish']);
Route::post('/admin/result-servicelist', [ServiceResultController::class, 'result_servicelist']);
Route::post('/admin/create_result_service', [ServiceResultController::class, 'create_result_service']);
Route::get('/admin/edit_result_service/{id}', [ServiceResultController::class, 'edit_result_service']);
Route::post('/admin/update_result_service/{id}', [ServiceResultController::class, 'update_result_service']);
Route::get('/admin/delete_result_service/{id}', [ServiceResultController::class, 'delete_result_service']);

/****************************Result Inner Section******************************/
Route::get('/admin/service-result-inner', [ServiceResultController::class, 'index']);
Route::post('/admin/getactive-result-inner', [ServiceResultController::class, 'getactive']);
Route::post('/admin/orderby-result-inner', [ServiceResultController::class, 'orderby']);
Route::get('/admin/add-service-result-inner', [ServiceResultController::class, 'add']);
Route::get('/admin/result-inner-preview', [ServiceResultController::class, 'result_inner_preview']);
Route::get('/admin/result_inner_publish/{id}', [ServiceResultController::class, 'result_inner_publish']);
Route::post('/admin/service-change', [ServiceResultController::class, 'service_change']);
Route::post('/admin/create_service_result_inner', [ServiceResultController::class, 'create_service']);
Route::get('/admin/edit_service_result_inner/{id}', [ServiceResultController::class, 'edit_service']);
Route::post('/admin/update_service_result_inner/{id}', [ServiceResultController::class, 'update_service']);
Route::get('/admin/delete_service_result_inner/{id}', [ServiceResultController::class, 'delete_service']);

/*****************************First Video category Section*****************************/
Route::get('/admin/service-video-category', [VideoCategoryController::class, 'indexvideocategory']);
Route::post('/admin/getactive-video-category', [VideoCategoryController::class, 'getactive_video_category']);
Route::post('/admin/orderby-video-category', [VideoCategoryController::class, 'orderby_video_category']);
Route::get('/admin/add-service-video-category', [VideoCategoryController::class, 'add_video_category']);
Route::get('/admin/video-category-preview', [VideoCategoryController::class, 'video_category_preview']);
Route::get('/admin/video_category_publish/{id}', [VideoCategoryController::class, 'video_category_publish']);
Route::post('/admin/create_service_video_category', [VideoCategoryController::class, 'create_video_category']);
Route::get('/admin/edit_service_video_category/{id}', [VideoCategoryController::class, 'edit_video_category']);
Route::post('/admin/update_service_video_category/{id}', [VideoCategoryController::class, 'update_video_category']);
Route::get('/admin/delete_service_video_category/{id}', [VideoCategoryController::class, 'delete_video_category']);

/**************************second video category Section*********************/
Route::get('/admin/second-video-category', [VideoCategoryController::class, 'SecondVideoIndex']);
Route::get('/admin/add-second-video-category', [VideoCategoryController::class, 'SecondVideoAdd']);
Route::get('/admin/second-video-category-preview', [VideoCategoryController::class, 'video_category_preview']);

/************************third video category Section*********************/
Route::get('/admin/third-video-category', [VideoCategoryController::class, 'ThirdVideoIndex']);
Route::get('/admin/add-third-video-category', [VideoCategoryController::class, 'ThirdVideoAdd']);
Route::post('/admin/secondvideocategory', [VideoCategoryController::class, 'SecondVideoCategory']);
Route::get('/admin/third-video-category-preview', [VideoCategoryController::class, 'ThirdVideoCategoryPreview']);
Route::get('/admin/edit-third-video-category/{id}', [VideoCategoryController::class, 'ThirdVideoEditService']);

/********************************fourth video category Section*********************/
Route::get('/admin/fourth-video-category', [VideoCategoryController::class, 'FourthVideoIndex']);
Route::get('/admin/add-fourth-video-category', [VideoCategoryController::class, 'FourthVideoAdd']);
Route::post('/admin/thirdvideocategory', [VideoCategoryController::class, 'ThirdVideoCategory']);
Route::get('/admin/fourth-video-category-preview', [VideoCategoryController::class, 'FourthVideoCategoryPreview']);
Route::get('/admin/edit-fourth-video-category/{id}', [VideoCategoryController::class, 'FourthVideoEditService']);

/******************************fifth video category Section*********************/
Route::get('/admin/fifth-video-category', [VideoCategoryController::class, 'FifthVideoIndex']);
Route::get('/admin/add-fifth-video-category', [VideoCategoryController::class, 'FifthVideoAdd']);
Route::post('/admin/fourthvideocategory', [VideoCategoryController::class, 'FourthVideoCategory']);
Route::post('/admin/fifthvideocategory', [VideoCategoryController::class, 'FifthVideoCategory']);
Route::post('/admin/servicevideosection', [VideoCategoryController::class, 'ServiceVideoSection']);
Route::get('/admin/fifth-video-category-preview', [VideoCategoryController::class, 'FifthVideoCategoryPreview']);
Route::get('/admin/edit-fifth-video-category/{id}', [VideoCategoryController::class, 'FifthVideoEditService']);

/********************************Video service Section*********************/
Route::get('/admin/video-service', [ServiceVideoController::class, 'indexvideoservice']);
Route::post('/admin/getactive-video-service', [ServiceVideoController::class, 'getactive_video_service']);
Route::post('/admin/orderby-video-service', [ServiceVideoController::class, 'orderby_video_service']);
Route::get('/admin/add-video-service', [ServiceVideoController::class, 'add_video_service']);
Route::get('/admin/video-service-preview', [ServiceVideoController::class, 'video_service_preview']);
Route::get('/admin/video_service_publish/{id}', [ServiceVideoController::class, 'video_service_publish']);
Route::post('/admin/video-servicelist', [ServiceVideoController::class, 'video_servicelist']);
Route::post('/admin/create_video_service', [ServiceVideoController::class, 'create_video_service']);
Route::get('/admin/edit_video_service/{id}', [ServiceVideoController::class, 'edit_video_service']);
Route::post('/admin/update_video_service/{id}', [ServiceVideoController::class, 'update_video_service']);
Route::get('/admin/delete_video_service/{id}', [ServiceVideoController::class, 'delete_video_service']);

/*********************Video Inner Section*********************/
Route::get('/admin/service-video-inner', [ServiceVideoController::class, 'index']);
Route::post('/admin/getactive-video-inner', [ServiceVideoController::class, 'getactive']);
Route::post('/admin/orderby-video-inner', [ServiceVideoController::class, 'orderby']);
Route::get('/admin/add-service-video-inner', [ServiceVideoController::class, 'add']);
Route::get('/admin/video-inner-preview', [ServiceVideoController::class, 'video_inner_preview']);
Route::get('/admin/video_inner_publish/{id}', [ServiceVideoController::class, 'video_inner_publish']);
Route::post('/admin/video-change', [ServiceVideoController::class, 'video_change']);
Route::post('/admin/create_service_video_inner', [ServiceVideoController::class, 'create_service']);
Route::get('/admin/edit_service_video_inner/{id}', [ServiceVideoController::class, 'edit_service']);
Route::get('/admin/show-video-link-inner', [ServiceVideoController::class, 'show_video_link']);
Route::post('/admin/update_service_video_inner/{id}', [ServiceVideoController::class, 'update_service']);
Route::get('/admin/delete_service_video_inner/{id}', [ServiceVideoController::class, 'delete_service']);

/*********************Testimonial Section*********************/
Route::get('/admin/testimonials', [TestimonialController::class, 'index']);
Route::post('/admin/getactive-testimonials', [TestimonialController::class, 'getactive']);
Route::get('/admin/add-testimonials', [TestimonialController::class, 'add']);
Route::get('/admin/testimonials-preview', [TestimonialController::class, 'testimonials_preview']);
Route::post('/admin/create_testimonials', [TestimonialController::class, 'create_testimonials']);
Route::get('/admin/create_test_publish/{id}', [TestimonialController::class, 'create_test_publish']);
Route::get('/admin/edit_testimonials/{id}', [TestimonialController::class, 'edit_testimonials']);
Route::post('/admin/update_testimonials/{id}', [TestimonialController::class, 'update_testimonials']);
Route::get('/admin/delete_testimonials/{id}', [TestimonialController::class, 'delete_testimonials']);

/*********************Testimonial Video Section*********************/
Route::get('/admin/video-testimonials', [TestimonialVideoController::class, 'index']);
Route::post('/admin/getactive-video-testimonials', [TestimonialVideoController::class, 'getactive']);
Route::get('/admin/add-video-testimonials', [TestimonialVideoController::class, 'add']);
// Route::get('/admin/video-testimonials-preview', [TestimonialVideoController::class, 'VideoTestimonialsPreview']);
Route::post('/admin/create_video_testimonials', [TestimonialVideoController::class, 'CreateVideoTestimonials']);
// Route::get('/admin/create_video_test_publish/{id}', [TestimonialVideoController::class, 'CreateVideoTestPublish']);
Route::get('/admin/edit_video_testimonials/{id}', [TestimonialVideoController::class, 'EditVideoTestimonials']);
// Route::post('/admin/update_video_testimonials/{id}', [TestimonialVideoController::class, 'UpdateVideoTestimonials']);
Route::get('/admin/delete_video_testimonials/{id}', [TestimonialVideoController::class, 'DeleteVideoTestimonials']);

/*********************Blog Section*********************/
Route::get('/admin/blogs', [BlogController::class, 'index']);
Route::post('/admin/getactive-blog', [BlogController::class, 'getactive']);
Route::get('/admin/add-blogs', [BlogController::class, 'add']);
Route::post('/admin/create_blogs', [BlogController::class, 'create_blogs']);
Route::get('/admin/blogs-preview', [BlogController::class, 'blogs_preview']);
Route::get('/admin/create_blog_publish/{id}', [BlogController::class, 'create_blog_publish']);
Route::get('/admin/edit_blogs/{id}', [BlogController::class, 'edit_blogs']);
Route::post('/admin/update_blogs/{id}', [BlogController::class, 'update_blogs']);
Route::get('/admin/delete_blogs/{id}', [BlogController::class, 'delete_blogs']);

/*********************Appointment Section***********************/
Route::get('/admin/appointment', [AppointmentController::class, 'index']);
Route::get('/admin/getaquotes', [AppointmentController::class, 'getaquote']);
// Route::post('/admin/create-appointment-mail', [FromController::class, 'create_appointment_mail']);
Route::get('/admin/add-appointment-mail', [AppointmentController::class, 'add_appointment_mail']);

/*********************Gallery Section***********************/
Route::get('/admin/gallery', [GalleryController::class, 'index']);
Route::get('/admin/add-gallery', [GalleryController::class, 'add']);
Route::get('/admin/gallery-preview', [GalleryController::class, 'gallery_preview']);
Route::get('/admin/gallery_publish/{id}', [GalleryController::class, 'gallery_publish']);
Route::get('/admin/edit_gallery/{id}', [GalleryController::class, 'edit_gallery']);
Route::post('/admin/create_gallery', [GalleryController::class, 'create_gallery']);
Route::post('/admin/update_gallery/{id}', [GalleryController::class, 'update_gallery']);
Route::get('/admin/delete_gallery/{id}', [GalleryController::class, 'delete_gallery']);

/*********************Faq Section***********************/
Route::get('/admin/faq', [FaqController::class, 'index']);
Route::get('/admin/add-faq', [FaqController::class, 'add']);
Route::post('/admin/create_faq', [FaqController::class, 'create_faq']);
Route::get('/admin/edit_faq/{id}', [FaqController::class, 'edit_faq']);
Route::post('/admin/update_faq/{id}', [FaqController::class, 'update_faq']);
Route::get('/admin/delete_faq/{id}', [FaqController::class, 'delete_faq']);

/*********************Technology Section***********************/
Route::get('/admin/technology', [TechnologyController::class, 'index']);
Route::post('/admin/getactive-technology', [TechnologyController::class, 'getactive']);
Route::post('/admin/orderby-technology', [TechnologyController::class, 'orderby']);
Route::get('/admin/add-technology', [TechnologyController::class, 'add']);
Route::post('/admin/create_technology', [TechnologyController::class, 'create_technology']);
Route::get('/admin/technology-preview', [TechnologyController::class, 'technology_preview']);
Route::get('/admin/create_tech_publish/{id}', [TechnologyController::class, 'create_tech_publish']);
Route::get('/admin/edit_technology/{id}', [TechnologyController::class, 'edit_technology']);
Route::post('/admin/update_technology/{id}', [TechnologyController::class, 'update_technology']);
Route::get('/admin/delete_technology/{id}', [TechnologyController::class, 'delete_technology']);

/*********************Technology Section***********************/
Route::get('/admin/aboutlist', [AboutController::class, 'index']);
Route::get('/admin/about', [AboutController::class, 'aboutadd']);
Route::get('/admin/about/{id}', [AboutController::class, 'aboutedit']);
Route::get('/admin/about-preview', [AboutController::class, 'about_preview']);
Route::post('/admin/create_about', [AboutController::class, 'create_about']);
Route::get('/admin/about_publish/{id}', [AboutController::class, 'about_publish']);

/*********************Concern Section***********************/
Route::get('/admin/concern', [AboutController::class, 'concern']);
Route::get('/admin/add-concern', [AboutController::class, 'add']);
Route::get('/admin/addtype', [AboutController::class, 'addtype']);
Route::post('/admin/create_concern', [AboutController::class, 'create_concern']);
Route::get('/admin/edit_concern/{id}', [AboutController::class, 'edit_concern']);
Route::post('/admin/update_concern/{id}', [AboutController::class, 'update_concern']);
Route::get('/admin/delete_concern/{id}', [AboutController::class, 'delete_concern']);

/*********************Membership Section***********************/
Route::get('/admin/membership', [MemberShipController::class, 'index']);
Route::get('/admin/add-membership', [MemberShipController::class, 'add']);
Route::get('/admin/membership-preview', [MemberShipController::class, 'membership_preview']);
Route::get('/admin/membership_publish/{id}', [MemberShipController::class, 'membership_publish']);
Route::get('/admin/edit_membership/{id}', [MemberShipController::class, 'edit_membership']);
Route::post('/admin/create_membership', [MemberShipController::class, 'create_membership']);
Route::post('/admin/update_membership/{id}', [MemberShipController::class, 'update_membership']);
Route::get('/admin/delete_membership/{id}', [MemberShipController::class, 'delete_membership']);

// Route::get('/admin/membership', [MemberShipController::class, 'membership']);
// Route::post('/admin/create_membership', [MemberShipController::class, 'create_membership']);
// Route::post('/admin/update_membership/{id}', [MemberShipController::class, 'update_membership']);
// Route::get('/admin/delete_membership/{id}', [MemberShipController::class, 'delete_membership']);

/*********************Doctor Section***********************/
Route::get('/admin/doctor-list', [DoctorController::class, 'index']);
Route::get('/admin/add-doctor', [DoctorController::class, 'add']);
Route::post('/admin/getactive-doctor', [DoctorController::class, 'getactive']);
Route::post('/admin/orderby-doctor', [DoctorController::class, 'orderby']);
Route::get('/admin/addeducation', [DoctorController::class, 'addeducation']);
Route::get('/admin/addexperience', [DoctorController::class, 'addexperience']);
Route::get('/admin/doctor-preview', [DoctorController::class, 'doctor_preview']);
Route::get('/admin/doctor_publish/{id}', [DoctorController::class, 'doctor_publish']);
Route::post('/admin/create_doctor', [DoctorController::class, 'create_doctor']);
Route::get('/admin/edit_doctor/{id}', [DoctorController::class, 'edit_doctor']);
Route::post('/admin/update_doctor/{id}', [DoctorController::class, 'update_doctor']);
Route::get('/admin/delete_doctor/{id}', [DoctorController::class, 'delete_doctor']);

/*********************Doctor Certificate Section***********************/
Route::get('/admin/doctor-certificate', [DoctorCertificateController::class, 'Index']);
Route::get('/admin/add-doctor-certificate', [DoctorCertificateController::class, 'Add']);
Route::get('/admin/doctor-certificate-preview', [DoctorCertificateController::class, 'DoctorCertificatePreview']);
Route::get('/admin/doctor_certificate_publish/{id}', [DoctorCertificateController::class, 'DoctorCertificatePublish']);
Route::get('/admin/edit_doctor_certificate/{id}', [DoctorCertificateController::class, 'EditDoctorCertificate']);
Route::post('/admin/create_doctor_certificate', [DoctorCertificateController::class, 'CreateDoctorCertificate']);
Route::post('/admin/update_doctor_certificate/{id}', [DoctorCertificateController::class, 'UpdateDoctorCertificate']);
Route::get('/admin/delete_doctor_certificate/{id}', [DoctorCertificateController::class, 'DeleteDoctorCertificate']);

/*********************Doctor Detail Section***********************/
// Route::get('/admin/doctor-detail', [DoctorController::class, 'doctor_detail']);
// Route::get('/admin/add-doctor-detail', [DoctorController::class, 'add_detail']);
// Route::post('/admin/create_doctor_detail', [DoctorController::class, 'create_doctor_detail']);
// Route::get('/admin/edit_doctor_detail/{id}', [DoctorController::class, 'edit_doctor_detail']);
// Route::post('/admin/update_doctor_detail/{id}', [DoctorController::class, 'update_doctor_detail']);
// Route::get('/admin/delete_doctor_detail/{id}', [DoctorController::class, 'delete_doctor_detail']);

/*********************Contact Us Section***********************/
Route::get('/admin/contact', [ContactController::class, 'index']);
Route::get('/admin/Request', [ContactController::class, 'request_a_callback']);
// Route::post('/admin/create-contact-mail', [FromController::class, 'create_contact_mail']);
// Route::get('/admin/sendmail', [FromController::class, 'sendmail']);
Route::get('/admin/request-call-back',[AppointmentController::class,'request_callback_list']);

/*********************Contact Us Section***********************/
// Route::get('/admin/contact-detail', [ContactController::class, 'contact_detail']);


/*********************Address Section***********************/
Route::get('/admin/address-list', [ContactController::class, 'AddressList']);
Route::get('/admin/add-address', [ContactController::class, 'AddAddress']);
Route::get('/admin/address-preview', [ContactController::class, 'address_preview']);
Route::get('/admin/address_publish/{id}', [ContactController::class, 'address_publish']);
Route::get('/admin/edit_address/{id}', [ContactController::class, 'EditAddress']);
Route::get('/admin/addphone', [ContactController::class, 'addphone']);
Route::get('/admin/addemail', [ContactController::class, 'addemail']);
Route::get('/admin/addday', [ContactController::class, 'addday']);
Route::post('/admin/getactive-address', [ContactController::class, 'getactive']);
Route::post('/admin/orderby-address', [ContactController::class, 'orderby']);
Route::post('/admin/create_address', [ContactController::class, 'create_address']);
Route::get('/admin/delete_address/{id}', [ContactController::class, 'DeleteAddress']);



Route::get('/admin/social-media', [ContactController::class, 'socail_media']);
Route::get('/admin/add-socail', [ContactController::class, 'add']);
Route::post('/admin/create_socail', [ContactController::class, 'create_socail']);
Route::get('/admin/edit_socail/{id}', [ContactController::class, 'edit_socail']);
Route::post('/admin/update_socail/{id}', [ContactController::class, 'update_socail']);
Route::get('/admin/delete_socail/{id}', [ContactController::class, 'delete_socail']);


//-----------Menu---------------//
Route::get('/admin/menu', [MasterMenuController::class, 'MenuView']);
Route::post('/admin/getactive-menu', [MasterMenuController::class, 'getactive']);
Route::post('/admin/orderby-menu', [MasterMenuController::class, 'orderby_menu']);
Route::get('/admin/add-menu', [MasterMenuController::class, 'MenuForm']);
Route::get('/admin/edit-menu/{id}', [MasterMenuController::class, 'MenuEditForm']);
Route::post('/admin/menusave', [MasterMenuController::class, 'menusave']);
Route::post('/admin/menuupdate/{id}', [MasterMenuController::class, 'menuupdate']);
Route::get('/admin/delete-menu/{id}', [MasterMenuController::class, 'menudelete']);

//-----------Operation---------------//
Route::get('/admin/operation', [MasterOperationsController::class, 'OperationView']);
Route::post('/admin/getactive-operation', [MasterOperationsController::class, 'getactive']);
Route::post('/admin/orderby-operation', [MasterOperationsController::class, 'orderby_operation']);
Route::get('/admin/add-operation', [MasterOperationsController::class, 'OperationForm']);
Route::get('/admin/edit-operation/{id}', [MasterOperationsController::class, 'OperationEditForm']);
Route::post('/admin/operationsave', [MasterOperationsController::class, 'operationsave']);
Route::post('/admin/operationupdate/{id}', [MasterOperationsController::class, 'operationupdate']);
Route::get('/admin/delete-operation/{id}', [MasterOperationsController::class, 'operationdelete']);

//-----------Menu Operation---------------//
Route::get('/admin/menu-operation', [CfgMnuOperationsController::class, 'MenuOperationView']);
Route::get('/admin/add-menu-operation', [CfgMnuOperationsController::class, 'MenuOperationForm']);
Route::get('/admin/edit-menu-operation/{id}', [CfgMnuOperationsController::class, 'MenuOperationEditForm']);
Route::post('/admin/menu-operation-save', [CfgMnuOperationsController::class, 'MenuOperationSave']);
Route::post('/admin/menu-operation-update/{id}', [CfgMnuOperationsController::class, 'PlanConfigUpdate']);
Route::get('/admin/menu-operation-delete/{id}', [CfgMnuOperationsController::class, 'PlanConfigDelete']);

/*********************first menu Section*********************/
Route::get('/admin/primary-menu', [FrontMenuController::class, 'index']);
Route::get('/admin/add-primary-menu', [FrontMenuController::class, 'add']);
Route::post('/admin/create_primary', [FrontMenuController::class, 'create_primary']);
Route::get('/admin/primary-menu-preview', [FrontMenuController::class, 'primary_menu_preview']);
Route::get('/admin/create_primary_publish/{id}', [FrontMenuController::class, 'create_primary_publish']);
Route::post('/admin/getactiveprimary', [FrontMenuController::class, 'getactive']);
Route::post('/admin/menuassign', [FrontMenuController::class, 'menuassign']);
Route::post('/admin/orderby-primary', [FrontMenuController::class, 'orderby']);
Route::get('/admin/edit_primary/{id}', [FrontMenuController::class, 'edit_primary']);
Route::post('/admin/update_primary/{id}', [FrontMenuController::class, 'update_primary']);
Route::get('/admin/delete_primary/{id}', [FrontMenuController::class, 'delete_primary']);
/*********************second menu Section*********************/
Route::get('/admin/secondary-menu', [FrontMenuController::class, 'SecondMenuIndex']);
Route::get('/admin/add-secondary-menu', [FrontMenuController::class, 'SecondMenuAdd']);
Route::get('/admin/secondary-menu-preview', [FrontMenuController::class, 'primary_menu_preview']);
/*********************third menu Section*********************/
Route::get('/admin/third-menu', [FrontMenuController::class, 'ThirdMenuIndex']);
Route::get('/admin/add-third-menu', [FrontMenuController::class, 'ThirdMenuAdd']);
Route::post('/admin/primarymenu', [FrontMenuController::class, 'PrimaryMenu']);
Route::get('/admin/third-menu-preview', [FrontMenuController::class, 'ThirdMenuPreview']);
Route::get('/admin/edit-third-menu/{id}', [FrontMenuController::class, 'ThirdMenuEdit']);
/*********************fourth menu Section*********************/
Route::get('/admin/fourth-menu', [FrontMenuController::class, 'FourthMenuIndex']);
Route::get('/admin/add-fourth-menu', [FrontMenuController::class, 'FourthMenuAdd']);
Route::get('/admin/fourth-menu-preview', [FrontMenuController::class, 'FourthMenuPreview']);
Route::get('/admin/edit-fourth-menu/{id}', [FrontMenuController::class, 'FourthMenuEdit']);

/*********************fifth menu Section*********************/
Route::get('/admin/fifth-menu', [FrontMenuController::class, 'FifthMenuIndex']);
Route::get('/admin/add-fifth-menu', [FrontMenuController::class, 'FifthMenuAdd']);
Route::get('/admin/fifth-menu-preview', [FrontMenuController::class, 'FifthMenuPreview']);
Route::get('/admin/edit-fifth-menu/{id}', [FrontMenuController::class, 'FifthMenuEdit']);

// Route::get('/admin/secondary-menu', [FrontSecondMenuController::class, 'secondary_list']);
// Route::get('/admin/add-secondary-menu', [FrontSecondMenuController::class, 'add_secondary']);
// Route::post('/admin/create_secondary', [FrontSecondMenuController::class, 'create_secondary']);
// Route::post('/admin/getactivesecondary', [FrontSecondMenuController::class, 'getactive']);
// Route::post('/admin/orderby-secondary', [FrontSecondMenuController::class, 'orderby']);
// Route::get('/admin/secondary-menu-preview', [FrontSecondMenuController::class, 'secondary_menu_preview']);
// Route::get('/admin/create_secondary_publish/{id}', [FrontSecondMenuController::class, 'create_secondary_publish']);
// Route::get('/admin/edit_secondary/{id}', [FrontSecondMenuController::class, 'edit_secondary']);
// Route::post('/admin/update_secondary/{id}', [FrontSecondMenuController::class, 'update_secondary']);
// Route::get('/admin/delete_secondary/{id}', [FrontSecondMenuController::class, 'delete_secondary']);

// Route::get('/admin/third-menu', [FrontThirdMenuController::class, 'third_list']);
// Route::get('/admin/add-third-menu', [FrontThirdMenuController::class, 'add_third']);
// Route::post('/admin/getactivethird', [FrontThirdMenuController::class, 'getactive']);
// Route::post('/admin/orderby-third', [FrontThirdMenuController::class, 'orderby']);
// Route::post('/admin/secondary-list', [FrontThirdMenuController::class, 'secondarylist']);
// Route::get('/admin/third-menu-preview', [FrontThirdMenuController::class, 'third_menu_preview']);
// Route::get('/admin/create_third_publish/{id}', [FrontThirdMenuController::class, 'create_third_publish']);
// Route::post('/admin/create_third', [FrontThirdMenuController::class, 'create_third']);
// Route::get('/admin/edit_third/{id}', [FrontThirdMenuController::class, 'edit_third']);
// Route::post('/admin/update_third/{id}', [FrontThirdMenuController::class, 'update_third']);
// Route::get('/admin/delete_third/{id}', [FrontThirdMenuController::class, 'delete_third']);

/*********************SEO Section ***************/
Route::get('/admin/seo', [SeoController::class, 'index']);
Route::get('/admin/add-seo', [SeoController::class, 'add']);
Route::post('/admin/seo-getactive', [SeoController::class, 'getactive']);
Route::get('/admin/seo-preview', [SeoController::class, 'seo_preview']);
Route::get('/admin/create_seo_publish/{id}', [SeoController::class, 'create_seo_publish']);
Route::post('/admin/create_seo', [SeoController::class, 'create_seo']);
Route::get('/admin/edit_seo/{id}', [SeoController::class, 'edit_seo']);
Route::post('/admin/update_seo/{id}', [SeoController::class, 'update_seo']);
Route::get('/admin/delete_seo/{id}', [SeoController::class, 'delete_seo']);

/*********************Redirect Section ***************/
Route::get('/admin/redirect', [RedirectUrlController::class, 'index']);
Route::get('/admin/add-redirect', [RedirectUrlController::class, 'add']);
Route::post('/admin/redirect-getactive', [RedirectUrlController::class, 'getactive']);
Route::get('/admin/redirect-preview', [RedirectUrlController::class, 'redirect_preview']);
Route::get('/admin/create_redirect_publish/{id}', [RedirectUrlController::class, 'create_redirect_publish']);
Route::post('/admin/create_redirect', [RedirectUrlController::class, 'create_redirect']);
Route::get('/admin/edit_redirect/{id}', [RedirectUrlController::class, 'edit_redirect']);
Route::post('/admin/update_redirect/{id}', [RedirectUrlController::class, 'update_redirect']);
Route::get('/admin/delete_redirect/{id}', [RedirectUrlController::class, 'delete_redirect']);

/*********************SiteMap Section ***************/
Route::get('/admin/sitemap', [SiteMapController::class, 'index']);
Route::post('/admin/create_sitemap', [SiteMapController::class, 'create_sitemap']);
Route::get('/admin/robots', [SiteMapController::class, 'robots']);
Route::post('/admin/create_robots', [SiteMapController::class, 'create_robots']);

/********************* Slider Section ***************************/
Route::get('/admin/slider', [HomeController::class, 'slider']);
Route::get('/admin/add-slider', [HomeController::class, 'add_slider']);
Route::get('/admin/slider-preview', [HomeController::class, 'slider_preview']);
Route::get('/admin/slider_publish/{id}', [HomeController::class, 'slider_publish']);
Route::post('/admin/getactive-slider', [HomeController::class, 'getactive']);
Route::post('/admin/orderby-slider', [HomeController::class, 'orderby']);
Route::post('/admin/create_slider', [HomeController::class, 'create_slider']);
Route::get('/admin/edit_slider/{id}', [HomeController::class, 'edit_slider']);
Route::post('/admin/update_slider/{id}', [HomeController::class, 'update_slider']);
Route::get('/admin/delete_slider/{id}', [HomeController::class, 'delete_slider']);

/********************* Home Our Service Section****************/
Route::get('/admin/ourservice', [HomeController::class, 'our_service']);
Route::get('/admin/add-ourservice', [HomeController::class, 'add_our_service']);
Route::post('/admin/create_ourservice', [HomeController::class, 'create_our_service']);
Route::get('/admin/edit_ourservice/{id}', [HomeController::class, 'edit_our_service']);
Route::post('/admin/update_ourservice/{id}', [HomeController::class, 'update_our_service']);
Route::get('/admin/delete_ourservice/{id}', [HomeController::class, 'delete_our_service']);

/********************* Home Technology Section********************/
Route::get('/admin/hometechnology', [HomeController::class, 'home_technology']);
Route::post('/admin/create-technology', [HomeController::class, 'create_technology']);
Route::get('/admin/homepicture', [HomeController::class, 'home_picture']);
Route::post('/admin/create-picture', [HomeController::class, 'create_picture']);

/********************* PressMedia Category Section********************/
Route::get('/admin/pressmedia-category', [PressMediaController::class, 'index']);
Route::post('/admin/getactive-press-category', [PressMediaController::class, 'getactive']);
Route::post('/admin/orderby-press-category', [PressMediaController::class, 'orderby']);
Route::get('/admin/add-pressmedia-category', [PressMediaController::class, 'add_pressmedia_category']);
Route::get('/admin/pressmedia-category-preview', [PressMediaController::class, 'pressmediacat_preview']);
Route::get('/admin/pressmedia_category_publish/{id}', [PressMediaController::class, 'pressmedia_category_publish']);
Route::post('/admin/create_pressmedia_category', [PressMediaController::class, 'create_pressmedia_category']);
Route::get('/admin/edit_pressmedia_category/{id}', [PressMediaController::class, 'edit_pressmedia_category']);
Route::post('/admin/update_pressmedia_category/{id}', [PressMediaController::class, 'update_pressmedia_category']);
Route::get('/admin/delete_pressmedia_category/{id}', [PressMediaController::class, 'delete_pressmedia_category']);

/********************* PressMedia Section********************/
Route::get('/admin/pressmedia', [PressMediaController::class, 'pressmediaindex']);
Route::post('/admin/getactive-pressmedia', [PressMediaController::class, 'getactive_pressmedia']);
Route::get('/admin/add-pressmedia', [PressMediaController::class, 'add_pressmedia']);
Route::get('/admin/pressmedia-preview', [PressMediaController::class, 'pressmedia_preview']);
Route::get('/admin/pressmedia_publish/{id}', [PressMediaController::class, 'pressmedia_publish']);
Route::post('/admin/addpressmedia', [PressMediaController::class, 'addpressmedia']);
Route::post('/admin/create_pressmedia', [PressMediaController::class, 'create_pressmedia']);
Route::get('/admin/edit_pressmedia/{id}', [PressMediaController::class, 'edit_pressmedia']);
Route::post('/admin/update_pressmedia/{id}', [PressMediaController::class, 'update_pressmedia']);
Route::get('/admin/delete_pressmedia/{id}', [PressMediaController::class, 'delete_pressmedia']);

/*********************Logo Section***********************/
Route::get('/admin/logo-list', [FooterController::class, 'index']);
Route::get('/admin/add-logo', [FooterController::class, 'add']);
Route::get('/admin/logo-preview', [FooterController::class, 'logo_preview']);
Route::get('/admin/logo_publish/{id}', [FooterController::class, 'logo_publish']);
Route::get('/admin/edit_logo/{id}', [FooterController::class, 'edit_logo']);
Route::post('/admin/create_logo', [FooterController::class, 'create_logo']);
Route::post('/admin/update_logo/{id}', [FooterController::class, 'update_logo']);
Route::get('/admin/delete_logo/{id}', [FooterController::class, 'delete_logo']);

/*********************Footer Menu Section***********************/
Route::get('/admin/footer-menu', [FooterController::class, 'FooterMenu']);
Route::get('/admin/add-footer-menu', [FooterController::class, 'AddFooterMenu']);
Route::get('/admin/footer-menu-preview', [FooterController::class, 'FooterMenuPreview']);
Route::get('/admin/footer_menu_publish/{id}', [FooterController::class, 'FooterMenuPublish']);
Route::get('/admin/edit_footer_menu/{id}', [FooterController::class, 'EditFooterMenu']);
Route::get('/admin/add-footer-menu-list', [FooterController::class, 'AddFooterMenuList']);
Route::post('/admin/getactive-footer-menu', [FooterController::class, 'getactive']);
Route::post('/admin/orderby-footer-menu', [FooterController::class, 'orderby']);
Route::post('/admin/create_footer_menu', [FooterController::class, 'CreateFooterMenu']);
Route::get('/admin/delete_footer_menu/{id}', [FooterController::class, 'delete_footer_menu']);

/****************************service exclusive section*************************/
Route::get('/admin/google-recaptcha', [GoogleRecaptchaController::class, 'index']);
Route::post('/admin/getactive-google-recaptcha', [GoogleRecaptchaController::class, 'getactive']);
Route::post('/admin/orderby-google-recaptcha', [GoogleRecaptchaController::class, 'orderby']);
Route::get('/admin/google-recaptcha-preview', [GoogleRecaptchaController::class, 'GoogleRecaptchaPreview']);
Route::get('/admin/google_recaptcha_publish/{id}', [GoogleRecaptchaController::class, 'GoogleRecaptchaPublish']);
Route::get('/admin/add-google-recaptcha', [GoogleRecaptchaController::class, 'add']);
Route::post('/admin/create_google_recaptcha', [GoogleRecaptchaController::class, 'CreateGoogleRecaptcha']);
Route::get('/admin/edit_google_recaptcha/{id}', [GoogleRecaptchaController::class, 'EditGoogleRecaptcha']);
Route::post('/admin/update_google_recaptcha/{id}', [GoogleRecaptchaController::class, 'UpdateGoogleRecaptcha']);
Route::get('/admin/delete_google_recaptcha/{id}', [GoogleRecaptchaController::class, 'DeleteGoogleRecaptcha']);

/****************************Case Studies section***************************/
Route::get('/admin/case-studies', [CaseStudiesController::class, 'IndexCaseStudies']);
Route::post('/admin/getactive-case-studies', [CaseStudiesController::class, 'GetactiveCaseStudies']);
Route::post('/admin/orderby-case-studies', [CaseStudiesController::class, 'OrderbyCaseStudies']);
Route::get('/admin/add-case-studies', [CaseStudiesController::class, 'CaseStudiesAdd']);
Route::get('/admin/case-studies-preview', [CaseStudiesController::class, 'CaseStudiesPreview']);
Route::get('/admin/case_studies_publish/{id}', [CaseStudiesController::class, 'CaseStudiesPublish']);
Route::post('/admin/case-studies-list', [CaseStudiesController::class, 'CaseStudiesList']);
Route::post('/admin/casethreepragraph-list', [CaseStudiesController::class, 'CaseStudiesThreePragraphList']);
Route::post('/admin/casetabpragraph-list', [CaseStudiesController::class, 'CaseStudiesTabPragraphList']);
Route::post('/admin/case-studies-change-list', [CaseStudiesController::class, 'CaseStudiesChangeList']);
Route::post('/admin/case-studies-section-delete', [CaseStudiesController::class, 'CaseStudiesSectionDelete']);
Route::post('/admin/case-studies-section-order', [CaseStudiesController::class, 'CaseStudiesSectionOrder']);
Route::post('/admin/create_case_studies', [CaseStudiesController::class, 'CreateCaseStudies']);
Route::get('/admin/edit_case_studies/{id}', [CaseStudiesController::class, 'EditCaseStudies']);
Route::post('/admin/update_case_studies/{id}', [CaseStudiesController::class, 'UpdateCaseStudies']);
Route::post('/admin/case-studies-removesec', [CaseStudiesController::class, 'CaseStudiesRemovesec']);
Route::get('/admin/delete_case_studies/{id}', [CaseStudiesController::class, 'DeleteCaseStudies']);

});

   
     Route::get('/blogs',  [AppLaunchController::class, 'Blogs']);
     Route::get('/mailForn',  [AppLaunchController::class, 'mailForn']);
    Route::get('/blog/{name}',  [AppLaunchController::class, 'BlogDetails']);
    Route::get('/real-results',  [AppLaunchController::class, 'ResultsFirstCategory']);
    Route::get('/real-results/{name}',  [AppLaunchController::class, 'RealResultsDetail']);
 

    Route::get('/requestCaptcha', [AppointmentController::class, 'captcha']);
    Route::post('/appointmentsave',  [AppointmentController::class, 'appointmentsave']);
    Route::post('/requestAcallback', [AppointmentController::class, 'requestAcallback']);
     Route::post('/save-emailsubscription',  [AppointmentController::class, 'save_emailsubscription']);
    Route::post('/contactussave',  [AppointmentController::class, 'contactussave']);
    // Route::post('/quotessave',  [AppointmentController::class, 'quotessave']);
    Route::get('/thank-you',  [AppLaunchController::class, 'ThankYou']);
    Route::get('/404',  [AppLaunchController::class, 'ErrorPage']);
    // Route::get('/{any}/{all}',  [AppLaunchController::class, 'ServiceDetails']);

    Route::get('/about-doctor',  [AppLaunchController::class, 'AboutDoctor']);
    Route::get('/about-clinic',  [AppLaunchController::class, 'AboutClinic']);
    Route::get('/privacy-policy',  [AppLaunchController::class, 'PrivacyPolicy']);
    Route::get('/terms-and-conditions',  [AppLaunchController::class, 'TermsCondition']);
    Route::get('/legal-disclaimer',  [AppLaunchController::class, 'LegalDisclaimer']);
    Route::get('/technology',  [AppLaunchController::class, 'Technology']);
    Route::get('/technology/{name}',  [AppLaunchController::class, 'TechnologyDetails']);
    Route::get('/clinic-gallery',  [AppLaunchController::class, 'ClinicGallery']);
    Route::get('/schedule-a-consultation',  [AppLaunchController::class, 'BookAnAppointment']);
    Route::get('/contact-us',  [AppLaunchController::class, 'ContactUs']);
    Route::get('/outh-callback',  [AppLaunchController::class, 'outh_callback']);
    
    
    Route::get('/sitemap.xml',  [AppLaunchTwoController::class, 'sitemapxml']);
    Route::get('/robots.txt',  [AppLaunchTwoController::class, 'robot']);

    Route::get('/googlecaptcha',  [GoogleRecaptchaController::class, 'CustomCaptcha']);
    Route::get('/written-testimonials',  [AppLaunchController::class, 'Testimonials']);
    Route::get('/video-testimonials',  [AppLaunchController::class, 'VideoTestimonials']);
    Route::get('/videos',  [AppLaunchController::class, 'Videos']);
    Route::get('/treatments',  [AppLaunchController::class, 'Services']);
    Route::get('/treatments/{name}',  [AppLaunchController::class, 'Service_category']);
    Route::get('/{any}/{all}',  [AppLaunchController::class, 'Sub_service_category']);
    Route::get('/{any}',  [AppLaunchController::class, 'ServiceDetails']);