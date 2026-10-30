<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategoryModel;
use App\Models\ServiceFaqModel;
use App\Models\ServiceModel;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceFaqController extends Controller
{
    public function index()
    {
        session()->forget('primeid');
        $uri = request()->segments()[1];
        $uripermission = [];
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
           if($oplist->op_link == $uri){
            $uripermission = $oplist->oper_act_id;
            $uripermission = explode(',',$uripermission);
           }
        }
        $data['permission'] = $uripermission;

        $select_table = ['ser_faq_id', 'service_cat_id','service_id','question', 'answer','order_by', 'status','ser_faq_status'];
        $data['view'] = ServiceFaqModel::select($select_table)->get();

        // if(isset($data['view']->service_id)){
        $select_table = ['ser_id', 'service_name'];
        //$data['service'] = ServiceModel::select($select_table)->where('ser_id',$data['view']->service_id)->first();
        $data['service'] = ServiceModel::select($select_table)->where('status','active')->get();
        return view('admin.service-faq.list-service-faq')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $servicelist = ServiceFaqModel::find($id);
        $servicelist->update($request->input());
    }

    public function orderby_service(Request $request)
    {
        $id = $request->input('id');
        $servicelist = ServiceFaqModel::find($id);
        $servicelist->update($request->input());
    }

    public function add()
    {
        $data['view'] = ServiceFaqModel::find(session('primeid'));

        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        $data['firstcategory'] = ServiceModel::select('ser_id', 'service_name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();
            
        // $select_table = ['ser_cat_id', 'service_name'];
        // $data['servicecat'] = ServiceModel::select($select_table)->where('status','active')->get();
        // if(isset($data['view']->service_id)){
        $select_table = ['ser_id', 'service_name'];
        if(isset($data['view']->service_id)){
        $data['service'] = ServiceModel::select($select_table)
        ->where('ser_id',$data['view']->service_id)->where('status','active')->first();
       
        $data['secondsec'] = CategoryTrait::allcategorylist($data['view']->service_id);
        }
        return view('admin.service-faq.add-service-faq')->with($data);
    }

    public function create_service(Request $request)
    {
        $ser_faq_id = $request->input('ser_faq_id');

        $parent_id = null;
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $permissionoprid = explode(',', $permissionoprid);
        if (in_array('39', $permissionoprid)) {
            $parent_id = $request->input('fifth_cat');
        } else {
            if (in_array('38', $permissionoprid)) {
                $parent_id = $request->input('fourt_cat');
            } else {
                if (in_array('37', $permissionoprid)) {
                    $parent_id = $request->input('third_cat');
                } else {
                    if (in_array('36', $permissionoprid)) {
                        $parent_id = $request->input('second_cat');
                    } else {
                        if (in_array('16', $permissionoprid)) {
                            $parent_id = $request->input('service_cat');
                        }
                    }
                }
            }
        }
        // echo $parent_id;
        // die();

        if($ser_faq_id < 1){
            $service = ServiceFaqModel::create(array_merge($request->input(),
            [
                'service_cat_id' => $parent_id,
            ]));
            Session::put('primeid', $service->ser_faq_id);
        }else{
            $servicedata = ServiceFaqModel::find($ser_faq_id);
            $servicedata->update(array_merge($request->input(),
             [
                'ser_faq_key' => $servicedata->ser_faq_key,
                'service_cat_id' => $parent_id,
            ]
        ));
            }
        return redirect('admin/service-faq');
    }

    public function edit_service($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = ServiceFaqModel::find($id);
        $service_id = $data['edit']->service_id;
        $service_cat_id = $data['edit']->service_cat_id;
     
        $permissionoprid = session('userinfo')['user_category_operation_permissions'][0]['opid'];
        $data['permissionoprid'] = explode(',', $permissionoprid);

        $data['firstcategory'] = ServiceModel::select('ser_id', 'service_name')->whereNull('parent_id')
            ->where('category_type', 'firstcategory')->get();

  
   
   
        $data['serviceview'] = ServiceModel::select('ser_id', 'service_name')
        ->where('service.ser_id', $service_id)->first();
        
        $data['serviceview1'] = ServiceModel::select('parent_id','ser_id', 'service_name')
        ->where('service.ser_id', $service_cat_id)->first();
        
         $data['serviceview2'] = ServiceModel::select('ser_id', 'service_name')
        ->where('service.ser_id', $data['serviceview1']->parent_id)->first();
        
        // dd($data['serviceview2']);
        
        return view('admin.service-faq.edit-service-faq')->with($data);
    }

    public function update_service(Request $request, $id)
    {
        $service = ServiceFaqModel::find($id);
        $service->update($request->input());
        return redirect('admin/service-faq');
    }
    public function delete_service($id)
    {
        $servicelist = ServiceFaqModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();

        return redirect('admin/service-faq');
    }
}
