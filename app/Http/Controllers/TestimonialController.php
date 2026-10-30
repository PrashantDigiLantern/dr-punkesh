<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\TestimonialModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
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
        foreach(session('userinfo')['user_menu_permissions'] as $oplist){
            if($oplist->mnu_url == $uri){
             $uripermission = $oplist->cfgmnu_act_id;
             $uripermission = explode(',',$uripermission);
            }
         }
        $data['permission'] = $uripermission;
        
        $select_table = ['test_id', 'source','test_show_type','name','description','status','test_status'];
        $data['view'] = TestimonialModel::select($select_table)->get();
        return view('admin.testimonial.list-testimonial')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $testimonial = TestimonialModel::find($id);
        $testimonial->update($request->input());
    }

    public function add()
    {
        $data = TestimonialModel::find(session('primeid'));
        return view('admin.testimonial.add-testimonial', ['view' => $data]);
    }

    public function create_testimonials(Request $request)
    {
        $test_id = $request->input('test_id');
        if($test_id < 1){
        $test = TestimonialModel::create($request->input());
        Session::put('primeid', $test->test_id);
        }else{
        $testimonial = TestimonialModel::find($test_id);
        $testimonial->update(array_merge($request->input(),
            [
                'test_key' => $testimonial->test_key,
            ]
        ));
        }
        return redirect('admin/testimonials');
    }

    public function edit_testimonials($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = TestimonialModel::find($id);
        return view('admin.testimonial.edit-testimonial')->with($data);
    }

    public function update_testimonials(Request $request, $id)
    {
       $testimonial = TestimonialModel::find($id);
       $testimonial->update($request->input());
        return redirect('admin/testimonials');
    }
    public function delete_testimonials($id)
    {
        $testimonial = TestimonialModel::find($id);
        $testimonial->update(['deleted_by' => session('useradmin')['usr_id']]);
        $testimonial->delete();
        return redirect('admin/testimonials');
    }
}
