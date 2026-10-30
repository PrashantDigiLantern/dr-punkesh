@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Membership List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/about')}}">About</a></li>
          <li class="active">Membership List</li>
        </ul>
      </div>
     
    </div>
   
        <div class="card">
          <div class="card-body">
          <form action="{{URL::to('/admin/create_membership')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <div class="row">
          <div class="form-group  col-md-4">
              <label class="control-label">Membership Image</label>
              <input class="form-control" name="image" type="file" required>
          </div>
          
          <div class="form-group  col-md-4">
              <label class="control-label">Image Alt Tag</label>
              <input class="form-control"  name="alt_tag" type="text">
          </div>
          <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                               <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>
                        </div>
        </div>
        </form>
      </div>
    </div>

    @if($count > 0)
        <div class="card">
          <div class="card-body">
          <div class="row">
            @foreach($view as $viewlist)
            <div class="col-sm-3 marginB30">
              <div class="gallerysec">
                <a href="{{url('/admin/delete_membership/'.$viewlist->id)}}"><div class="deleteimg">X</div></a>
              <a data-toggle="modal" data-target="#myModal{{$viewlist->id}}"><img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$viewlist->image)}}" class="galleryimg"></a>
                <p>{{$viewlist->alt_tag}}</p>
              <div id="myModal{{$viewlist->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <form action="{{URL::to('/update_membership/'.$viewlist->id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <div class="form-group ">
              <label class="control-label">Image Alt Tag</label>
              <input class="form-control"  name="alt_tag" value="{{$viewlist->alt_tag}}" type="text">
          </div>

          <button type="submit" class="btn btn-primary icon-btn" type="button">
                               <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>
      </form>
      </div>
     
    </div>

  </div>
</div>
              </div>
              </div>
            @endforeach
          </div>
        </div>
    </div>
    @endif
  </section>
</section>

<!--main content end-->
@endsection