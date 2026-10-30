<?php 
namespace App\Traits;

use App\Models\FrontMenuModel;
use App\Models\ResultServiceModel;
use App\Models\ServiceModel;
use App\Models\SiteMasterModel;
use App\Models\VideoCategoryModel;
use App\Models\VideoServiceModel;
use Illuminate\Support\Facades\Auth;

class CategoryTrait{

    public static function allcategorylist($parent_id){
       
        $service = ServiceModel::tree();
        foreach ($service as $servicelist) {
            //$data['fifthcatlistgroup'][] = $servicelist;
            if ($servicelist->ser_id == $parent_id) {
                $secondsec = [
                    'firstser_id' => $servicelist->ser_id,
                    'firstservice_name' => $servicelist->service_name,
                ];
            }
            foreach ($servicelist->children as $secondlist) {
                if ($secondlist->ser_id == $parent_id) {
                    $secondsec = [
                        'firstser_id' => $servicelist->ser_id,
                        'firstservice_name' => $servicelist->service_name,
                        'secser_id' => $secondlist->ser_id,
                        'secservice_name' => $secondlist->service_name,
                    ];
                }
                foreach ($secondlist->children as $thirdlist) {
                    if ($thirdlist->ser_id == $parent_id) {
                        $secondsec = [
                            'firstser_id' => $servicelist->ser_id,
                            'firstservice_name' => $servicelist->service_name,
                            'secser_id' => $secondlist->ser_id,
                            'secservice_name' => $secondlist->service_name,
                            'threeser_id' => $thirdlist->ser_id,
                            'threeservice_name' => $thirdlist->service_name,
                        ];
                    }
                    foreach ($thirdlist->children as $fourthlist) {
                        if ($fourthlist->ser_id == $parent_id) {
                           // $data['fifthcatlistgroup'] = $servicelist;
                            $secondsec = [
                                'firstser_id' => $servicelist->ser_id,
                                'firstservice_name' => $servicelist->service_name,
                                'secser_id' => $secondlist->ser_id,
                                'secservice_name' => $secondlist->service_name,
                                'threeser_id' => $thirdlist->ser_id,
                                'threeservice_name' => $thirdlist->service_name,
                                'fourser_id' => $fourthlist->ser_id,
                                'fourservice_name' => $fourthlist->service_name,
                            ];
                        }
                        foreach ($fourthlist->children as $fifthlist) {
                            // print_r($fifthlist->ser_id);
                            //echo '<pre>';print_r($fifthlist);echo '</pre>';
                            if ($fifthlist->ser_id == $parent_id) {
                                $secondsec = [
                                    'firstser_id' => $servicelist->ser_id,
                                    'firstservice_name' => $servicelist->service_name,
                                    'secser_id' => $secondlist->ser_id,
                                    'secservice_name' => $secondlist->service_name,
                                    'threeser_id' => $thirdlist->ser_id,
                                    'threeservice_name' => $thirdlist->service_name,
                                    'fourser_id' => $fourthlist->ser_id,
                                    'fourservice_name' => $fourthlist->service_name,
                                    'fifser_id' => $fifthlist->ser_id,
                                    'fifservice_name' => $fifthlist->service_name
                                ];
                               // echo '<pre>'; print_r($secondsec); echo '</pre>';
                            }

                            foreach ($fifthlist->children as $servicelistsec) {
                                // print_r($fifthlist->ser_id);
                                //echo '<pre>';print_r($fifthlist);echo '</pre>';
                                if ($servicelistsec->ser_id == $parent_id) {
                                    $secondsec = [
                                        'firstser_id' => $servicelist->ser_id,
                                        'firstservice_name' => $servicelist->service_name,
                                        'secser_id' => $secondlist->ser_id,
                                        'secservice_name' => $secondlist->service_name,
                                        'threeser_id' => $thirdlist->ser_id,
                                        'threeservice_name' => $thirdlist->service_name,
                                        'fourser_id' => $fourthlist->ser_id,
                                        'fourservice_name' => $fourthlist->service_name,
                                        'fifser_id' => $fifthlist->ser_id,
                                        'fifservice_name' => $fifthlist->service_name,
                                        'service_id' => $servicelistsec->ser_id,
                                        'service_name' => $servicelistsec->service_name
                                    ];
                                   // echo '<pre>'; print_r($secondsec); echo '</pre>';
                                }
                            }
                        }
                    }
                }
            }
        }
// print_r($secondsec);

if(isset($secondsec)){
    return $secondsec;
}else{
    return $secondsec = [
        'firstser_id' => '',
        'firstservice_name' => '',
        'secser_id' => '',
        'secservice_name' => '',
        'threeser_id' => '',
        'threeservice_name' => '',
        'fourser_id' => '',
        'fourservice_name' => '',
        'fifser_id' => '',
        'fifservice_name' => '',
        'service_id' => '',
        'service_name' => ''
    ];
}
       
    }

