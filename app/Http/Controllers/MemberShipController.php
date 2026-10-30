<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\MembershipModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class MemberShipController extends Controller
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
        
        $select_table = ['mem_id', 'image','full_image', 'alt_tag', 'member_status'];
        $query = MembershipModel::select($select_table);
        $data['view'] = $query->get();
        $data['count'] = $query->count();
        return view('admin.membership.list-membership')->with($data);
    }

    public function add()
    {
        $data = MembershipModel::find(session('primeid'));
        return view('admin.membership.add-membership',['view' => $data]);
    }

    public function create_membership(Request $request)
    {
        $destinationPath = 'backend/membership';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '_thumb.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        }else{
            $name = $request->input('oldimage');
        }

        if ($request->hasFile('full_image')) {
            $image = $request->file('full_image');
            $name2 = time() . '_full.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name2);
        }else{
            $name2 = $request->input('oldfull_image');
        }

        $mem_id = $request->input('mem_id');
        if($mem_id < 1){
            $member = MembershipModel::create(array_merge(
            $request->input(),
            [
                'image' => $name,
                'full_image' => $name2,
            ]
        ));
        Session::put('primeid', $member->mem_id);
    }else{
        $memberdata = MembershipModel::find($mem_id);
        $memberdata->update(array_merge($request->input(),
            [
                'member_key' => $memberdata->member_key,
                'image' => $name,
                'full_image' => $name2,
            ]
        ));
        }
        return redirect('admin/membership');
    }


    public function edit_membership($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = MembershipModel::find($id);
        return view('admin.membership.edit-membership')->with($data);
    }

    public function update_membership(Request $request, $id)
    {
        $faqdetail = MembershipModel::find($id);
        $faqdetail->update($request->input());
        return redirect('admin/membership');
    }

    public function delete_membership($id)
    {
        $data = MembershipModel::find($id);
        $data->update(['deleted_by' => session('useradmin')['usr_id']]);
        $data->delete();
        return redirect('admin/membership');
    }
}
