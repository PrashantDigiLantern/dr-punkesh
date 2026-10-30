<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\RedirectUrlModel;
use App\Models\SeoPageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class RedirectUrlController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }

    public function index()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        // print_r(session('useradmin'));
        
       // echo '<pre>';print_r(session('userinfo')['user_menu_permissions']);echo '</pre>';
       foreach(session('userinfo')['user_operation_permissions'] as $oplist){
        if($oplist->op_link == $uri){
         $uripermission = $oplist->oper_act_id;
         $uripermission = explode(',',$uripermission);
        }
     }
        $data['permission'] = $uripermission;
       
        $select_table = ['redirect_id','page_name','page_type','old_url','current_url','port','status','redirect_status'];
        $data['view'] = RedirectUrlModel::select($select_table)->get();
        return view('admin.redirect.list-redirect')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $redirect = RedirectUrlModel::find($id);
        $redirect->update($request->input());
    }

    public function add()
    {
        $data['view'] = RedirectUrlModel::find(session('primeid'));
        return view('admin.redirect.add-redirect')->with($data);
    }

    public function create_redirect(Request $request)
    {
        $oldrouteurl = $request->input('old_url');
        $oldrouteurl = str_replace("services/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("blogs/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("blog/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("results/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("real-results/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("video/", "",  $oldrouteurl);
        $oldrouteurl = str_replace("videos/", "",  $oldrouteurl);
        $seolists = SeoPageModel::where('url',$oldrouteurl);
        $preurl = url()->previous();
        if($seolists->count() < 1){
            return redirect($preurl);
        }
        $seolist = $seolists->first();
        $redirect_id = $request->input('redirect_id');
        if($redirect_id < 1){
        $redirect = RedirectUrlModel::create(array_merge($request->input(),
    [
        'page_name' => $seolist->page_name,
        'page_type' => $seolist->seo_type,
        'oldrouteurl' => $oldrouteurl
    ]
        ));
        Session::put('primeid', $redirect->redirect_id);
    }else{
            $redirectlist = RedirectUrlModel::find($redirect_id);
            $redirectlist->update(array_merge($request->input(),
                [
                    'redirect_key' => $redirectlist->redirect_key,
                    'page_name' => $seolist->page_name,
                    'page_type' => $seolist->page_type,
                    'oldrouteurl' => $oldrouteurl
                ]
            ));
            }
        return redirect('admin/redirect');
    }

    // public function redirect_preview()
    // {
    //     $data = RedirectUrlModel::find(session('primeid'));
    //     return view('admin.redirect.preview-redirect', ['view' => $data]);
    // }

    // public function create_redirect_publish($id)
    // {
    //    $testpre = RedirectUrlModel::find($id);

    //     $data = [
    //         'redirect_status' => 'publish',
    //         'redirect_key' => $testpre->redirect_key,
    //         'site_id' => $testpre->site_id,
    //         'org_id' => $testpre->org_id,
    //         'page_name' => $testpre->page_name,
    //         'page_type' => $testpre->page_type,
    //         'oldrouteurl' => $testpre->oldrouteurl,
    //         'old_url' => $testpre->old_url,
    //         'current_url' => $testpre->current_url,
    //         'port' => $testpre->port,
    //         'status' => $testpre->status
    //     ];
        
    //     $testpublish = RedirectUrlModel::where('redirect_key',$testpre->redirect_key)->where('redirect_status','publish');
    //     // echo $testpublish->count();  die(); 
    //     if($testpublish->count() < 1){
    //         RedirectUrlModel::create(array_merge($data,['created_by' => session('useradmin')['usr_id']]));
    //     }else{
    //     $testpublish->update(array_merge($data,['updated_by' => session('useradmin')['usr_id']]));
    //     }
    //     return redirect('admin/redirect');
    // }

    public function edit_redirect($id)
    {
        Session::put('primeid', $id);
        $data['view'] = RedirectUrlModel::find($id);
        return view('admin.redirect.add-redirect')->with($data);
    }

    public function update_redirect(Request $request, $id)
    {
        $data = RedirectUrlModel::find($id);
        $data->update($request->input());
        return redirect('admin/redirect');
    }

    public function delete_redirect($id)
    {
        $technology = RedirectUrlModel::find($id);
        $technology->update(['deleted_by' => session('useradmin')['usr_id']]);
        $technology->delete();
        return redirect('admin/redirect');
    }
}
