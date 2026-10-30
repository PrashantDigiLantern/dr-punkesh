@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Service Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service')}}">Service</a></li>
          <li class="active">Service Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
            @if(in_array('16',$permissionoprid))
            <div class="form-group col-sm-12">
                <label>First Category Name</label>
                <p>
                  @if(isset($secondsec['firstservice_name']))
                  {{$secondsec['firstservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('36',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Second Category Name</label>
                <p>
                @if(isset($secondsec['secservice_name']))
                  {{$secondsec['secservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('37',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Third Category Name</label>
                <p>
                @if(isset($secondsec['threeservice_name']))
                  {{$secondsec['threeservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('38',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fourth Category Name</label>
                <p>
                @if(isset($secondsec['fourservice_name']))
                  {{$secondsec['fourservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('39',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fifth Category Name</label>
                <p>
                @if(isset($secondsec['fifservice_name']))
                  {{$secondsec['fifservice_name']}}
                  @endif
                </p>
              </div>
              @endif
                        @endif
                        @endif
                        @endif
                        @endif
              <div class="form-group col-sm-12">
                <label>Name</label>
                <p>{{$view->service_name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Short Description</label>
                <p>{!! $view->short_desc !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Description</label>
                <p>{!! $view->description !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Banner Type</label>
                <p>{!! $view->video_type !!}</p>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->service_image))
                  @if($view->service_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/image/'.$view->service_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>

              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Banner Image</label>
                  @if(isset($view->service_banner_image))
                  @if($view->service_banner_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$view->service_banner_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                </div>
              </div>
                @if($view->show_type=='outside')
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Home Banner Image</label>
                  @if(isset($view->home_banner_image))
                  @if($view->home_banner_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$view->home_banner_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                </div>
              </div>

              <div class="form-group col-sm-12">
                <label>Home Description</label>
                <p>{!! $view->homedescription !!}</p>
              </div>

              @endif
              @if(isset($view->section))
              @php
              $sersection = json_decode($view->section); 
              @endphp
              @foreach($sersection as $key => $sersectionlist)
              <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$sersectionlist->service_heading}}</h4>
                    <p>{{$sersectionlist->button_type}}</p>
                    @if($sersectionlist->button_type=='Yes')
                    <p>{{$sersectionlist->button_name}}</p>
                    <p>{{$sersectionlist->button_url}}</p>
                    @endif
                    <p>{{$sersectionlist->appointment_side}}</p>
                    <p>{{$sersectionlist->bg_type}}</p>
                    @if($sersectionlist->bg_type=='bgcolor')
                    <p>{{$sersectionlist->bgcolor_style}}</p>
                    @endif
                    @if($sersectionlist->bg_type=='bgimage')
                    @if($sersectionlist->bgimage==NULL || $sersectionlist->bgimage=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section_banner/'.$sersectionlist->bgimage)}}" style="width:85px;height:85px;">
                                @endif
                    @endif
              </div>
                    @if(isset($sersectionlist->image))
                      <div class="form-group col-md-12">
                      @if($sersectionlist->image==NULL || $sersectionlist->image=='')
                        <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                        @else
                        <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$sersectionlist->image)}}" style="width:85px;height:85px;">
                        @endif
                      </div>
                      @endif
                      <!-- {!! $sersectionlist->section1 !!} -->
                      @if(isset($sersectionlist->section1))
                    <div class="col-sm-12">{!! $sersectionlist->section1 !!}</div>
                    @endif
                    @if(isset($sersectionlist->section2))
                    <div class="col-sm-12">{!! $sersectionlist->section2 !!}</div>
                    @endif
                    @if($sersectionlist->type == 'threeparagraph')
                      @if(isset($sersectionlist->threepragraph))
                      <?php 
                        $datasec = $sersectionlist->threepragraph;
                        // print_r($datasec->orderby);
                      ?>
                      @foreach($datasec->orderby as $orderkey => $threelist)
                      <div class="col-sm-12">{!! $datasec->threeparagraphdata[$orderkey] !!}</div>
                      @endforeach
                      @endif
                      @endif

              @endforeach
              @endif
              <!-- @foreach($service_sec as $serviceview)
                    @php $randsec = rand(9999, 99999);@endphp
                    @if($serviceview->type=='fulltext')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgcolorfulltext')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgimagefulltext')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    @if($serviceview->image==NULL || $serviceview->image=='')
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                    @else
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif

                    @if($serviceview->type=='imagetext')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    @if($serviceview->image==NULL || $serviceview->image=='')
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                    @else
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif

                    @if($serviceview->type=='rightimagetext')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    @if($serviceview->image==NULL || $serviceview->image=='')
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                    @else
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif

                    @if($serviceview->type=='leftheading')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgcolorleftheading')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgimageleftheading')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    @if($serviceview->image==NULL || $serviceview->image=='')
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                    @else
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='twoparagraph')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    <div class="col-sm-12">{!! $serviceview->section2 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgcolortwoparagraph')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    <div class="col-sm-12">{!! $serviceview->section2 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='bgimagetwoparagraph')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    @if($serviceview->image==NULL || $serviceview->image=='')
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                    @else
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    </div>
                    @endif
                    @if($serviceview->type=='afterformtwoparagraph')
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                    <h4>{{$serviceview->heading}}</h4>
                    <p>{{$serviceview->button_type}}</p>
                    @if($serviceview->button_type=='Yes')
                    <p>{{$serviceview->button_name}}</p>
                    <p>{{$serviceview->button_url}}</p>
                    @endif
                    <div class="col-sm-12">{!! $serviceview->section1 !!}</div>
                    <div class="col-sm-12">{!! $serviceview->section2 !!}</div>
                    </div>
                    @endif
                    @endforeach -->
             
              <div class="form-group col-sm-12">
                <label>Alt Tag</label>
                <p>{{$view->alt_tag}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Videolink</label>
                <p>{{ $view->video_link }}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Title Tag</label>
                <p>{{$view->title_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Keyword Tag</label>
                <p>{{$view->keyword_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Description Tag</label>
                <p>{{$view->description_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Canonical</label>
                <p>{{$view->canonical_tag}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Url</label>
                <p>{{$view->url}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/service_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Publish
                </a>&nbsp;&nbsp;&nbsp;
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

<!--main content end-->
@endsection