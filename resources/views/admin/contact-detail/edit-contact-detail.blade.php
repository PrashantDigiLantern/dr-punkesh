@extends('admin.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
  <div class="card cardsec">
                <div class="card-body"> 
                      <div class="page-title pagetitle">
        <h1>Add Address Detail</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/address-list')}}">Address Detail List</a></li>
          <li class="active">Add Address Detail</li>
        </ul>
      </div>   
      </div>  
      </div> 
            <!-- Start form here -->
             <form action="{{URL::to('/admin/create_address')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
             <input type="hidden" value="{{ csrf_token() }}" name="_token">    
             <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" value="@if(isset($view->contact_id)){{ $view->contact_id }}@else {{'0'}} @endif" name="contact_id">
             <div class="card">
                    <div class="card-body">
                                        
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($view->show_type))@if($view->show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($view->show_type))@if($view->show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" value="@if(isset($view->name)){{$view->name}}@endif" name="name" type="text">
                        </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                            <label class="control-label">Address</label>
                            <input class="form-control" value="@if(isset($view->address)){{$view->address}}@endif" name="address" type="text">
                        </div>
                        </div>
                        
                            </div>
                        </div>
                       
                       
                       
                       
                        @if(isset($view->email_id))
                    @php
                    $emailid = json_decode($view->email_id);
                   
                    @endphp
                    @foreach($emailid->primary as $priemakey => $emaillist)
                        <?php $rand = rand(9999, 99999); ?>
                        <div class="row" id="typenamelist{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($priemakey=='0')
                            <label class="control-label">Select Type</label>
                            @endif
                            <select class="form-control" name="emailstatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" @if(isset($emaillist->emailstatus))@if($emaillist->emailstatus == 'primary') selected @endif @endif>Primary</option>
                            <option value="secondary" @if(isset($emaillist->emailstatus))@if($emaillist->emailstatus == 'secondary') selected @endif @endif>Secondary</option>
                            </select>
                        </div>
                        </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                            @if($priemakey=='0')
                            <label class="control-label">Email ID</label>
                            @endif
                            <input class="form-control" name="email[]" value="{{$emaillist->email}}" type="email">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($priemakey=='0')
                            <label class="control-label">Order By</label>
                            @endif
                            <input class="form-control"  name="email_order_by[]" value="{{$emaillist->email_order_by}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                        @if($priemakey=='0')
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addemail()">+</button>
                            </div>
                            @else
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removeemaillist('{{$rand}}')">-</button>
                             </div>
                            @endif
                            </div>
                        </div>
                        @endforeach
                        @foreach($emailid->secondary as $priemakey => $emaillist)
                        <?php $rand = rand(9999, 99999); ?>
                        <div class="row" id="typenamelist{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <select class="form-control" name="emailstatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" @if(isset($emaillist->emailstatus))@if($emaillist->emailstatus == 'primary') selected @endif @endif>Primary</option>
                            <option value="secondary" @if(isset($emaillist->emailstatus))@if($emaillist->emailstatus == 'secondary') selected @endif @endif>Secondary</option>
                            </select>
                        </div>
                        </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="email[]" value="{{$emaillist->email}}" type="email">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <input class="form-control"  name="email_order_by[]" value="{{$emaillist->email_order_by}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removeemaillist('{{$rand}}')">-</button>
                             </div>
                            </div>
                        </div>
                        @endforeach
                        @else                        
                        <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Select Type</label>
                            <select class="form-control" name="emailstatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" selected>Primary</option>
                            <option value="secondary">Secondary</option>
                            </select>
                        </div>
                        </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Email ID</label>
                            <input class="form-control"  name="email[]" value="" type="email">
                        </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Order By</label>
                            <input class="form-control"  name="email_order_by[]" value="" type="text">
                        </div>
                        </div>
                       
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addemail()">+</button>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div id="addemail"></div>

                       
                       
                        @if(isset($view->phone))
                @php
                $phonenum = json_decode($view->phone);
              
                @endphp
                @foreach($phonenum->primary as $priphokey => $phonenumber)
                        <?php $rand = rand(9999, 99999); ?>
                        <div class="row" id="typenamelist{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($priphokey=='0')
                            <label class="control-label">Select Type</label>
                            @endif
                            <select class="form-control" name="phonestatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" @if(isset($phonenumber->phonestatus))@if($phonenumber->phonestatus == 'primary') selected @endif @endif>Primary</option>
                            <option value="secondary" @if(isset($phonenumber->phonestatus))@if($phonenumber->phonestatus == 'secondary') selected @endif @endif>Secondary</option>
                            </select>
                        </div>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            @if($priphokey=='0')
                            <label class="control-label">Phone Number</label>
                            @endif
                            <input class="form-control"  name="phone[]" value="{{$phonenumber->phone}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($priphokey=='0')
                            <label class="control-label">Order By</label>
                            @endif
                            <input class="form-control"  name="phone_order_by[]" value="{{$phonenumber->phone_order_by}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                        @if($priphokey=='0')
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addphone()">+</button>
                            </div>
                            @else
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removephonelist('{{$rand}}')">-</button>
                             </div>
                            @endif
                            </div>
                        </div>
                        @endforeach
                        @foreach($phonenum->secondary as $secphokey => $phonenumber)
                        <?php $rand = rand(9999, 99999); ?>
                        <div class="row" id="typenamelist{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <select class="form-control" name="phonestatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" @if(isset($phonenumber->phonestatus))@if($phonenumber->phonestatus == 'primary') selected @endif @endif>Primary</option>
                            <option value="secondary" @if(isset($phonenumber->phonestatus))@if($phonenumber->phonestatus == 'secondary') selected @endif @endif>Secondary</option>
                            </select>
                        </div>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <input class="form-control"  name="phone[]" value="{{$phonenumber->phone}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <input class="form-control"  name="phone_order_by[]" value="{{$phonenumber->phone_order_by}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-danger" type="button" onclick="removephonelist('{{$rand}}')">-</button>
                             </div>
                            </div>
                        </div>
                        @endforeach
                       @else
                        <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Select Type</label>
                            <select class="form-control" name="phonestatus[]">
                            <option value="">Select Type</option>
                            <option value="primary" selected>Primary</option>
                            <option value="secondary">Secondary</option>
                            </select>
                        </div>
                        </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control"  name="phone[]" value="" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Order By</label>
                            <input class="form-control"  name="phone_order_by[]" value="" type="text">
                        </div>
                        </div>
                       
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addphone()">+</button>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div id="addphone"></div>
                        @if(isset($view->timings))
                @php
                $timings = json_decode($view->timings);
               
                @endphp
                @foreach($timings->days as $timingskey => $timinglist)
                <?php $dayrand = rand(9999,99999)?>
                        <div class="row" id="removedaylist{{$dayrand}}">
                            <div class="col-sm-4">
                            <div class="form-group">
                            @if($timingskey=='0')
                            <label class="control-label">Days</label>
                            @endif
                            <input class="form-control"  name="day[]" value="{{$timinglist->day}}" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($timingskey=='0')
                            <label class="control-label">Start Time</label>
                            @endif
                            <input class="form-control"  name="start_time[]" value="{{$timinglist->start_time}}" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($timingskey=='0')
                            <label class="control-label">End Time</label>
                            @endif
                            <input class="form-control"  name="end_time[]" value="{{$timinglist->end_time}}" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($timingskey=='0')
                            <label class="control-label">Select Type</label>
                            @endif
                            <select class="form-control" name="status[]">
                            <option value="">Select Type</option>
                            <option value="open" @if(isset($timinglist->status))@if($timinglist->status == 'open') selected @endif @endif>Open</option>
                            <option value="closed" @if(isset($timinglist->status))@if($timinglist->status == 'closed') selected @endif @endif>Closed</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            @if($timingskey=='0')
                            <button class="btn btn-primary marginT38" type="button" onclick="addday()">+</button>
                            @else
                            <button class="btn btn-danger" type="button" onclick="removedaylist('{{$dayrand}}')">-</button>
                            @endif
                            </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label class="control-label">Days</label>
                            <input class="form-control"  name="day[]" value="" type="text">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Start Time</label>
                            <input class="form-control"  name="start_time[]" value="" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">End Time</label>
                            <input class="form-control"  name="end_time[]" value="" type="time">
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="control-label">Select Type</label>
                            <select class="form-control" name="status[]">
                            <option value="">Select Type</option>
                            <option value="open" selected>Open</option>
                            <option value="closed">Closed</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <button class="btn btn-primary marginT38" type="button" onclick="addday()">+</button>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div id="addday"></div>
                       
                       

                        <div class="row">
        
                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn">
                               <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/address-list')}}" >
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
  
   function addphone(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addphone')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addphone").append(result);  
        },
        complete: function () {
        },
    });
    }

    addday

    function removephone(rand){
        $("#remove"+rand).remove();
    }

    function removephonelist(rand){
        $("#removephone"+rand).remove();
    }

    function addemail(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addemail')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addemail").append(result);  
        },
        complete: function () {
        },
    });
    }

    function removeemail(rand){
        $("#remove"+rand).remove();
    }

    function removeemaillist(rand){
        $("#removeemail"+rand).remove();
    }

    function addday(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addday')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addday").append(result);  
        },
        complete: function () {
        },
    });
    }

    

    function removeday(rand){
        $("#remove"+rand).remove();
    }

    function removedaylist(rand){
        $("#removeday"+rand).remove();
    }

    function removedaylist(rand){
        $("#removedaylist"+rand).remove();
    }
    
</script>
@endsection