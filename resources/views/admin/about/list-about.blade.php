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
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>List About</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/about')}}">About</a>
        </li>
        <li class="breadcrumb-item active">List About</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
		<!-- <div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="http://192.168.0.91:8000/add-site">Add Site</a>
  </div>
</div>
</div> -->
	
	
	
	
     <div>
        <h1>List About</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/about')}}">About</a></li>
          <li class="active">List About</li>
        </ul>
      </div>
      <div>
        @if($view->isEmpty())
        <a href="{{url('/admin/about')}}" class="btn btn-primary">Add About</a>
        @endif
      </div>
    </div>
	<div class="container1">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Heading</th>
                  <th>Section</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as  $viewlist)
                <tr>
                  <td>
                    {{$viewlist->heading1}}
                  </td>
                  <td>
                  {!! substr($viewlist->section1, 0, 130).'...' !!}
                  </td>

                  <td>
                  @if($viewlist->about_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/about/'.$viewlist->abt_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#about{{$viewlist->abt_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    <!-- <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/delete_concern/'.$viewlist->abt_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
                     <!-- Modal -->
                     <div id="about{{$viewlist->abt_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->heading1}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->abt_id}}</td>
                                </tr>
                                @if(isset($viewlist->heading1))
                                <tr>
                                  <td style="width: 20%;">Heading1</td>
                                  <td>{{$viewlist->heading1}}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->section1))
                                <tr>
                                  <td style="width: 20%;">Section1</td>
                                  <td>{!! $viewlist->section1 !!}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->section2))
                                <tr>
                                  <td style="width: 20%;">Section2</td>
                                  <td>{!! $viewlist->section2 !!}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->heading2))
                                <tr>
                                  <td style="width: 20%;">Heading2</td>
                                  <td>{{$viewlist->heading2}}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->section3))
                                <tr>
                                  <td style="width: 20%;">Section3</td>
                                  <td>{!! $viewlist->section3 !!}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->heading3))
                                <tr>
                                  <td style="width: 20%;">Heading3</td>
                                  <td>{{$viewlist->heading3}}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->section4))
                                <tr>
                                  <td style="width: 20%;">Section4</td>
                                  <td>{!! $viewlist->section4 !!}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->heading4))
                                <tr>
                                  <td style="width: 20%;">Heading4</td>
                                  <td>{{$viewlist->heading4}}</td>
                                </tr>
                                @endif
                                @if(isset($viewlist->section5))
                                <tr>
                                  <td style="width: 20%;">Section5</td>
                                  <td>{!! $viewlist->section5 !!}</td>
                                </tr>
                                @endif
                               
                              </tbody>
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
</div>
</div>
<!--main content end-->
@endsection