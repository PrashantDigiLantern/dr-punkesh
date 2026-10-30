@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
$rand = rand(9999, 99999);
@endphp
<style>
.sectionservice{
    display: inline-block;
    width: 100%;
    border: 2px solid #4444445c;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-radius: 8px;

}
    </style>
<div id="main">

<section id="main-content">
    <section class="wrapper">
	
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Service</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service')}}">Services</a></li>
                        <li><a href="{{url('/admin/service')}}">Services List</a></li>
                        <li class="active">Edit Service</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_service')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<div class="container">
            <div class="card">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="ser_id" id="ser_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <input type="hidden" name="category_type" value="service">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col s6">
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Page Type</label>
                            <select class="form-control" name="banner_show" required>
                                <option value="">Select Type</option>
                                <option value="banner" @if(isset($edit->banner_show))@if($edit->banner_show=='banner') selected @endif @endif>Banner</option>
                                <option value="withoutbanner" @if(isset($edit->banner_show))@if($edit->banner_show=='withoutbanner') selected @endif @else selected @endif>Without Banner</option>
                                <option value="both" @if(isset($edit->banner_show))@if($edit->banner_show=='both') selected @endif @endif>Both</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col s6 paddingL0">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="show_type" id="showtype" required onclick="serviceshowtype()">
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($edit->show_type))@if($edit->show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($edit->show_type))@if($edit->show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col s6">
                                <label class="control-label">Select Design Type</label>
                                <select class="form-control" id="design_type" name="design_type">
                                    <option value="">Select Design Type</option>
                                    <option value="left" @if(isset($edit->design_type))@if($edit->design_type=='left') selected @endif @endif>Left Side Image</option>
                                    <option value="right" @if(isset($edit->design_type))@if($edit->design_type=='right') selected @endif @endif>Right Side Image</option>
                                </select>
                            </div>
                            @if(in_array('16',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Service Category</label>
                            <select class="form-control" name="service_cat" id="servicecategory" onchange="ServiceCategory()">
                                <option value="">Select Category</option>
                                 @foreach($firstcategory as $firstcategorylist)
                                <option value="@if(isset($firstcategorylist->ser_id)){{$firstcategorylist->ser_id}}@endif" @if(isset($edit->ser_id))@if($firstcategorylist->ser_id == $secondsec['firstser_id']) selected @endif @endif>{{$firstcategorylist->service_name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        @if(in_array('36',$permissionoprid))
                    <div class="form-group col-md-4 col s4">
                            <label class="control-label">Second Category</label>
                            <select class="form-control" name="second_cat" id="secondcategory" onchange="SecondCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['secservice_name']))
                                <option value="{{$secondsec['secser_id']}}" selected>{{$secondsec['secservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('37',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Third Category</label>
                            <select class="form-control" name="third_cat" id="thirdcategory" onchange="ThirdCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['threeservice_name']))
                                <option value="{{$secondsec['threeser_id']}}" selected>{{$secondsec['threeservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('38',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Fourth Category</label>
                            <select class="form-control" name="fourt_cat" id="fourthcategory" onchange="FourthCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fourservice_name']))
                                <option value="{{$secondsec['fourser_id']}}" selected>{{$secondsec['fourservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('39',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Fifth Category Name</label>
                            <select class="form-control" name="fifth_cat" id="fifthcategory">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fifservice_name']))
                                <option value="{{$secondsec['fifser_id']}}" selected>{{$secondsec['fifservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @endif
                        @endif
                        @endif
                        @endif
                        @endif
                            <div class="form-group col-sm-6 col s6 paddingL0">
                                <label>Service Name</label>
                                <input class="form-control" value="{{$edit->service_name}}" name="service_name" type="text">
                            </div>
                            <div class="form-group col-md-6 col s6">
                                <label class="control-label">Service Video Type</label>
                                <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                    <option value="">Select Type</option>
                                    <option value="image" @if($edit->video_type=='image') selected @endif>Image</option>
                                    <option value="link" @if($edit->video_type=='link') selected @endif>Youtube Link</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col s6 videolink" style="display:none;">
                                <label>Service Youtube Link</label>
                                <input class="form-control" value="{{$edit->video_link}}" name="video_link" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                @if($edit->service_image==NULL || $edit->service_image=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/image/'.$edit->service_image)}}" style="width: 85px;height: 85px;"><br>
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Service Image</label>
                                    <input class="form-control" name="service_image" type="file">
                                    <input class="form-control" name="oldservice_image" value="{{$edit->service_image}}" type="hidden">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col s6">
                                <div id="videosec">
                                    @if($edit->service_banner_image=='' || $edit->service_banner_image==NULL)
                                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                    @else
                                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$edit->service_banner_image)}}" style="width: 85px;height: 85px;">
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label videoupload">Banner Image</label>
                                        <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                        <input class="form-control" name="service_banner_image" type="file">
                                        <input class="form-control" name="oldservice_banner_image" value="{{$edit->service_banner_image}}" type="hidden">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-12 col s12">
                            <label>Sort Descrition</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3">{{$edit->short_desc}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-12 col s12">
                            <label>Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>
                        
                        @if($edit->show_type=='outside')
                        <div class="form-group col-md-4 col s4">
                            @if(isset($edit->home_banner_image))
                            @if($edit->home_banner_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$edit->home_banner_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                                <label class="control-label">Home Service Image</label>
                                <input class="form-control" name="home_banner_image" type="file">
                                <input class="form-control" name="oldhome_banner_image" value="@if(isset($edit->home_banner_image)) {{$edit->home_banner_image}} @endif" type="hidden">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label class="control-label">Home Service Description</label>
                            <textarea class="form-control ckeditor" name="homedescription" rows="3">@if(isset($edit->homedescription)) {{$edit->homedescription}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        @else
                        <div class="form-group col-md-4 col s4 homeservice" style="display: none;">
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            <div class="form-group">
                            <label class="control-label">Home Service Image</label>
                                <input class="form-control" name="home_banner_image" type="file">
                                <input class="form-control" name="oldhome_banner_image" value="@if(isset($edit->home_banner_image)) {{$edit->home_banner_image}} @endif" type="hidden">
                            </div>
                        </div>
                        <div class="form-group col-md-12  col s12 homeservice" style="display: none;">
                            <label class="control-label">Home Service Description</label>
                            <textarea class="form-control ckeditor" name="homedescription" rows="3">@if(isset($edit->homedescription)) {{$edit->homedescription}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        @endif


                        <?php $seccount = '0';?>
                    @if(isset($edit->section))
                    <?php
                    $sersection = json_decode($edit->section); 
                    $sersectionorder = collect($sersection)->sortBy('secorderby');
                        $seccount = count($sersection);
                    // echo '<pre>';print_r($sersectionorder);echo '</pre>';
                    //  $sersection = $sersection->menuname;
                    // $sersection = collect($footerlistsec)->sortBy('menu_order_by');
                    $i=1;
                    ?>
                    @foreach($sersectionorder as $key => $sersectionlist)
                    <?php 
                    // echo $i;
                        $rand = rand('9999','99999');
                        
                    ?>
                    <div id="removesec{{$rand}}" class="sectionservice">
                    <input class="form-control"  name="service_type[]" value="@if(isset($sersectionlist->type)){{$sersectionlist->type}}@endif" type="hidden">
                    <div class="form-group col-md-12 col s12">
                    <input type="text" class="form-control orderby{{$rand}}" value="@if(isset($sersectionlist->secorderby)){{$sersectionlist->secorderby}}@endif" name="secorderby[]">
                    <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removesec('{{$rand}}','{{$key}}')">-</button>
                    </div>
                    <div class="form-group col-md-12 col s12">
                      <label class="control-label">Section Heading</label> 
                      <input class="form-control"  name="service_heading[]" value="@if(isset($sersectionlist->service_heading)){{$sersectionlist->service_heading}}@endif" type="text">
                      
                      <input type="hidden" name="servicesection[]" value="servicesection">
                      </div>
                      <div class="form-group col-md-12 col s12">
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Select Button Type</label> 
                      <select class="form-control" id="button_type{{$rand}}" name="button_type[]" onchange="buttontype('{{$rand}}')">
                          <option value="">Select Button Type</option>
                          <option value="Yes" @if(isset($sersectionlist->button_type)) @if($sersectionlist->button_type == 'Yes') selected @endif @endif>Yes</option>
                          <option value="No" @if(isset($sersectionlist->button_type)) @if($sersectionlist->button_type == 'No') selected @endif @else selected @endif>No</option>
                      </select>
                      </div>
                      <div class="showtype{{$rand}}" style="<?php if(isset($sersectionlist->button_type)){ if($sersectionlist->button_type == 'Yes'){ echo 'display: block';}else{echo 'display: none';} }else{echo 'display: none'; }?>">
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Button Name</label> 
                      <input class="form-control"  name="button_name[]" value="@if(isset($sersectionlist->button_name)){{$sersectionlist->button_name}}@endif" type="text">
                      </div>
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Button Url</label> 
                      <input class="form-control"  name="button_url[]" value="@if(isset($sersectionlist->button_url)){{$sersectionlist->button_url}}@endif" type="text">
                      </div>
                      <div class="form-group col-md-12 col s12">
                      <label class="control-label">Button Style</label> 
                      <textarea class="form-control"  name="button_style[]">@if(isset($sersectionlist->button_style)){{$sersectionlist->button_style}}@endif</textarea>
                      </div>
                      </div>
                      
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Select Section Appointment Form</label> 
                      <select class="form-control" name="appointment_side[]">
                          <option value="">Select Button Type</option>
                          <option value="upper" @if(isset($sersectionlist->appointment_side)) @if($sersectionlist->appointment_side == 'upper') selected @endif @else selected @endif>Upper Side</option>
                          <option value="down" @if(isset($sersectionlist->appointment_side)) @if($sersectionlist->appointment_side == 'down') selected @endif @endif>Down Side</option>
                      </select>
                      </div>
                      </div>
                      <div class="form-group col-md-12 col s12">
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Select Background Type</label> 
                      <select class="form-control" id="bg_type{{$rand}}" name="bg_type[]" onchange="bgtypeimage('{{$rand}}')">
                          <option value="">Select Background Type</option>
                          <option value="white" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'white') selected @endif @else selected @endif>White</option>
                          <option value="bgcolor" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'bgcolor') selected @endif @endif>Background Color</option>
                          <option value="bgimage" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'bgimage') selected @endif @endif>Background Image</option>
                      </select>
                      </div>

                      @if($sersectionlist->type=='tabparagraph' || $sersectionlist->type=='sectiontabparagraph')
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Select Tab</label> 
                      <select class="form-control" id="tab_type{{$rand}}" name="tab_type[]">
                          <option value="">Select Tab Type</option>
                          <option value="yes" @if(isset($sersectionlist->tab_type)) @if($sersectionlist->tab_type == 'yes') selected @endif @else selected @endif>Yes</option>
                          <option value="no" @if(isset($sersectionlist->tab_type)) @if($sersectionlist->tab_type == 'no') selected @endif @endif>No</option>
                      </select>
                      </div>
                      @else
                      <input type="hidden" name="tab_type[]">
                      @endif

                      <div class="bgcolor{{$rand}}" style="<?php if(isset($sersectionlist->bg_type)){ if($sersectionlist->bg_type == 'bgcolor'){ echo 'display: block';}else{echo 'display: none';} }else{echo 'display: none'; }?>">
                      <div class="form-group col-md-12 col s12">
                      <label class="control-label">Background Color Style</label> 
                      <textarea class="form-control"  name="bgcolor_style[]">{{$sersectionlist->bgcolor_style}}</textarea>
                      </div>
                      </div>


                      <div class="bgimagetype{{$rand}}" style="<?php if(isset($sersectionlist->bg_type)){ if($sersectionlist->bg_type == 'bgimage'){ echo 'display: block';}else{echo 'display: none';} }else{echo 'display: none'; }?>">
                      <div class="form-group col-md-6 col s6">
                      @if($sersectionlist->bgimage==NULL || $sersectionlist->bgimage=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section_banner/'.$sersectionlist->bgimage)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Bg Image</label> 
                      <input type="file" name="bgimage[]">
                      <input class="form-control" name="oldbgimage[]" value="{{$sersectionlist->bgimage}}" type="hidden">
                      </div>
                      </div>
                      </div>
                      @if($sersectionlist->type=='imagetext' || $sersectionlist->type=='rightimagetext')
                      <div class="form-group col-md-12 col s12">
                      @if($sersectionlist->image==NULL || $sersectionlist->image=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$sersectionlist->image)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Image</label> 
                      <input type="file" name="serviceimage[]">
                      <input class="form-control" name="oldserviceimage[]" value="{{$sersectionlist->image}}" type="hidden">
                      </div>
                      @else
                      <input type="file" name="serviceimage[]" style="display: none;">
                      @endif
                      @if(isset($sersectionlist->section1))
                      <div class="col-md-12 col s12">
        			      	<label class="control-label">Section 1</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="service1[]" rows="3">{{$sersectionlist->section1}}</textarea>
                        <span class="help-block"></span>
                        </div>
                       
                      @endif
                      
                      @if($sersectionlist->type == 'leftheading' || $sersectionlist->type == 'twoparagraph' || $sersectionlist->type == 'twoparagraphbgcolor')
                      <div class="form-group col-md-12 col s12">
                      <label class="control-label">Section Heading1</label> 
                      <input class="form-control"  name="service_heading1[]" value="@if(isset($sersectionlist->service_heading1)){{$sersectionlist->service_heading1}}@endif" type="text">
                      </div>
                      @else
                      <input class="form-control"  name="service_heading1[]" value="@if(isset($sersectionlist->service_heading1)){{$sersectionlist->service_heading1}}@endif" type="hidden">
                      @endif
                      @if(isset($sersectionlist->section2))
                      <div class="col-md-12 col s12">
        			      	<label class="control-label">Section 1</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="service2[]" rows="3">{{$sersectionlist->section2}}</textarea>
                        <span class="help-block"></span>
                        </div>
                       
                      @endif
                      @if($sersectionlist->type=='threeparagraph' || $sersectionlist->type=='tabparagraph')
                      <input type="hidden" name="service1[]">
                      <input type="hidden" name="service2[]">
                      @endif

                      @if($sersectionlist->type=='sectionthreeparagraph' || $sersectionlist->type=='sectiontabparagraph')
                      <input type="hidden" name="service2[]">
                      @endif

                      
                      <?php 
                        $datasec = $sersectionlist->threepragraph;
                       
                      ?>
                      @if(isset($datasec->orderby))
                        <?php
                    //   $orderbypragraphsec = collect($datasec)->sortBy('orderby');
                    //   print_r($orderbypragraphsec['orderby']);
                    //   exit;
                      ?>
                      @foreach($datasec->orderby as $orderkey => $threelist)
                      <?php $randsec = rand('9999','99999');?>
                      <div id="removethreesec{{$randsec}}">
                      <div class="col-md-11 col s11 pragraphsec">
        			      	<label class="control-label">Three Pragraph Section</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="threepragraph{{$i}}[]" rows="3">{{$datasec->threeparagraphdata[$orderkey]}}</textarea>
                        <!-- <input type="text" name="service1[]" value="threepragraph"> -->
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 col s1">
                        <input type="text" class="form-control orderby{{$randsec}}" value="{{$threelist}}" name="orderbypragraph{{$i}}[]">
                        @if($orderkey == '0')
                        <button type="button" class="btn btn-primary marginT38 buttonright" onclick="editthreepragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif

                        <?php 
                        $datasec = $sersectionlist->tabpragraph;
                      ?>
                      @if(isset($datasec->taborderby))
                      <?php
                      $orderbytabpragraphsec = collect($datasec->taborderby)->sortBy('taborderby');
                      ?>
                      @foreach($orderbytabpragraphsec as $taborderkey => $tablist)
                      <?php $randsec = rand('9999','99999');?>
                      <div id="removethreesec{{$randsec}}">
                      <div class="form-group col-md-12">
                      <label class="control-label">Tab Heading</label> 
                      <input class="form-control tabheading{{$randsec}}" name="tab_heading{{$i}}[]" value="{{$datasec->tabheadingdata[$taborderkey]}}" type="text">
                      </div>
                      <?php $serviceimg = null;?>
                      @if(isset($datasec->tabimage[$taborderkey]))
                        @php
                            $serviceimg = $datasec->tabimage[$taborderkey];
                        @endphp 
                      @endif
                      <div class="form-group col-md-12 col s12">
                      @if($serviceimg==NULL || $serviceimg=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/backend/service/section/'.$serviceimg)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Image</label> 
                      <input type="file" name="tabimage{{$i}}[]">
                      <input class="form-control" name="oldtabimage{{$i}}[]" value="{{$serviceimg}}" type="hidden">
                      </div>
                      <div class="form-group col-md-12">
                      <label class="control-label">Heading2</label> 
                      <input class="form-control tabheading{{$randsec}}" name="tab_heading2{{$i}}[]" value="@if(isset($datasec->tabheadingdata2[$taborderkey])){{$datasec->tabheadingdata2[$taborderkey]}}@endif" type="text">
                      </div>
                      <div class="col-md-11 col s11 pragraphsec">
        			      	<label class="control-label">Tab Pragraph Section</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="tabpragraph{{$i}}[]" rows="3">{{$datasec->tabparagraphdata[$taborderkey]}}</textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 col s1">
                        <input type="text" class="form-control orderby{{$randsec}}" value="{{$tablist}}" name="orderbytabpragraph{{$i}}[]">
                        @if($taborderkey == '0')
                        <button type="button" class="btn btn-primary marginT38 buttonright" onclick="edittabpragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif

                        <div id="editthreeparagraph{{$rand}}"></div>
                        <div id="edittabparagraph{{$rand}}"></div>
                    </div>
                    <?php ++$i;?>
                    @endforeach
                    @endif


                        <input type="hidden" value="{{$seccount}}" id="countparagraph">
                        <input type="hidden" value="00000" id="allarraycount">

                        <div class="form-group col-sm-12 col s12">
                            <label>Add More Section</label>
                            <select class="form-control" id="service_list{{$rand}}" name="service_type[]" onchange="servicelist('{{$rand}}')">
                                <option value="">Add More Section</option>
                                <option value="fulltext">Full Text</option>
                                <option value="imagetext">Left Image and Right Text</option>
                                <option value="rightimagetext">Right Image and Left Text</option>
                                <option value="leftheading">Left Heading and Right Text</option>
                                <option value="twoparagraph">Two Paragraph</option>
                                <option value="twoparagraphbgcolor">Two Paragraph BG Color</option>
                                <option value="threeparagraph">Three Paragraph or More</option>
                                <option value="sectionthreeparagraph">Section Three Paragraph or More</option>
                                <option value="tabparagraph">Tab Paragraph or More</option>
                                <option value="sectiontabparagraph">Section Tab Paragraph or More</option>
                            </select>
                        </div>
                        <div id="servicelist{{$rand}}"></div>
                        
                    </div>
                    
                    <div class="row">
                        
                        <div class="form-group col-sm-4 col s4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4 col s4">
                            <label>Title Tags</label>
                            <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text" service>
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Keyword Tag</label>
                            <input class="form-control" value="{{$edit->keyword_tag}}" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Description Tag</label>
                            <input class="form-control" value="{{$edit->description_tag}}" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Canonical</label>
                            <input class="form-control" value="{{$edit->canonical_tag}}" name="canonical_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Url</label>
                            <input class="form-control" value="{{$edit->url}}" type="text" name="url">
                        </div>

                        <div class="col-sm-12 col s12 marginT30" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>

                    </div>
                </div>
            </div>
			</div>
        </form>
        <?php
        if (isset($edit->ser_id))
            $ser_id = $edit->ser_id;
        else
            $ser_id = '';
        ?>
    </section>
</section>
</div>
<script>
    CKEDITOR.replace('textArea');

    function servicetype() {
        var video_type = $('#video_type').val();
        if (video_type == 'video') {
            $('#videoupload').show();
            $('#videolink').hide();
        } else if (video_type == 'link') {
            $('#videoupload').hide();
            $('#videolink').show();
        }
    }
function getUnique(array){
        var uniqueArray = [];
        
        // Loop through array values
        for(var value of array){
            if(uniqueArray.indexOf(value) === -1){
                uniqueArray.push(value);
            }
        }
        return uniqueArray;
    }
    
    function servicelist(rand) {
        var servicelist = $("#service_list" + rand).val();
        var allarray = $('#allarraycount').val();
        var allarraydata = allarray.split(',');
        var newarray = [rand];
        var uniqueArrayl = [];
        var alldata = uniqueArrayl.concat(allarraydata,newarray);
        var allnewarray = getUnique(alldata);
        var allarray = $('#allarraycount').val(allnewarray);
        // console.log(rand);
        // console.log(allnewarray.includes(rand));
        if(allarraydata.includes(rand) === false){
            var countsec = $('#countparagraph').val();
            var no = 1;
            var serial = parseInt(countsec) + parseInt(no);
            $('#countparagraph').val(serial);
        }
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-list')}}",
            data: {
                'servicelist': servicelist
            },
            success: function(result) {
                $("#servicelist" + rand).html(result);
            },
            complete: function() {},
        });
    }

    function orderbyservicesec(rand, secid) {
        var order_by = $("#orderby" + secid).val();
        // alert(order_by);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-section-order')}}",
            data: {
                'post': 'ok',
                'secid': secid,
                'order_by': order_by
            },
            success: function(result) {
                // alert(result); 
                // window.location.href = "{{url('/admin/edit_service')}}/{{$edit->ser_id}}"

            },
            complete: function() {},
        });
    }

    function removesecrvice(rand, secid) {
        // var tabserial = $("#tabserial"+rand).val();
        // var no = 1;
        // var serial = parseInt(tabserial) + parseInt(no);
        // alert(serial);
        if (confirm("Do you really want to delete record?") == true) {
            $.ajax({
                type: "post",
                // cache: false,
                // async: false,
                url: "{{url('/admin/service-section-delete')}}",
                data: {
                    'post': 'ok',
                    'secid': secid
                },
                success: function(result) {
                    // alert(result); 
                    window.location.href = "{{url('/admin/edit_service')}}/{{$edit->ser_id}}"

                },
                complete: function() {},
            });
        }
    }

    function threepragraph(rand) {
        var token = $("#token").val();
        //   alert(servicelist)
        var countsec = $('#countparagraphlist'+rand).val();
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/threepragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#addthreeparagraph" + rand).append(result);
            },
            complete: function() {},
        });
    }

    function tabpragraph(rand) {
        var token = $("#token").val();
        //   alert(servicelist)
        var countsec = $('#countparagraphlist'+rand).val();
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/tabpragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#addtabparagraph" + rand).append(result);
            },
            complete: function() {},
        });
    }

   function editthreepragraph(rand,countsec){
    var token = $("#token").val();
        //   alert(servicelist)
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/threepragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#editthreeparagraph" + rand).append(result);
            },
            complete: function() {},
        });
   }

   function edittabpragraph(rand,countsec){
    var token = $("#token").val();
        //   alert(servicelist)
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/tabpragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#edittabparagraph" + rand).append(result);
            },
            complete: function() {},
        });
   }
   

   function removesecrvice(rand, secid) {
        // var tabserial = $("#tabserial"+rand).val();
        // var no = 1;
        // var serial = parseInt(tabserial) + parseInt(no);
        // alert(serial);
        if (confirm("Do you really want to delete record?") == true) {
            $.ajax({
                type: "post",
                // cache: false,
                // async: false,
                url: "{{url('/admin/service-section-delete')}}",
                data: {
                    'post': 'ok',
                    'secid': secid
                },
                success: function(result) {
                    // alert(result); 

                    window.location.href = "{{url('/admin/edit_service')}}/{{$ser_id}}"
                },
                complete: function() {},
            });
        }
    }

    function removethreepragraph(rand){
        $('#removethreesec'+rand).remove();
    }

    function removesec(rand,keydata){
        var token = $("#token").val();
        // alert(order_by);
        if (confirm("Do you really want to delete record?") == true) {
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-removesec')}}",
            data: {
                '_token': token,
                'keydata': keydata
            },
            success: function(result) {
                // alert(result); 
                window.location.href = "{{url('/admin/edit_service')}}/{{$edit->ser_id}}"
                // $('#removesec'+rand).remove();

            },
            complete: function() {}, 
        });
    }
       
    }

    function buttontype(rand) {
        var button_type = $('#button_type' +rand).val();
        // alert(button_type);
        if (button_type == 'Yes') {
            $('.showtype'+rand).show();
        } else if (button_type == 'No') {
            $('.showtype'+rand).hide();
        }
    }

    function bgtypeimage(rand){
        var bg_type = $('#bg_type'+rand).val();
        // alert(button_type);
        if (bg_type == 'bgcolor') {
            $('.bgcolor'+rand).show();
            $('.bgimagetype'+rand).hide();
        } else if (bg_type == 'bgimage') {
            $('.bgcolor'+rand).hide();
            $('.bgimagetype'+rand).show();
        } else if (bg_type == 'white') {
            $('.bgcolor'+rand).hide();
            $('.bgimagetype'+rand).hide();
        }
    }

</script>

@endsection