    public static function allresultcategorylist($parent_id){
        
        $service = ResultServiceModel::tree();
        // print_r($service);
        foreach ($service as $servicelist) {
            //$data['fifthcatlistgroup'][] = $servicelist;
            if ($servicelist->res_ser_id == $parent_id) {
                $secondsec = [
                    'firstser_id' => $servicelist->res_ser_id,
                    'firstservice_name' => $servicelist->name,
                ];
            }
            foreach ($servicelist->children as $secondlist) {
                if ($secondlist->res_ser_id == $parent_id) {
                    $secondsec = [
                        'firstser_id' => $servicelist->res_ser_id,
                        'firstservice_name' => $servicelist->name,
                        'secser_id' => $secondlist->res_ser_id,
                        'secservice_name' => $secondlist->name,
                    ];
                }
                foreach ($secondlist->children as $thirdlist) {
                    if ($thirdlist->res_ser_id == $parent_id) {
                        $secondsec = [
                            'firstser_id' => $servicelist->res_ser_id,
                            'firstservice_name' => $servicelist->name,
                            'secser_id' => $secondlist->res_ser_id,
                            'secservice_name' => $secondlist->name,
                            'threeser_id' => $thirdlist->res_ser_id,
                            'threeservice_name' => $thirdlist->name,
                        ];
                    }
                    foreach ($thirdlist->children as $fourthlist) {
                        if ($fourthlist->res_ser_id == $parent_id) {
                           // $data['fifthcatlistgroup'] = $servicelist;
                            $secondsec = [
                                'firstser_id' => $servicelist->res_ser_id,
                                'firstservice_name' => $servicelist->name,
                                'secser_id' => $secondlist->res_ser_id,
                                'secservice_name' => $secondlist->name,
                                'threeser_id' => $thirdlist->res_ser_id,
                                'threeservice_name' => $thirdlist->name,
                                'fourser_id' => $fourthlist->res_ser_id,
                                'fourservice_name' => $fourthlist->name,
                            ];
                        }
                        foreach ($fourthlist->children as $fifthlist) {
                            // print_r($fifthlist->res_ser_id);
                            //echo '<pre>';print_r($fifthlist);echo '</pre>';
                            if ($fifthlist->res_ser_id == $parent_id) {
                                $secondsec = [
                                    'firstser_id' => $servicelist->res_ser_id,
                                    'firstservice_name' => $servicelist->name,
                                    'secser_id' => $secondlist->res_ser_id,
                                    'secservice_name' => $secondlist->name,
                                    'threeser_id' => $thirdlist->res_ser_id,
                                    'threeservice_name' => $thirdlist->name,
                                    'fourser_id' => $fourthlist->res_ser_id,
                                    'fourservice_name' => $fourthlist->name,
                                    'fifser_id' => $fifthlist->res_ser_id,
                                    'fifservice_name' => $fifthlist->name
                                ];
                               // echo '<pre>'; print_r($secondsec); echo '</pre>';
                            }

                            foreach ($fifthlist->children as $servicelistsec) {
                                // print_r($fifthlist->res_ser_id);
                                //echo '<pre>';print_r($fifthlist);echo '</pre>';
                                if ($servicelistsec->res_ser_id == $parent_id) {
                                    $secondsec = [
                                        'firstser_id' => $servicelist->res_ser_id,
                                        'firstservice_name' => $servicelist->name,
                                        'secser_id' => $secondlist->res_ser_id,
                                        'secservice_name' => $secondlist->name,
                                        'threeser_id' => $thirdlist->res_ser_id,
                                        'threeservice_name' => $thirdlist->name,
                                        'fourser_id' => $fourthlist->res_ser_id,
                                        'fourservice_name' => $fourthlist->name,
                                        'fifser_id' => $fifthlist->res_ser_id,
                                        'fifservice_name' => $fifthlist->name,
                                        'service_id' => $servicelistsec->res_ser_id,
                                        'service_name' => $servicelistsec->name
                                    ];
                                   // echo '<pre>'; print_r($secondsec); echo '</pre>';
                                }
                            }
                        }
                    }
                }
            }
        }
// print_r($secondsec);
if(isset($secondsec)){
    return $secondsec;
}else{
    return $secondsec = [
        'firstser_id' => '',
        'firstservice_name' => '',
        'secser_id' => '',
        'secservice_name' => '',
        'threeser_id' => '',
        'threeservice_name' => '',
        'fourser_id' => '',
        'fourservice_name' => '',
        'fifser_id' => '',
        'fifservice_name' => '',
        'service_id' => '',
        'service_name' => ''
    ];
}
    }

