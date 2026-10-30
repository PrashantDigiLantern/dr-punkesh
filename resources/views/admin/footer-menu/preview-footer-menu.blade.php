@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Footer Menu Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/Admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/footer-menu')}}">Footer</a></li>
          <li class="active">Footer Menu Preview</li>
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
                <p>{{$view->footer_name}}</p>
              </div>
             
              <div class="form-group col-sm-12">
              <div class="col-sm-12">
                <label>Menu Detail</label>
              </div>

                @if(isset($view->menu_name))
                    @php
                    $menu = json_decode($view->menu_name);
                    @endphp
                    @foreach($menu->menuname as $primenukey => $menunamelist)
                    <div class="col-sm-12">
                <div class="col-sm-2">
                  @if($primenukey=='0')
                  <label class="control-label">Menu Name</label>
                  @endif
                  {{$menunamelist->menu_name}}
                </div>
                <div class="col-sm-2">
                  @if($primenukey=='0')
                  <label class="control-label">Menu Url</label>
                  @endif
                  {{$menunamelist->menu_url}}
                </div>
                <div class="col-sm-2">
                  @if($primenukey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  {{$menunamelist->menu_order_by}}
                </div>
                    </div>
               
                @endforeach
                
                @endif
              </div>
              
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/footer_menu_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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