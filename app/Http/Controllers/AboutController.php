<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\AboutModel;
use App\Models\ConcernModel;
use App\Models\MembershipModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
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
        foreach(session('userinfo')['user_operation_permissions'] as $oplist){
            if($oplist->op_link == $uri){
             $uripermission = $oplist->oper_act_id;
             $uripermission = explode(',',$uripermission);
            }
         }
        $data['permission'] = $uripermission;

        $select_table = ['abt_id', 'heading1', 'section1', 'section2', 'heading2', 'section3', 'heading3','section4','heading4','section5','status','about_status'];
        $data['view'] = AboutModel::select($select_table)->get();
        return view('admin.about.list-about')->with($data);
    }

    public function aboutadd()
    {
        //$select_table = ['abt_id', 'heading', 'section1', 'section2', 'heading3', 'section3', 'section4','heading5','section5'];
        $data['view'] = AboutModel::find(session('primeid'));
        return view('admin.about.edit-about')->with($data);
    }
    
    public function create_about(Request $request)
    {
        $destinationPath = 'backend/about';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        } else {
            $name = $request->input('oldimage');
        }

        if ($request->hasFile('home_image')) {
            $image = $request->file('home_image');
            $home_image = time() . '_home_image.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $home_image);
        } else {
            $home_image = $request->input('oldhome_image');
        }
        
        $id = $request->input('abt_id');
        if ($id > 0) {
            $aboutlist = AboutModel::find($id);
            $aboutlist->update(
                array_merge($request->input(),
        [
            'about_key' => $aboutlist->about_key,
            'home_image' => $home_image,
            'image' => $name
        ]
    )
            );
        } else {
            // die('hi');
            $about = AboutModel::create(array_merge($request->input(),[
                'home_image' => $home_image,
                'image' => $name
            ]));
            Session::put('primeid', $about->abt_id);
        }
        return redirect('admin/about');
    }

    public function aboutedit($id)
    {
        Session::put('primeid', $id);
        //$select_table = ['abt_id', 'heading', 'section1', 'section2', 'heading3', 'section3', 'section4','heading5','section5'];
        $data['view'] = AboutModel::find($id);
        return view('admin.about.edit-about')->with($data);
    }

    public function concern()
    {
        $select_table = ['con_id', 'name', 'sort_desc', 'description', 'image', 'alt_tag', 'type'];
        $data['view'] = ConcernModel::select($select_table)->get();
        return view('admin.about.list-concern')->with($data);
    }

    public function add()
    {
        return view('admin.about.add-concern');
    }

    public function addtype()
    {
        return view('admin.about.add-concern-type');
    }

    public function create_concern(Request $request)
    {

        $destinationPath = 'backend/about/concern';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);
        }
        ConcernModel::create([
                'name' => $request->input('name'),
                'sort_desc' => $request->input('sort_desc'),
                'description' => $request->input('description'),
                'image' => $name,
                'alt_tag' => $request->input('alt_tag'),
                'type' => implode('@@', $request->input('type')),
                'created_at' => date('d-m-Y H:i'),
            ]
        );

        return redirect('admin/concern');
    }

    public function edit_concern($id)
    {
        $select_table = ['con_id', 'name', 'sort_desc', 'description', 'image', 'alt_tag', 'type'];
        $data = ConcernModel::select($select_table)->where('id', $id)->first();
        return view('admin.about.edit-concern', ['edit' => $data]);
    }

    public function update_concern(Request $request, $id)
    {
        $destinationPath = $this->siteurl->sessionget().'backend/about/concern';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        $concernlist = ConcernModel::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $path = $destinationPath . $concernlist->image;
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $name = $request->input('oldimage');
        }

        $concernlist->update([
                'name' => $request->input('name'),
                'sort_desc' => $request->input('sort_desc'),
                'description' => $request->input('description'),
                'image' => $name,
                'alt_tag' => $request->input('alt_tag'),
                'type' => implode('@@', $request->input('type')),
                'modified_at' => date('d-m-Y H:i'),
            ]);

        return redirect('admin/concern');
    }
    public function delete_concern(Request $request, $id)
    {
        //To delete through org Id from the user role table
        $concern = ConcernModel::find($id);
        $concern->update(['deleted_by' => session('userinfo')['usr_id']]);
        $concern->delete();

        return redirect('admin/concern');
    }

    public function membership()
    {
        $select_table = ['mem_id', 'image', 'alt_tag'];
        $membership = MembershipModel::select($select_table);
        $data['view'] = $membership->get();
        $data['count'] = $membership->count();
        return view('admin.membership.list-membership')->with($data);
    }

    public function create_membership(Request $request)
    {
        $destinationPath = 'backend/membership';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $gallery_img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gallery_img);
        }

        MembershipModel::create([
                'image' => $gallery_img,
                'alt_tag' => $request->input('alt_tag')
            ]);
        return redirect('admin/membership');
    }

    public function update_membership(Request $request, $id)
    {
        $memberlist = MembershipModel::find($id);
        $memberlist->update([
                'alt_tag' => $request->input('alt_tag')
            ]);
        return redirect('admin/membership');
    }

    public function delete_membership($id)
    {
        $memberlist = MembershipModel::find($id);
        $path = Session::get('useradmin')['site_url'].'backend/membership/' . $memberlist->image;
        $memberlist->delete();
        if(file_exists($path)) {
            unlink($path);
        }
        return redirect('admin/membership');
    }
}