    public static function allvideocategorylist($parent_id){
        
        $service = VideoCategoryModel::tree();
        // print_r($service);
        foreach ($service as $servicelist) {
            //$data['fifthcatlistgroup'][] = $servicelist;
            if ($servicelist->vid_ser_id == $parent_id) {
                $secondsec = [
                    'firstser_id' => $servicelist->vid_ser_id,
                    'firstservice_name' => $servicelist->name,
                ];
            }
            foreach ($servicelist->children as $secondlist) {
                if ($secondlist->vid_ser_id == $parent_id) {
                    $secondsec = [
                        'firstser_id' => $servicelist->vid_ser_id,
                        'firstservice_name' => $servicelist->name,
                        'secser_id' => $secondlist->vid_ser_id,
                        'secservice_name' => $secondlist->name,
                    ];
                }
                foreach ($secondlist->children as $thirdlist) {
                    if ($thirdlist->vid_ser_id == $parent_id) {
                        $secondsec = [
                            'firstser_id' => $servicelist->vid_ser_id,
                            'firstservice_name' => $servicelist->name,
                            'secser_id' => $secondlist->vid_ser_id,
                            'secservice_name' => $secondlist->name,
                            'threeser_id' => $thirdlist->vid_ser_id,
                            'threeservice_name' => $thirdlist->name,
                        ];
                    }
                    foreach ($thirdlist->children as $fourthlist) {
                        if ($fourthlist->vid_ser_id == $parent_id) {
                           // $data['fifthcatlistgroup'] = $servicelist;
                            $secondsec = [
                                'firstser_id' => $servicelist->vid_ser_id,
                                'firstservice_name' => $servicelist->name,
                                'secser_id' => $secondlist->vid_ser_id,
                                'secservice_name' => $secondlist->name,
                                'threeser_id' => $thirdlist->vid_ser_id,
                                'threeservice_name' => $thirdlist->name,
                                'fourser_id' => $fourthlist->vid_ser_id,
                                'fourservice_name' => $fourthlist->name,
                            ];
                        }
                        foreach ($fourthlist->children as $fifthlist) {
                            // print_r($fifthlist->vid_ser_id);
                            //echo '<pre>';print_r($fifthlist);echo '</pre>';
                            if ($fifthlist->vid_ser_id == $parent_id) {
                                $secondsec = [
                                    'firstser_id' => $servicelist->vid_ser_id,
                                    'firstservice_name' => $servicelist->name,
                                    'secser_id' => $secondlist->vid_ser_id,
                                    'secservice_name' => $secondlist->name,
                                    'threeser_id' => $thirdlist->vid_ser_id,
                                    'threeservice_name' => $thirdlist->name,
                                    'fourser_id' => $fourthlist->vid_ser_id,
                                    'fourservice_name' => $fourthlist->name,
                                    'fifser_id' => $fifthlist->vid_ser_id,
                                    'fifservice_name' => $fifthlist->name
                                ];
                               // echo '<pre>'; print_r($secondsec); echo '</pre>';
                            }

                            foreach ($fifthlist->children as $servicelistsec) {
                                // print_r($fifthlist->vid_ser_id);
                                //echo '<pre>';print_r($fifthlist);echo '</pre>';
                                if ($servicelistsec->vid_ser_id == $parent_id) {
                                    $secondsec = [
                                        'firstser_id' => $servicelist->vid_ser_id,
                                        'firstservice_name' => $servicelist->name,
                                        'secser_id' => $secondlist->vid_ser_id,
                                        'secservice_name' => $secondlist->name,
                                        'threeser_id' => $thirdlist->vid_ser_id,
                                        'threeservice_name' => $thirdlist->name,
                                        'fourser_id' => $fourthlist->vid_ser_id,
                                        'fourservice_name' => $fourthlist->name,
                                        'fifser_id' => $fifthlist->vid_ser_id,
                                        'fifservice_name' => $fifthlist->name,
                                        'service_id' => $servicelistsec->vid_ser_id,
                                        'service_name' => $servicelistsec->name
                                    ];
                                   // echo '<pre>'; print_r($secondsec); echo '</pre>';
                                }
                            }
                        }
                    }
                }
            }
        }
// print_r($secondsec);
if(isset($secondsec)){
    return $secondsec;
}else{
    return $secondsec = [
        'firstser_id' => '',
        'firstservice_name' => '',
        'secser_id' => '',
        'secservice_name' => '',
        'threeser_id' => '',
        'threeservice_name' => '',
        'fourser_id' => '',
        'fourservice_name' => '',
        'fifser_id' => '',
        'fifservice_name' => '',
        'service_id' => '',
        'service_name' => ''
    ];
}
    }

