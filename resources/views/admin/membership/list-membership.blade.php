@extends('admin.master')
@section('content')
<!--main content start-->

<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
				 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Membership List</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/membership')}}">Membership</a>
        </li>
        <li class="breadcrumb-item active">Membership List</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
		<!-- <div class="container">
<div class="card">
        <div class="card-content textalign">
     <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-membership')}}" class="btn btn-primary">Add Membership</a>
        @endif
      </div>
  </div>
</div>
</div>
	 -->
	
     <div>
        <h1>Membership List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/membership')}}">Membership</a></li>
          <li class="active">Membership List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-membership')}}" class="btn btn-primary">Add Membership</a>
        @endif
      </div>
    </div>
	
	<div class="container1">

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
                   {{$viewlist->mem_id}}
                  </td>
                  <td>
                  @if($viewlist->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->mem_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->member_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_membership/'.$viewlist->mem_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#membership{{$viewlist->mem_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_membership/'.$viewlist->mem_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="membership{{$viewlist->mem_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->mem_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$viewlist->image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Full Image</td>
                  <td><img src="{{url('/images/membership/'.$viewlist->full_image)}}" class="imgwidth"></td>
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
	 </div>

    <!-- @if($count > 0)
    <div class="card">
      <div class="card-body">
        <div class="row">
          @foreach($view as $viewlist)
          <div class="col-sm-3 marginB30">
            <div class="gallerysec">
              <a href="{{url('/admin/delete_gallery/'.$viewlist->mem_id)}}">
                <div class="deleteimg">X</div>
              </a>
              <a data-toggle="modal" data-target="#myModal{{$viewlist->mem_id}}"><img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$viewlist->gallery_image)}}" class="galleryimg"></a>
              <p>{{$viewlist->alt_tag}}</p>
              <div id="myModal{{$viewlist->mem_id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                   Modal content
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <form action="{{URL::to('/update_gallery/'.$viewlist->mem_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
</div>

<!--main content end-->
@endsection