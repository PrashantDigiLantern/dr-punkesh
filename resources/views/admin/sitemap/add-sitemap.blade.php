@extends('admin.master')

@section('content')

@php 

$primeid = session('primeid');

@endphp

<style>

textarea.height600{

  height:600px;

}

  </style>

<section id="main-content">

  <section class="wrapper">

    <div class="card cardsec">

      <div class="card-body">

        <div class="page-title pagetitle">

          <h1>Add Sitemap</h1>

          <ul class="breadcrumb side">

            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>

            <li><a href="{{url('/admin/sitemap')}}">Sitemap List</a></li>

            <li class="active">Add Sitemap</li>

          </ul>

        </div>

      </div>

    </div>

    <!-- Start form here -->

    

      <!-- @csrf -->

      <div class="card">

        <div class="card-body">

        <ul class="nav nav-pills">

    <li class="active"><a data-toggle="pill" href="#sitemapxml">Sitemap XML</a></li>

    <li><a data-toggle="pill" href="#sitemaphtml">Sitemap HTML</a></li>

  </ul>



  <div class="tab-content">

    <div id="sitemapxml" class="tab-pane fade in active">

    <form action="{{URL::to('/admin/create_sitemap')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

      <input type="hidden" value="{{ csrf_token() }}" name="_token">

      <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">

      <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">

      <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">

      <input type="hidden" name="sitemap_id" id="sitemap_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">

    <div class="row">

            <div class="form-group col-md-12">

              <label class="control-label">Sitemap XML</label>

              <textarea class="form-control height600" name="sitemapxml" cols="12" rows="12">@if(isset($view->sitemapxml)){{$view->sitemapxml}}@endif</textarea>

            </div>

            

            <div class="col-sm-12 marginT30">

              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">

                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit

              </button>&nbsp;&nbsp;&nbsp;

              <a class="btn btn-default icon-btn" href="{{url('/admin/sitemap')}}">

                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel

              </a>

            </div>

          </div>

          </form>

    </div>

    <div id="sitemaphtml" class="tab-pane fade">

    <form action="{{URL::to('/admin/create_sitemap')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

      <input type="hidden" value="{{ csrf_token() }}" name="_token">

      <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">

      <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">

      <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">

      <input type="hidden" name="sitemap_id" id="sitemap_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">

    <div class="row">

            <div class="form-group col-sm-12">

              <label>Sitemap HTML</label>

              <textarea class="form-control height600 ckeditor" name="sitemaphtml" cols="12" rows="12">@if(isset($view->sitemaphtml)){{$view->sitemaphtml}}@endif</textarea>

            </div>

            

            <div class="col-sm-12 marginT30">

              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">

                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit

              </button>&nbsp;&nbsp;&nbsp;

              <a class="btn btn-default icon-btn" href="{{url('/admin/sitemap')}}">

                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel

              </a>

            </div>

          </div>

          </form>

    </div>

  </div>

          

        </div>

      </div>

    

    <!-- End form -->



  </section>

</section>



<script>

  CKEDITOR.replace('textArea');

</script>

@endsection