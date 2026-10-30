@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Doctor Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/Admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/doctor-list')}}">Doctor</a></li>
          <li class="active">Doctor Preview</li>
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
              <div class="form-group col-sm-12">
                <label>Name</label>
                <p>{{$view->name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Show Type</label>
                <p>{{$view->show_type}}</p>
              </div>
              <div class="form-group  col-md-4">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->image))
                  @if($view->image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>

              <div class="form-group  col-md-4">
                <div class="form-group">
                  <label class="control-label">Banner Image</label>
                  @if(isset($view->banner_image))
                  @if($view->banner_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label>Short Degree</label>
                <p>{{ $view->short_degree }}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Description</label>
                <p>{!! $view->sort_desc !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Description1</label>
                <p>{!! $view->description !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Education Detail</label>

                @if(isset($view->education_detail))
                    @php
                    $educationdetail = json_decode($view->education_detail);
                    @endphp
                    @foreach($educationdetail->education as $edukey => $education)
                <div class="col-sm-2">
                  @if($edukey=='0')
                  <label class="control-label">Education Year</label>
                  @endif
                  {{$education->education_year}}
                </div>
                <div class="col-sm-2">
                  @if($edukey=='0')
                  <label class="control-label">Education Name</label>
                  @endif
                  {{$education->education_name}}
                </div>
                <div class="col-sm-2">
                  @if($edukey=='0')
                  <label class="control-label">Education Address</label>
                  @endif
                  {{$education->education_college}}
                </div>
                <div class="col-sm-2">
                  @if($edukey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  {{$education->education_order_by}}
                </div>
                @endforeach
                @endif
              </div>
              <div class="form-group col-sm-12">
                <label>Experience Detail</label>

                @if(isset($view->experience_detail))
                @php
                $experiencedetail = json_decode($view->experience_detail);
                @endphp
                @foreach($experiencedetail->experience as $expkey => $experience)
                <div class="col-sm-2">
                  @if($expkey=='0')
                  <label class="control-label">Experience Year</label>
                  @endif
                  {{$experience->experience_year}}
                </div>
                <div class="col-sm-2">
                  @if($expkey=='0')
                  <label class="control-label">Experience Name</label>
                  @endif
                  {{$experience->experience_name}}
                </div>
                <div class="col-sm-2">
                  @if($expkey=='0')
                  <label class="control-label">Experience Address</label>
                  @endif
                  {{$experience->experience_address}}
                </div>
                <div class="col-sm-2">
                  @if($expkey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  {{$experience->experience_order_by}}
                </div>
                @endforeach
                @endif
              </div>
              <div class="form-group col-sm-12">
                <label>Alt Tag</label>
                <p>{{$view->alt_tag}}</p>
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
                <label>Canonical Tag</label>
                <p>{{$view->canonical_tag}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Url</label>
                <p>{{$view->url}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/doctor_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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