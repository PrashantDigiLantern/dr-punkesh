@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Press & Media List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/pressmedia')}}">Press & Media</a></li>
          <li class="active">Press & Media List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-pressmedia')}}" class="btn btn-primary">Add Press & Media</a>
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
                  <th>Category Name</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->press_id}}
                  </td>
                  <td>
                    {{$viewlist->category_name}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->short_desc, 0, 130).'...' !!}
                  </td>
                  <td>
                  @if($viewlist->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/image/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->press_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->press_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->press_id}}','active')">Inactive</button>
                  @endif
                  @if($viewlist->press_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_pressmedia/'.$viewlist->press_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#press{{$viewlist->press_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_pressmedia/'.$viewlist->press_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="press{{$viewlist->press_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->press_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Category Name</td>
                  <td>{{$viewlist->category_name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Name</td>
                  <td>{{$viewlist->name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Dr Name</td>
                  <td>{{ $viewlist->dr_name }}</td>
                </tr>
                <!-- <tr>
                  <td style="width: 20%;">Dr Description</td>
                  <td>{!! $viewlist->dr_description !!}</td>
                </tr> -->
                <tr>
                  <td style="width: 20%;">Short Desc</td>
                  <td>{!! $viewlist->short_desc !!}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description</td>
                  <td>{!! $viewlist->description !!}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/image/'.$viewlist->image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Banner Image</td>
                  <td><img src="{{url('/images/pressmedia/banner/'.$viewlist->banner_image)}}" class="imgwidth"></td>
                </tr>
               
                <tr>
                  <td style="width: 20%;">Date</td>
                  <td>{{$viewlist->date}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Alt Tag</td>
                  <td>{{ $viewlist->alt_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Videolink</td>
                  <td>{{ $viewlist->videolink}}</td>
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
        url : "{{url('/admin/getactive-pressmedia')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/pressmedia')}}";
        },
    });
   }
   
</script>
<!--main content end-->
@endsection