@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
$rand = rand(9999,99999);
@endphp
<style>
    .orderbydoct{
        width: 100%;
        font-size: 12px;
    }
    .formorder{
        width: 56%;
        float: left;
        display: inline-block;
        margin-right: 10px;
    }
    .adddoctp{
        padding: 9px;
        padding-bottom: 6px;
        padding-top: 6px;
    }
    </style>
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Doctor</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/doctor-list')}}">About</a></li>
                        <li><a href="{{url('/admin/doctor-list')}}">List Doctor</a></li>
                        <li class="active">Add Doctor</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_doctor')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="doc_id" id="doc_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($view->show_type))@if($view->show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($view->show_type))@if($view->show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->home_image))
                            @if($view->home_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->home_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Home Image</label>
                            <input class="form-control" name="home_image" type="file">
                            <input class="form-control" name="oldhome_image" value="@if(isset($view->home_image)) {{$view->home_image}} @endif" type="hidden">
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Image</label>
                            <input class="form-control" name="image" type="file">
                            <input class="form-control" name="oldimage" value="@if(isset($view->image)) {{$view->image}} @endif" type="hidden">
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->image2))
                            @if($view->image2!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->image2)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Image 2</label>
                            <input class="form-control" name="image2" type="file">
                            <input class="form-control" name="oldimage2" value="@if(isset($view->image2)) {{$view->image2}} @endif" type="hidden">
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->banner_image))
                            @if($view->banner_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Banner Image</label>
                            <input class="form-control" name="banner_image" type="file">
                            <input class="form-control" name="oldbanner_image" value="@if(isset($view->banner_image)) {{$view->banner_image}} @endif" type="hidden">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Sort Degree</label>
                            <input class="form-control" name="short_degree" value="@if(isset($view->short_degree)) {{$view->short_degree}} @endif" type="text">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Home Description</label>
                            <textarea class="form-control ckeditor" name="home_desc" rows="3">@if(isset($view->home_desc)) {{$view->home_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="sort_desc" rows="3">@if(isset($view->sort_desc)) {{$view->sort_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Description1</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label class="control-label">Education</label>
                            <textarea class="form-control ckeditor" name="education_desc" rows="3">@if(isset($view->education_desc)) {{$view->education_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    @php
                    $educationdetail = [];
                    @endphp
                    @if(isset($view->education_detail))
                    @php
                    $educationdetail = json_decode($view->education_detail);
                    @endphp

                    @foreach($educationdetail->education as $edukey => $education)
                    @php
                    $rand = rand(9999,99999);
                    @endphp
                    <div id="education{{$rand}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education Year</label>
                                <input class="form-control" name="education_year[]" value="@if(isset($education->education_year)){{$education->education_year}}@endif" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-11">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Education Name</label>
                                <textarea class="form-control ckeditor" name="education_name[]" rows="3">@if(isset($education->education_name)){{$education->education_name}}@endif</textarea>
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Education College</label>
                                <textarea class="form-control ckeditor" name="education_college[]" rows="3">@if(isset($education->education_college)){{$education->education_college}}@endif</textarea>
                                
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-1 paddingL0">
                            <div class="formorder">
                                <label class="control-label orderbydoct">Order By</label>
                                <input class="form-control" name="education_order_by[]" value="@if(isset($education->education_order_by)){{$education->education_order_by}}@endif" type="text">
                            </div>
                            <div>
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="education_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if(isset($education->education_design_set))@if($i== $education->education_design_set) selected @endif @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                                @if($edukey=='0')
                                <button class="btn btn-primary marginT38 adddoctp" type="button" onclick="addeducation()">+</button>
                                @else
                                <button class="btn btn-danger adddoctp" type="button" onclick="removeedutype('{{$rand}}')">-</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    <div id="education{{$rand}}">
                        <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education Year</label>
                                <input class="form-control" name="education_year[]" type="text">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-11">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Education Name</label>
                                <textarea class="form-control ckeditor" name="education_name[]" rows="3"></textarea>
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Education College</label>
                                <textarea class="form-control ckeditor" name="education_college[]" rows="3"></textarea>
                                
                            </div>
                        </div>
                        </div>
                        
                        <div class="col-sm-1 paddingL0">
                            <div class="formorder">
                                <label class="control-label orderbydoct">Order By</label>
                                <input class="form-control" name="education_order_by[]" type="text">
                            </div>
                            <div class="">
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="education_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i=="1") selected @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                                <button class="btn btn-primary marginT38 adddoctp" type="button" onclick="addeducation()">+</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    <div id="addeducation"></div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Experience</label>
                            <textarea class="form-control ckeditor" name="experience_desc" rows="3">@if(isset($view->experience_desc)) {{$view->experience_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    @if(isset($view->experience_detail))
                    @php
                    $experiencedetail = json_decode($view->experience_detail);
                    @endphp
                    @foreach($experiencedetail->experience as $expkey => $experience)
                    @php
                    $rand = rand(9999,99999);
                    @endphp
                    <div id="experience{{$rand}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience Year</label>
                                <input class="form-control" name="experience_year[]" value="{{$experience->experience_year}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Experience Name</label>
                                <textarea class="form-control ckeditor" name="experience_name[]" rows="3">@if(isset($experience->experience_name)) {{$experience->experience_name}} @endif</textarea>
                               
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Experience Address</label>
                                <textarea class="form-control ckeditor" name="experience_address[]" rows="3">@if(isset($experience->experience_address)) {{$experience->experience_address}} @endif</textarea>
                                
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-1 paddingL0">
                            <div class="formorder">
                                <label class="control-label orderbydoct">Order By</label>
                                <input class="form-control" name="experience_order_by[]" value="{{$experience->experience_order_by}}" type="text">
                            </div>
                            <div>
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="experience_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if(isset($experience->experience_design_set))@if($i== $experience->experience_design_set) selected @endif @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                                @if($expkey=='0')
                                <button class="btn btn-primary marginT38 adddoctp" type="button" onclick="addexperience()">+</button>
                                @else
                                <button class="btn btn-danger adddoctp" type="button" onclick="removeexptype('{{$rand}}')">-</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @else
                    <div id="experience{{$rand}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience Year</label>
                                <input class="form-control" name="experience_year[]" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-11">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Experience Name</label>
                                <textarea class="form-control ckeditor" name="experience_name[]" rows="3"></textarea>
                                
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Experience Address</label>
                                <textarea class="form-control ckeditor" name="experience_address[]" rows="3"></textarea>
                               
                            </div>
                        </div>
                    </div>

                        <div class="col-sm-1 paddingL0">
                            <div class="formorder">
                                <label class="control-label orderbydoct">Order By</label>
                                <input class="form-control" name="experience_order_by[]" type="text">
                            </div>
                            <div>
                            <label class="control-label orderbydoct">Design Section Set</label>
                            <select class="form-control" name="experience_design_set[]">
                                <option value="">Select Section Set</option>
                                @for($i=1; $i<=10; $i++)
                                <option value="{{$i}}" @if($i=="1") selected @endif>{{$i}}</option>
                               @endfor
                            </select>
                        </div>
                            <div>
                                <button class="btn btn-primary marginT38 adddoctp" type="button" onclick="addexperience()">+</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endif
                    <div id="addexperience"></div> -->


                    <?php $seccount = '0';?>
                    @if(isset($view->section))
                    <?php
                    $sersection = json_decode($view->section); 
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
                        <div class="showsection">
                        @if(isset($sersectionlist->type))
                        @if($sersectionlist->type == 'fulltext')
                        <p>Full Text</p>
                        @elseif($sersectionlist->type == 'imagetext')
                        <p>Left Image and Right Text</p>
                        @elseif($sersectionlist->type == 'rightimagetext')
                        <p>Right Image and Left Text</p>
                        @elseif($sersectionlist->type == 'leftheading')
                        <p>Left Heading and Right Text</p>
                        @elseif($sersectionlist->type == 'twoparagraph')
                        <p>Two Paragraph</p>
                        @elseif($sersectionlist->type == 'twoparagraphdifflayout')
                        <p>Two Paragraph Different Layout</p>
                        @elseif($sersectionlist->type == 'twoparagraphbgcolor')
                        <p>Two Paragraph BG Color</p>
                        @elseif($sersectionlist->type == 'threeparagraph')
                        <p>Three Paragraph or More</p>
                        @elseif($sersectionlist->type == 'sectionthreeparagraph')
                        <p>Section Three Paragraph or More</p>
                        @elseif($sersectionlist->type == 'tabparagraph')
                        <p>Tab Paragraph or More</p>
                        @elseif($sersectionlist->type == 'sectiontabparagraph')
                        <p>Section Tab Paragraph or More</p>
                        @elseif($sersectionlist->type == 'educationsection')
                        <p>Education Section</p>
                        @elseif($sersectionlist->type == 'experiencesection')
                        <p>Experience Section</p>
                        @endif
                        @endif
                        </div>
                    <input class="form-control"  name="service_type[]" value="@if(isset($sersectionlist->type)){{$sersectionlist->type}}@endif" type="hidden">
                    
                    <div class="form-group col-md-11">
                    @if($sersectionlist->type == 'fulltext' || $sersectionlist->type == 'imagetext' || $sersectionlist->type == 'rightimagetext' || $sersectionlist->type == 'leftheading'
                    || $sersectionlist->type == 'twoparagraph' || $sersectionlist->type == 'twoparagraphdifflayout' || $sersectionlist->type == 'twoparagraphbgcolor' || $sersectionlist->type == 'threeparagraph'
                    || $sersectionlist->type == 'sectionthreeparagraph' || $sersectionlist->type == 'tabparagraph' || $sersectionlist->type == 'sectiontabparagraph')
                    <div class="form-group width100">
                      <label class="control-label">Section Heading</label> 
                      <input class="form-control"  name="service_heading[]" value="@if(isset($sersectionlist->service_heading)){{$sersectionlist->service_heading}}@endif" type="text">
                      </div>
                      @else
                      <input class="form-control"  name="service_heading[]" type="hidden">
                      @endif
                      <input type="hidden" name="servicesection[]" value="servicesection">
                      <div class="form-group width100">
                      <div class="form-group col-md-4 paddingL0">
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
                      <div class="form-group col-md-4 paddingL0">
                      <label class="control-label">Button Url</label> 
                      <input class="form-control"  name="button_url[]" value="@if(isset($sersectionlist->button_url)){{$sersectionlist->button_url}}@endif" type="text">
                      </div>
                      <div class="form-group width100">
                      <label class="control-label">Button Style</label> 
                      <textarea class="form-control"  name="button_style[]">@if(isset($sersectionlist->button_style)){{$sersectionlist->button_style}}@endif</textarea>
                      </div>
                      </div>
                      
                      <div class="form-group col-md-4 paddingL0">
                      <label class="control-label">Select Section Appointment Form</label> 
                      <select class="form-control" name="appointment_side[]">
                          <option value="">Select Button Type</option>
                          <option value="upper" @if(isset($sersectionlist->appointment_side)) @if($sersectionlist->appointment_side == 'upper') selected @endif @else selected @endif>Upper Side</option>
                          <option value="down" @if(isset($sersectionlist->appointment_side)) @if($sersectionlist->appointment_side == 'down') selected @endif @endif>Down Side</option>
                      </select>
                      </div>
                      </div>
                      <div class="form-group width100">
                      <div class="form-group col-md-4 paddingL0">
                      <label class="control-label">Select Background Type</label> 
                      <select class="form-control" id="bg_type{{$rand}}" name="bg_type[]" onchange="bgtypeimage('{{$rand}}')">
                          <option value="">Select Background Type</option>
                          <option value="white" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'white') selected @endif @else selected @endif>White</option>
                          <option value="bgcolor" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'bgcolor') selected @endif @endif>Background Color</option>
                          <option value="bgimage" @if(isset($sersectionlist->bg_type)) @if($sersectionlist->bg_type == 'bgimage') selected @endif @endif>Background Image</option>
                      </select>
                      </div>
                      <div class="form-group col-md-4 col s4">
                      <label class="control-label">Class Add</label> 
                      <input class="form-control"  name="class_add[]" value="@if(isset($sersectionlist->class_add)){{$sersectionlist->class_add}}@endif" type="text">
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
                      <div class="form-group width100">
                      <label class="control-label">Background Color Style</label> 
                      <textarea class="form-control"  name="bgcolor_style[]">{{$sersectionlist->bgcolor_style}}</textarea>
                      </div>
                      </div>


                      <div class="bgimagetype{{$rand}}" style="<?php if(isset($sersectionlist->bg_type)){ if($sersectionlist->bg_type == 'bgimage'){ echo 'display: block';}else{echo 'display: none';} }else{echo 'display: none'; }?>">
                      <div class="form-group col-md-6 col s6">
                      @if($sersectionlist->bgimage==NULL || $sersectionlist->bgimage=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/section_banner/'.$sersectionlist->bgimage)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Bg Image</label> 
                      <input type="file" name="bgimage[]">
                      <input class="form-control" name="oldbgimage[]" value="{{$sersectionlist->bgimage}}" type="hidden">
                      </div>
                      </div>
                      </div>
                      @if($sersectionlist->type=='imagetext' || $sersectionlist->type=='rightimagetext' || $sersectionlist->type=='threeparagraph')
                      <div class="form-group">
                      @if($sersectionlist->image==NULL || $sersectionlist->image=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/section/'.$sersectionlist->image)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Image</label> 
                      <input type="file" name="serviceimage[]">
                      <input class="form-control" name="oldserviceimage[]" value="{{$sersectionlist->image}}" type="hidden">
                      </div>
                      @else
                      <input class="form-control" name="oldserviceimage[]" value="{{$sersectionlist->image}}" type="hidden">
                      <input type="file" name="serviceimage[]" style="display: none;">
                      @endif
                      
                        


                      <div class="form-group width100">
        			      	<label class="control-label">Section 1</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="service1[]" rows="3">@if(isset($sersectionlist->section1)){{$sersectionlist->section1}}@endif</textarea>
                        <span class="help-block"></span>
                        </div>
                      
                     
                      @if($sersectionlist->type == 'leftheading' || $sersectionlist->type == 'twoparagraph' || $sersectionlist->type == 'twoparagraphbgcolor' || $sersectionlist->type == 'twoparagraphdifflayout')
                      <div class="form-group width100">
                      <label class="control-label">Section Heading1</label> 
                      <input class="form-control"  name="service_heading1[]" value="@if(isset($sersectionlist->service_heading1)){{$sersectionlist->service_heading1}}@endif" type="text">
                      </div>
                      @else
                      <input class="form-control"  name="service_heading1[]" value="@if(isset($sersectionlist->service_heading1)){{$sersectionlist->service_heading1}}@endif" type="hidden">
                      @endif
                      @if($sersectionlist->type == 'twoparagraph' || $sersectionlist->type == 'twoparagraphbgcolor' || $sersectionlist->type == 'twoparagraphdifflayout')
                      <div class="form-group width100">
        			      	<label class="control-label">Section 2</label>              
                        <textarea class="form-control ckeditor editorleft{{$rand}}" id="editorleft{{$rand}}" name="service2[]" rows="3">@if(isset($sersectionlist->section2)){{$sersectionlist->section2}}@endif</textarea>
                        <span class="help-block"></span>
                        </div>
                       @else
                       <input type="hidden" name="service2[]">
                      @endif
                      <!-- @if($sersectionlist->type=='threeparagraph' || $sersectionlist->type=='tabparagraph')
                      <input type="hidden" name="service1[]">
                      <input type="hidden" name="service2[]">
                      @endif

                      @if($sersectionlist->type=='sectionthreeparagraph' || $sersectionlist->type=='sectiontabparagraph')
                      <input type="hidden" name="service2[]">
                      @endif -->

                      @if(isset($sersectionlist->threepragraph))
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
                      <div class="form-group col-md-12">
                      <label class="control-label">Design Div class</lbel> 
                      <textarea class="form-control" id="threedesignstart{{$rand}}" name="threedesignstart{{$i}}[]" rows="3">@if(isset($datasec->threedesignstart[$orderkey])){{$datasec->threedesignstart[$orderkey]}}@endif</textarea>
                      </div>
                      <div class="col-md-11 pragraphsec paddingL0">
        			      	<label class="control-label">Three Pragraph Section</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="threepragraph{{$i}}[]" rows="3">{{$datasec->threeparagraphdata[$orderkey]}}</textarea>
                        <!-- <input type="text" name="service1[]" value="threepragraph"> -->
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 paddingL0 paddingR0">
                        <input type="text" class="form-control orderbyser orderby{{$randsec}}" placeholder="Order By" value="{{$threelist}}" name="orderbypragraph{{$i}}[]">
                        @if($orderkey == '0')
                        <button type="button" class="btn btn-primary deletebut marginT38 buttonright" onclick="editthreepragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger deletebut marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif
                        @endif
                        @if(isset($sersectionlist->tabpragraph))
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
                      <div class="form-group width100">
                      <label class="control-label">Tab Heading</label> 
                      <input class="form-control tabheading{{$randsec}}" name="tab_heading{{$i}}[]" value="{{$datasec->tabheadingdata[$taborderkey]}}" type="text">
                      </div>
                      <?php $serviceimg = null;?>
                      @if(isset($datasec->tabimage[$taborderkey]))
                        @php
                            $serviceimg = $datasec->tabimage[$taborderkey];
                        @endphp 
                      @endif
                      <div class="form-group">
                      @if($serviceimg==NULL || $serviceimg=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/backend/service/section/'.$serviceimg)}}" style="width:85px;height:85px;">
                                @endif
                      
                      <label class="control-label">Image</label> 
                      <input type="file" name="tabimage{{$i}}[]">
                      <input class="form-control" name="oldtabimage{{$i}}[]" value="{{$serviceimg}}" type="hidden">
                      </div>
                      <div class="form-group width100">
                      <label class="control-label">Heading2</label> 
                      <input class="form-control tabheading{{$randsec}}" name="tab_heading2{{$i}}[]" value="@if(isset($datasec->tabheadingdata2[$taborderkey])){{$datasec->tabheadingdata2[$taborderkey]}}@endif" type="text">
                      </div>
                      <div class="col-md-11 pragraphsec paddingL0">
        			      	<label class="control-label">Tab Pragraph Section</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="tabpragraph{{$i}}[]" rows="3">{{$datasec->tabparagraphdata[$taborderkey]}}</textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 paddingL0 paddingR0">
                        <input type="text" class="form-control orderbyser orderby{{$randsec}}" placeholder="Order By" value="{{$tablist}}" name="orderbytabpragraph{{$i}}[]">
                        @if($taborderkey == '0')
                        <button type="button" class="btn btn-primary deletebut marginT38 buttonright" onclick="edittabpragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger deletebut marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif
                        @endif
                        @if(isset($sersectionlist->education))
                        <?php 
                        $datasec = $sersectionlist->education;
                      ?>
                      @if(isset($datasec->education_order_by))
                      <?php
                      $orderbyedupragraphsec = collect($datasec->education_order_by)->sortBy('education_order_by');
                      ?>
                      @foreach($orderbyedupragraphsec as $eduorderkey => $tablist)
                      <?php $randsec = rand('9999','99999');?>
                      <div id="removethreesec{{$randsec}}">
                      <div class="form-group width100">
                      <label class="control-label">Education Name</label> 
                      <input class="form-control eduname{{$randsec}}" name="education_name{{$i}}[]" value="{{$datasec->education_name[$eduorderkey]}}" type="text">
                      </div>
                      <div class="form-group col-sm-4">
                      <label class="control-label">Year</label> 
                      <input class="form-control eduyear{{$randsec}}" name="education_year{{$i}}[]" value="@if(isset($datasec->education_year[$eduorderkey])){{$datasec->education_year[$eduorderkey]}}@endif" type="text">
                      </div>
                     
                      
                      <div class="col-md-11 pragraphsec paddingL0">
        			      	<label class="control-label">Education College</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="education_college{{$i}}[]" rows="3">{{$datasec->education_college[$eduorderkey]}}</textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 paddingL0 paddingR0">
                        <input type="text" class="form-control orderbyser orderby{{$randsec}}" placeholder="Order By" value="{{$tablist}}" name="education_order_by{{$i}}[]">
                        @if($eduorderkey == '0')
                        <button type="button" class="btn btn-primary deletebut marginT38 buttonright" onclick="editedupragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger deletebut marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif
                        @endif

                        @if(isset($sersectionlist->experence))
                        <?php 
                        $datasec = $sersectionlist->experence;
                      ?>
                      @if(isset($datasec->experience_order_by))
                      <?php
                      $orderbyexppragraphsec = collect($datasec->experience_order_by)->sortBy('experience_order_by');
                      ?>
                      @foreach($orderbyexppragraphsec as $exporderkey => $tablist)
                      <?php $randsec = rand('9999','99999');?>
                      <div id="removethreesec{{$randsec}}">
                      <div class="form-group width100">
                      <label class="control-label">Experience Name</label> 
                      <input class="form-control expname{{$randsec}}" name="experience_name{{$i}}[]" value="{{$datasec->experience_name[$exporderkey]}}" type="text">
                      </div>
                      <div class="form-group col-sm-4">
                      <label class="control-label">Year</label> 
                      <input class="form-control expyear{{$randsec}}" name="experience_year{{$i}}[]" value="@if(isset($datasec->experience_year[$exporderkey])){{$datasec->experience_year[$exporderkey]}}@endif" type="text">
                      </div>
                      
                    
                      <div class="col-md-11 pragraphsec paddingL0">
        			      	<label class="control-label">Experience Address</label>              
                        <textarea class="form-control ckeditor editorleft{{$randsec}}" id="editorleft{{$randsec}}" name="experience_address{{$i}}[]" rows="3">{{$datasec->experience_address[$exporderkey]}}</textarea>
                        <span class="help-block"></span>
                        </div>
                        <div class="col-md-1 paddingL0 paddingR0">
                        <input type="text" class="form-control orderbyser orderby{{$randsec}}" placeholder="Order By" value="{{$tablist}}" name="experience_order_by{{$i}}[]">
                        @if($exporderkey == '0')
                        <button type="button" class="btn btn-primary deletebut marginT38 buttonright" onclick="editexppragraph('{{$rand}}','{{$i}}')">+</button>
                        @else
                        <button type="button" class="btn btn-danger deletebut marginT38 buttonright" onclick="removethreepragraph('{{$randsec}}')">-</button>
                        @endif
                        </div>
                      </div>
                      
                        @endforeach
                        @endif
                        @endif
                        <div id="editthreeparagraph{{$rand}}"></div>
                        <div id="edittabparagraph{{$rand}}"></div>
                        <div id="editeduparagraph{{$rand}}"></div>
                        <div id="editexpparagraph{{$rand}}"></div>
                    </div>
                    <div class="form-group col-md-1 paddingL0">
                    <input type="text" class="form-control orderbyser orderby{{$rand}}" placeholder="Order By" value="@if(isset($sersectionlist->secorderby)){{$sersectionlist->secorderby}}@endif" name="secorderby[]">
                    <button type="button" class="btn btn-danger deletebut marginT38 buttonright" onclick="doctorremovesec('{{$rand}}','{{$key}}')">-</button>
                    </div>
                    </div>
                    <?php ++$i;?>
                    @endforeach
                    @endif

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Add More Section</label>
                            <select class="form-control" id="service_list{{$rand}}" name="service_type[]" onchange="servicelist('{{$rand}}')">
                                <option value="">Add More Section</option>
                                <option value="fulltext">Full Text</option>
                                <option value="imagetext">Left Image and Right Text</option>
                                <option value="rightimagetext">Right Image and Left Text</option>
                                <option value="leftheading">Left Heading and Right Text</option>
                                <option value="twoparagraph">Two Paragraph</option>
                                <option value="twoparagraphdifflayout">Two Paragraph Different Layout</option>
                                <option value="twoparagraphbgcolor">Two Paragraph BG Color</option>
                                <option value="threeparagraph">Three Paragraph or More</option>
                                <option value="sectionthreeparagraph">Section Three Paragraph or More</option>
                                <option value="tabparagraph">Tab Paragraph or More</option>
                                <option value="sectiontabparagraph">Section Tab Paragraph or More</option>
                                <option value="educationsection">Education Section</option>
                                <option value="experiencesection">Experience Section</option>
                            </select>
                        </div>

                        <div id="servicelist{{$rand}}"></div>
                    </div>
    
    <input type="hidden" value="{{$seccount}}" id="countparagraph">
    <input type="hidden" value="00000" id="allarraycount">



                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" name="title_tag" value="@if(isset($seotag->title_tag)) {{$seotag->title_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" value="@if(isset($seotag->keyword_tag)) {{$seotag->keyword_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" value="@if(isset($seotag->description_tag)) {{$seotag->description_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical Tag</label>
                            <input class="form-control" name="canonical_tag" value="@if(isset($seotag->canonical_tag)) {{$seotag->canonical_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" name="url" value="@if(isset($view->url)) {{$view->url}} @endif" type="text" required>
                            <input class="form-control" value="@if(isset($view->url)){{$view->url}}@endif" type="hidden" name="oldurl">
                        </div>
                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/doctor-list')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End form -->

    </section>
</section>
<?php
        if (isset($view->ser_id))
            $ser_id = $view->ser_id;
        else
            $ser_id = '';
        ?>
<script>
    CKEDITOR.replace('textArea');

    function addeducation() {
        $.ajax({
            type: "get",
            cache: false,
            async: false,
            url: "{{url('/admin/addeducation')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addeducation").append(result);
            },
            complete: function() {},
        });
    }

    function removetype(rand) {
        $("#remove" + rand).remove();
    }

    function removeedutype(rand) {
        $("#education" + rand).remove();
    }

    function addexperience() {
        // alert('hi');
        $.ajax({
            type: "get",
            cache: false,
            async: false,
            url: "{{url('/admin/addexperience')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addexperience").append(result);
            },
            complete: function() {},
        });
    }

    function removeexperience(rand) {
        $("#remove" + rand).remove();
    }

    function removeexptype(rand) {
        $("#experience" + rand).remove();
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
                // window.location.href = "{{url('/admin/add-doctor')}}"

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
                    window.location.href = "{{url('/admin/add-doctor')}}"

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

                    window.location.href = "{{url('/admin/add-doctor')}}"
                },
                complete: function() {},
            });
        }
    }

    function removethreepragraph(rand){
        $('#removethreesec'+rand).remove();
    }

    function doctorremovesec(rand,keydata){
        var token = $("#token").val();
        // alert(order_by);
        if (confirm("Do you really want to delete record?") == true) {
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/doctor-removesec')}}",
            data: {
                '_token': token,
                'keydata': keydata
            },
            success: function(result) {
                // alert(result); 
                window.location.href = "{{url('/admin/add-doctor')}}"
                // $('#removesec'+rand).remove();

            },
            complete: function() {}, 
        });
    }
       
    }

    function edupragraph(rand) {
        var token = $("#token").val();
        //   alert(servicelist)
        var countsec = $('#countparagraphlist'+rand).val();
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/edupragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#addeduparagraph" + rand).append(result);
            },
            complete: function() {},
        });
    }

    function editedupragraph(rand,countsec){
    var token = $("#token").val();
        //   alert(servicelist)
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/edupragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#editeduparagraph" + rand).append(result);
            },
            complete: function() {},
        });
   }

   function exppragraph(rand) {
        var token = $("#token").val();
        //   alert(servicelist)
        var countsec = $('#countparagraphlist'+rand).val();
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/exppragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#addexpparagraph" + rand).append(result);
            },
            complete: function() {},
        });
    }

    function editexppragraph(rand,countsec){
    var token = $("#token").val();
        //   alert(servicelist)
        // $('#totalseccount').val(countsec);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/exppragraph-list')}}",
            data: {
                '_token': token,'countsec': countsec
            },
            success: function(result) {
                $("#editexpparagraph" + rand).append(result);
            },
            complete: function() {},
        });
   }
</script>
@endsection