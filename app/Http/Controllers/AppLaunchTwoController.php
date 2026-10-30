<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Models\SiteMapModel;
use Illuminate\Support\Facades\Session;

class AppLaunchTwoController extends Controller
{
    public function __construct(Helpers $siteurl)
    {      
       $this->siteurl = $siteurl;
    }

    public function sitemapxml(){
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $sitemap = SiteMapModel::where('status','active')->where('sitemap_status','publish')->first();
        if(!$sitemap || empty($sitemap->sitemapxml)){
            $defaultXml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n  <url><loc>" . url('/') . "</loc><changefreq>weekly</changefreq><priority>1.0</priority></url>\n</urlset>";
            return response($defaultXml, 200)->header('Content-Type', 'text/xml');
        }

        return response($sitemap->sitemapxml, 200)
            ->header('Content-Type', 'text/xml');
    }

    public function robot(){
        $siteview = Helpers::orgnizationlist();
        $this->initializeSession($siteview->first());

        $sitemap = SiteMapModel::where('status','active')->where('sitemap_status','publish')->first();
        $robotsContent = ($sitemap && !empty($sitemap->robots))
            ? $sitemap->robots
            : "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml');

        return response($robotsContent, 200)
            ->header('Content-Type', 'text/plain');
    }

    private static function initializeSession($result)
    {
        $urlpathget = Helpers::frontpathurl();
        // print_r($result);
        $site_url = request()->root().'/template/'.$urlpathget.'/';
        //set session userinfo
        Session::put('userorginfo', [
            'org_id' => $result->org_id,
            'site_id' => $result->site_id,
            'site_url' => $site_url,
        ]);
    }

}
