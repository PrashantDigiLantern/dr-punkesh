@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Gallery List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/gallery')}}">Gallery</a></li>
          <li class="active">Gallery List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-gallery')}}" class="btn btn-primary">Add Gallery</a>
        @endif
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->gallery_id}}
                  </td>
                  <td>
                  @if($viewlist->gallery_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$viewlist->gallery_image)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->gallery_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->gallery_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_gallery/'.$viewlist->gallery_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#gallery{{$viewlist->gallery_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_gallery/'.$viewlist->gallery_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="gallery{{$viewlist->gallery_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>{{$viewlist->gallery_id}}</td>
                </tr>
                <tr>
                  <td>Gallery Show Type</td>
                  <td>{{$viewlist->gallery_show_type}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$viewlist->gallery_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Full Image</td>
                  <td><img src="{{url('/images/gallery/'.$viewlist->full_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                
                  <td style="width: 20%;">Alt Tag</td>
                  <td>{{$viewlist->alt_tag}}</td>
                </tr>
              </tbody>
                  </td>
                </tr> 
            </table>
            </div>
     
     </div>
 
   </div>
 </div>
                   </td>
                 </tr> 
                @endforeach
                 <!-- End foreach loop -->
               </tbody>
             </table>
        <!-- <form action="{{URL::to('/create_gallery')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
          <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
          <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
          <div class="row">
            <div class="form-group  col-md-4">
              <label class="control-label">Gallery Thumb</label>
              <input class="form-control" name="gallery_image" type="file" required>
            </div>

            <div class="form-group  col-md-4">
              <label class="control-label">Gallery Full Image</label>
              <input class="form-control" name="full_image" type="file" required>
            </div>

            <div class="form-group  col-md-4">
              <label class="control-label">Image Alt Tag</label>
              <input class="form-control" name="alt_tag" type="text">
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>
            </div>
          </div>
        </form> -->
      </div>
    </div>

    <!-- @if($count > 0)
    <div class="card">
      <div class="card-body">
        <div class="row">
          @foreach($view as $viewlist)
          <div class="col-sm-3 marginB30">
            <div class="gallerysec">
              <a href="{{url('/admin/delete_gallery/'.$viewlist->gallery_id)}}">
                <div class="deleteimg">X</div>
              </a>
              <a data-toggle="modal" data-target="#myModal{{$viewlist->gallery_id}}"><img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$viewlist->gallery_image)}}" class="galleryimg"></a>
              <p>{{$viewlist->alt_tag}}</p>
              <div id="myModal{{$viewlist->gallery_id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                   Modal content
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <form action="{{URL::to('/update_gallery/'.$viewlist->gallery_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                        <div class="form-group ">
                          <label class="control-label">Image Alt Tag</label>
                          <input class="form-control" name="alt_tag" value="{{$viewlist->alt_tag}}" type="text">
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
    @endif -->
  </section>
</section>

<!--main content end-->
@endsection