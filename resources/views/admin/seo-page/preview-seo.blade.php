@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Seo Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/seo')}}">Seo</a></li>
          <li class="active">Seo Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-12">
                <label>Seo Name</label>
                <p>{{$view->page_name}}</p>
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
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->image))
                  @if($view->image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/seo/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>
              <div class="form-group col-sm-12">
                <label>Type</label>
                <p>{{$view->type}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Site Name</label>
                <p>{{$view->site_name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Url</label>
                <p>{{$view->url}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/create_seo_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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
<script>
  function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-testimonials')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/testimonials')}}";
      },
    });
  }
</script>
<!--main content end-->
@endsection