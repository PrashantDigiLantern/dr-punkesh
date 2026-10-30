@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Blogs List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/blogs')}}">Blogs</a></li>
          <li class="active">Blogs List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-blogs')}}" class="btn btn-primary">Add Blog</a>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Blog Name</th>
                  <th>Blog Description</th>
                  <th>Blog Image</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->blg_id}}
                  </td>
                  
                  <td>
                  {{$viewlist->blog_name}}
                  </td>
                  <td>
                  {!! substr($viewlist->short_desc, 0, 130).'...' !!}
                  </td>
                  <td>
                  @if($viewlist->blog_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$viewlist->blog_image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">
                 
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->blg_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->blg_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->blg_id}}','active')">Inactive</button>
                  @endif
                  @if($viewlist->blog_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_blogs/'.$viewlist->blg_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#blog{{$viewlist->blg_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
		              
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_blogs/'.$viewlist->blg_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                  
              <!-- Modal -->
<div id="blog{{$viewlist->blg_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$viewlist->name}}</h4>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>{{$viewlist->blg_id}}</td>
                </tr>
                <tr>
                  <td>Show Type</td>
                  <td>{{$viewlist->blog_show_type}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Doctor Name</td>
                  <td>{{$viewlist->name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Doctor Description</td>
                  <td>{!! $viewlist->dr_description !!}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Blog Date</td>
                  <td>{{strip_tags($viewlist->date)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Blog Name</td>
                  <td>{{$viewlist->blog_name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Short Desc</td>
                  <td>{!! $viewlist->short_desc !!}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description</td>
                  <td>{!! $viewlist->blog_description !!}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$viewlist->blog_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Blog Inner Image</td>
                  <td><img src="{{url('/images/blog/'.$viewlist->blog_image_inner)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Alt Image Name</td>
                  <td>{{ $viewlist->alt_image_name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Tags</td>
                  <td>{{ $viewlist->tags}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Title Tag</td>
                  <td>{{ $viewlist->title_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Keyword Tag</td>
                  <td>{{$viewlist->keyword_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description Tag</td>
                  <td>{{$viewlist->description_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Canonical</td>
                  <td>{{$viewlist->canonical}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Url</td>
                  <td>{{$viewlist->url}}</td>
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
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<script>
 function getactive(id,status){
   var token = $('#token' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/getactive-blog')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/blogs')}}";
        },
    });
   }
</script>
<!--main content end-->
@endsection