    public static function allmenulist($parent_id){
        
        $menu = FrontMenuModel::tree();
        // print_r($menu);
        foreach ($menu as $menulist) {
            if ($menulist->mnu_id == $parent_id) {
                $secondsec = [
                    'firstmenu_id' => $menulist->mnu_id,
                    'firstmenu_name' => $menulist->name,
                ];
            }
            foreach ($menulist->children as $secondlist) {
                if ($secondlist->mnu_id == $parent_id) {
                    $secondsec = [
                        'firstmenu_id' => $menulist->mnu_id,
                        'firstmenu_name' => $menulist->name,
                        'secmenu_id' => $secondlist->mnu_id,
                        'secmenu_name' => $secondlist->name,
                    ];
                }
                foreach ($secondlist->children as $thirdlist) {
                    if ($thirdlist->mnu_id == $parent_id) {
                        $secondsec = [
                            'firstmenu_id' => $menulist->mnu_id,
                            'firstmenu_name' => $menulist->name,
                            'secmenu_id' => $secondlist->mnu_id,
                            'secmenu_name' => $secondlist->name,
                            'threemenu_id' => $thirdlist->mnu_id,
                            'threemenu_name' => $thirdlist->name,
                        ];
                    }
                    foreach ($thirdlist->children as $fourthlist) {
                        if ($fourthlist->mnu_id == $parent_id) {
                            $secondsec = [
                                'firstmenu_id' => $menulist->mnu_id,
                                'firstmenu_name' => $menulist->name,
                                'secmenu_id' => $secondlist->mnu_id,
                                'secmenu_name' => $secondlist->name,
                                'threemenu_id' => $thirdlist->mnu_id,
                                'threemenu_name' => $thirdlist->name,
                                'fourmenu_id' => $fourthlist->mnu_id,
                                'fourmenu_name' => $fourthlist->name,
                            ];
                        }
                        foreach ($fourthlist->children as $fifthlist) {
                            if ($fifthlist->mnu_id == $parent_id) {
                                $secondsec = [
                                    'firstmenu_id' => $menulist->mnu_id,
                                    'firstmenu_name' => $menulist->name,
                                    'secmenu_id' => $secondlist->mnu_id,
                                    'secmenu_name' => $secondlist->name,
                                    'threemenu_id' => $thirdlist->mnu_id,
                                    'threemenu_name' => $thirdlist->name,
                                    'fourmenu_id' => $fourthlist->mnu_id,
                                    'fourmenu_name' => $fourthlist->name,
                                    'fifmenu_id' => $fifthlist->mnu_id,
                                    'fifmenu_name' => $fifthlist->name
                                ];
                            }

                            foreach ($fifthlist->children as $menulistsec) {
                                if ($menulistsec->mnu_id == $parent_id) {
                                    $secondsec = [
                                        'firstmenu_id' => $menulist->mnu_id,
                                        'firstmenu_name' => $menulist->name,
                                        'secmenu_id' => $secondlist->mnu_id,
                                        'secmenu_name' => $secondlist->name,
                                        'threemenu_id' => $thirdlist->mnu_id,
                                        'threemenu_name' => $thirdlist->name,
                                        'fourmenu_id' => $fourthlist->mnu_id,
                                        'fourmenu_name' => $fourthlist->name,
                                        'fifmenu_id' => $fifthlist->mnu_id,
                                        'fifmenu_name' => $fifthlist->name,
                                        'menu_id' => $menulistsec->mnu_id,
                                        'menu_name' => $menulistsec->name
                                    ];
                                }
                            }
                        }
                    }
                }
            }
        }
// print_r($secondsec);
if(isset($secondsec)){
    return $secondsec;
}else{
    return $secondsec = [
        'firstmenu_id' => '',
        'firstmenu_name' => '',
        'secmenu_id' => '',
        'secmenu_name' => '',
        'threemenu_id' => '',
        'threemenu_name' => '',
        'fourmenu_id' => '',
        'fourmenu_name' => '',
        'fifmenu_id' => '',
        'fifmenu_name' => '',
        'menu_id' => '',
        'menu_name' => ''
    ];
}
    }


}