<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\GalleryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
        
        $select_table = ['gallery_name','gallery_id', 'gallery_image','gallery_show_type', 'full_image', 'alt_tag', 'status','gallery_status'];
        $query = GalleryModel::select($select_table);
        $data['view'] = $query->get();
        $data['count'] = $query->count();
        return view('admin.gallery.list-gallery')->with($data);
    }

    public function add()
    {
        $data = GalleryModel::find(session('primeid'));
        return view('admin.gallery.add-gallery',['view' => $data]);
    }

    public function create_gallery(Request $request)
    {

       
        $destinationPath = 'backend/gallery';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if ($request->hasFile('gallery_image')) {
            $image = $request->file('gallery_image');
            $gallery_img = time() . '_thumb.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gallery_img);
        }else{
            $gallery_img = $request->input('oldgallery_image');
        }

        if ($request->hasFile('full_image')) {
            $image = $request->file('full_image');
            $gallery_full_image = time() . '_full.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gallery_full_image);
        }else{
            $gallery_full_image = $request->input('oldfull_image');
        }

        $gallery_id = $request->input('gallery_id');
        if($gallery_id < 1){
            $gallery = GalleryModel::create(array_merge(
            $request->input(),
            [
                'gallery_image' => $gallery_img,
                'full_image' => $gallery_full_image,
                'gallery_name' =>  $request->input('gallery_name')
            ]
        ));
        Session::put('primeid', $gallery->gallery_id);
    }else{
        $gallerydata = GalleryModel::find($gallery_id);
       
        $gallerydata->update(array_merge($request->input(),
            [
                'gallery_key' => $gallerydata->gallery_key,
                'gallery_image' => $gallery_img,
                'full_image' => $gallery_full_image,
                'gallery_name' =>  $request->input('gallery_name')
            ]
        ));// dd($gallerydata);
        }
        return redirect('admin/gallery');
    }

   
    public function edit_gallery($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = GalleryModel::find($id);
        return view('admin.gallery.edit-gallery')->with($data);
    }

    public function update_gallery(Request $request, $id)
    {
        $faqdetail = GalleryModel::find($id);
        $faqdetail->update($request->input());
        return redirect('admin/gallery');
    }

    public function delete_gallery($id)
    {
        $data = GalleryModel::find($id);
        $data->update(['deleted_by' => session('useradmin')['usr_id']]);
        $data->delete();
        return redirect('admin/gallery');
    }
}
