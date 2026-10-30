<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\BlogModel;
use App\Models\FrontMenuModel;
use App\Models\SeoPageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
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

        $select_table = ['blg_id', 'name','blog_show_type', 'dr_description','blog_name','short_desc', 'blog_description','blog_image','alt_image_name','blog_image_inner','tags','title_tag','keyword_tag','description_tag','canonical','url','status','blog_status','date'];
        $data['view'] = BlogModel::select($select_table)->get();
        return view('admin.blog.list-blogs')->with($data);
    }

    public function getactive(Request $request)
    {
        $id = $request->input('id');
        $bloglist = BlogModel::find($id);
        $bloglist->update($request->input());
    }

    public function add()
    {
        $data['view'] = BlogModel::find(session('primeid'));
        if(isset($data['view']->url)){
            $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
            ->where('url', $data['view']->url)->where('seo_type', 'blogdetails')->first();
            }
        return view('admin.blog.add-blogs')->with($data);
    }

    public function uploadimage(Request $request)

    {

        $destinationPath = $this->siteurl->sessionget().'backend/blog';
    //     $destinationPath = 'upload';


        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        if($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName.'_'.time().'.'.$extension;

        

            $request->file('upload')->move($destinationPath, $fileName);

   

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            // $url = asset('images/'.$fileName); 
            $url = '/'.$destinationPath.'/'.$fileName;
            $msg = 'Image uploaded successfully'; 

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";

               

            @header('Content-type: text/html; charset=utf-8'); 

            echo $response;

        }

    }

    public function create_blogs(Request $request)
    {
        $destinationPath = 'backend/blog';

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        // print_r($request->input());die();
        if ($request->hasFile('blog_img')) {
            $image = $request->file('blog_img');
            $blog_img = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $blog_img);
        } else {
            $blog_img = $request->input('oldblog_img');
        }

        if ($request->hasFile('blog_image_inner')) {
            $image = $request->file('blog_image_inner');
            $blog_img2 = time() . '_banner.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $blog_img2);
        } else {
            $blog_img2 = $request->input('oldblog_image_inner');
        }
        // echo $blog_img;
        // die();
        $blg_id = $request->input('blg_id');
        if($blg_id < 1){
       $blog = BlogModel::create(array_merge(
                $request->input(),
                [
                'blog_image' => $blog_img,
                'blog_image_inner' => $blog_img2,
                ]            
    ));
    Session::put('primeid', $blog->blg_id);
}else{
    $blogdata = BlogModel::find($blg_id);
    $blogdata->update(array_merge($request->input(),
        [
            'blog_key' => $blogdata->blog_key,
            'blog_image' => $blog_img,
            'blog_image_inner' => $blog_img2,
        ]
    ));
    }

    if($request->input('url') != '#'){
        $dataseo = [
            'seo_type' => 'blogcategory',
            'page_name' => $request->input('blog_name'),
            'title_tag' => $request->input('title_tag'),
            'keyword_tag' => $request->input('keyword_tag'),
            'description_tag' => $request->input('description_tag'),
            'canonical_tag' => $request->input('canonical'),
            'image' => $blog_img,
            'type' => $request->input('type'),
            'site_name' => $request->input('site_name'),
            'url' => $request->input('url')
        ];
        $seo = SeoPageModel::where('url',$request->input('oldurl'))->where('seo_type','blogdetails')->where('seo_status','preview');
        // echo $seo->count();
        // die();
        if($seo->count() < 1){
        SeoPageModel::create(array_merge($dataseo,['created_by' => session('useradmin')['usr_id']]));
        }else{
            $seo->update(array_merge($dataseo,[
                'updated_by' => session('useradmin')['usr_id'],
                'seo_key' => $seo->first()->seo_key,
                ]));
        }
    }
    
    $frontmenu = FrontMenuModel::where('urllink',$request->input('oldurl'))->where('menu_status','preview');
          
                if($frontmenu->count() > 0){
                    $frontmenu->update(array_merge([
                        'updated_by' => session('useradmin')['usr_id'],
                        'urllink' => $request->input('url')
                    ]));
                }

        return redirect('admin/blogs');
    }

    public function edit_blogs($id)
    {
        Session::put('primeid', $id);
        $data['edit'] = BlogModel::find($id);
        $data['seotag'] = SeoPageModel::select('title_tag', 'keyword_tag','description_tag','canonical_tag','url')
        ->where('url', $data['edit']->url)->where('seo_type', 'blogdetails')->first();
        return view('admin.blog.edit-blogs')->with($data);
    }

    public function delete_blogs($id)
    {
        $blog = BlogModel::find($id);
        $blog->update(['deleted_by' => session('useradmin')['usr_id']]);
        $blog->delete();
        return redirect('admin/blogs');
    }
}
