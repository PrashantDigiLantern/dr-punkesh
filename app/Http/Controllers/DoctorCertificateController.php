<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DoctorCertificateModel;
use App\Models\DoctorListModel;
use App\Models\DoctorModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class DoctorCertificateController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }
    
    public function Index()
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
        
        $select_table = ['certificate_id', 'certificate_image','certificate_show_type', 'full_image', 'alt_tag', 'status','certificate_status'];
        $query = DoctorCertificateModel::select($select_table);
        $data['view'] = $query->get();
        $data['count'] = $query->count();
        return view('admin.doctor-certificate.list-doctor-certificate')->with($data);
    }

    public function Add()
    {
        $data['view'] = DoctorCertificateModel::find(session('primeid'));
        $data['doctorlist'] = DoctorModel::where('status','active')->get();
        // print_r($data['doctorlist']);
        return view('admin.doctor-certificate.add-doctor-certificate')->with($data);
    }

    public function CreateDoctorCertificate(Request $request)
    {
        $destinationPath = 'backend/certificate';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('certificate_image')) {
            $image = $request->file('certificate_image');
            $certificate_img = time() . '_thumb.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $certificate_img);
        }else{
            $certificate_img = $request->input('oldcertificate_image');
        }

        if ($request->hasFile('full_image')) {
            $image = $request->file('full_image');
            $certificate_full_image = time() . '_full.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $certificate_full_image);
        }else{
            $certificate_full_image = $request->input('oldfull_image');
        }

        $certificate_id = $request->input('certificate_id');
        if($certificate_id < 1){
            $certificate = DoctorCertificateModel::create(array_merge(
            $request->input(),
            [
                'certificate_image' => $certificate_img,
                'full_image' => $certificate_full_image,
            ]
        ));
        Session::put('primeid', $certificate->certificate_id);
    }else{
        $certificatedata = DoctorCertificateModel::find($certificate_id);
        $certificatedata->update(array_merge($request->input(),
            [
                'certificate_key' => $certificatedata->certificate_key,
                'certificate_image' => $certificate_img,
                'full_image' => $certificate_full_image,
            ]
        ));
        }
        return redirect('admin/doctor-certificate');
    }

   

    public function EditDoctorCertificate($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = DoctorCertificateModel::find($id);
        $data['doctorlist'] = DoctorModel::where('status','active')->get();
        return view('admin.doctor-certificate.edit-doctor-certificate')->with($data);
    }


    public function DeleteDoctorCertificate($id)
    {
        $data = DoctorCertificateModel::find($id);
        $data->update(['deleted_by' => session('useradmin')['usr_id']]);
        $data->delete();
        return redirect('admin/doctor-certificate');
    }
}
