<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\SeoPageModel;
use App\Models\SiteMapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteMapController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }

    public function index()
    {
        $data['view'] = SiteMapModel::where('status','active')->where('sitemap_status','publish')->first();
        if(isset($data['view']->sitemap_id)){
        Session::put('primeid', $data['view']->sitemap_id);
        }
        return view('admin.sitemap.add-sitemap')->with($data);
    }

    // public function getactive(Request $request)
    // {
    //     $id = $request->input('id');
    //     $sitemap = SiteMapModel::find($id);
    //     $sitemap->update($request->input());
    // }

    // public function add()
    // {
    //     $data['view'] = SiteMapModel::find(session('primeid'));
    //     return view('admin.sitemap.add-sitemap')->with($data);
    // }

    public function create_sitemap(Request $request)
    {
        $sitemap_id = $request->input('sitemap_id');
        if($sitemap_id < 1){
        $sitemap = SiteMapModel::create(array_merge($request->input(),
        [
            'sitemap_status' => 'publish',
        ]
    ));
        Session::put('primeid', $sitemap->sitemap_id);
        }else{
            $sitemaplist = SiteMapModel::find($sitemap_id);
            $sitemaplist->update(array_merge($request->input(),
                [
                    'sitemap_status' => 'publish',
                ]
            ));
            }
        return redirect('admin/sitemap');
    }

    public function robots()
    {
        $data['view'] = SiteMapModel::where('status','active')->where('sitemap_status','publish')->first();
        if(isset($data['view']->sitemap_id)){
        Session::put('primeid', $data['view']->sitemap_id);
        }
        return view('admin.robots.add-robots')->with($data);
    }

    public function create_robots(Request $request)
    {
        $sitemap_id = $request->input('sitemap_id');
        if($sitemap_id < 1){
        $sitemap = SiteMapModel::create(array_merge($request->input(),
        [
            'sitemap_status' => 'publish',
        ]
    ));
        Session::put('primeid', $sitemap->sitemap_id);
        }else{
            $sitemaplist = SiteMapModel::find($sitemap_id);
            $sitemaplist->update(array_merge($request->input(),
                [
                    'sitemap_status' => 'publish',
                ]
            ));
            }
        return redirect('admin/robots');
    }

}
