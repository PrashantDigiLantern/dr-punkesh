@extends('admin.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
  <div class="card cardsec">
                <div class="card-body"> 
                      <div class="page-title pagetitle">
        <h1>Add Footer Menu</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/footer-menu')}}">Footer</a></li>
          <li><a href="{{url('/admin/footer-menu')}}">Footer Menu List</a></li>
          <li class="active">Add Footer Menu</li>
        </ul>
      </div>   
      </div>  
      </div> 
            <!-- Start form here -->
             <form action="{{URL::to('/admin/create_footer_menu')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
             <input type="hidden" value="{{ csrf_token() }}" name="_token">    
             <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="footer_type" value="rightside">
            <input type="hidden" value="@if(isset($view->footer_id)){{ $view->footer_id }}@else {{'0'}} @endif" name="footer_id">
             <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" value="@if(isset($view->footer_name)){{$view->footer_name}}@endif" name="footer_name" type="text">
                        </div>
                        </div>
                                               
                            </div>
                        </div>
                       
                       
                       
                       
                        @if(isset($view->menu_name))
                    @php
                    $menuname = json_decode($view->menu_name);
                   
                    @endphp
                    @foreach($menuname->menuname as $primanukey => $menulist)
                        <?php $rand = rand(9999, 99999); ?>
                        <div class="row" id="removemenu{{$rand}}">
                       

                            <div class="col-sm-4">
                            <div class="form-group">
                            @if($primanukey=='0')
                            <label class="control-label">Email ID</label>
                            @endif
                            <input class="form-control" name="menu_name[]" value="{{$menulist->menu_name}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            @if($primanukey=='0')
                            <label class="control-label">Menu Url</label>
                            @endif
                            <input class="form-control"  name="menu_url[]" value="{{$menulist->menu_url}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($primanukey=='0')
                            <label class="control-label">Order By</label>
                            @endif
                            <input class="form-control"  name="menu_order_by[]" value="{{$menulist->menu_order_by}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                        @if($primanukey=='0')
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addmenulist()">+</button>
                            </div>
                            @else
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removemenulist('{{$rand}}')">-</button>
                             </div>
                            @endif
                            </div>
                        </div>
                        @endforeach
                       
                        @else                        
                        <div class="row">
                      

                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Menu</label>
                            <input class="form-control"  name="menu_name[]" value="" type="text">
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Url</label>
                            <input class="form-control"  name="menu_url[]" value="" type="text">
                        </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Order By</label>
                            <input class="form-control"  name="menu_order_by[]" value="" type="text">
                        </div>
                        </div>
                       
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addmenulist()">+</button>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div id="addmenulist"></div>

                       
                      
                        <div class="row">
        
                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn">
                               <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/footer-menu')}}" >
                                 <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                 </div>
                </div>
         </form>
          <!-- End form -->
    
  </section>
</section>

<script>
   CKEDITOR.replace( 'textArea' );
  
   function addmenulist(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/add-footer-menu-list')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addmenulist").append(result);  
        },
        complete: function () {

        },
    });
    }

    function removemenu(rand){
        $("#remove"+rand).remove();
    }

    function removemenulist(rand){
        $("#removemenu"+rand).remove();
    }
    
</script>
@endsection