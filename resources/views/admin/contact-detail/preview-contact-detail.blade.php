@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Address Detail Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/Admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/address-list')}}">Address Detail</a></li>
          <li class="active">Address Detail Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-12">
                <label>Name</label>
                <p>{{$view->name}}</p>
              </div>
             
              <div class="form-group col-sm-12">
                <label>Address</label>
                <p>{{ $view->address }}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Address Two</label>
                <p>{{ $view->address1 }}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Address Three</label>
                <p>{{ $view->address2 }}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Pincode</label>
                <p>{{ $view->pincode }}</p>
              </div>
              <div class="form-group col-sm-12">
              <div class="col-sm-12">
                <label>Email Detail</label>
              </div>

                @if(isset($view->email_id))
                    @php
                    $emailid = json_decode($view->email_id);
                   
                    @endphp
                    @foreach($emailid->primary as $priemakey => $emaillist)
                    <div class="col-sm-12">
                <div class="col-sm-2">
                  @if($priemakey=='0')
                  <label class="control-label">Primary Email</label>
                  @endif
                  {{$emaillist->email}}
                </div>
                <div class="col-sm-2">
                  @if($priemakey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  {{$emaillist->email_order_by}}
                </div>
                    </div>
               
                @endforeach
                @if(isset($emailid->secondary))
                @foreach($emailid->secondary as $secemakey => $emaillist)
                <div class="col-sm-12">
                   <div class="col-sm-2">
                     @if($secemakey=='0')
                     <label class="control-label">Secondary Email</label>
                     @endif
                     {{$emaillist->email}}
                   </div>
                   <div class="col-sm-2">
                     @if($secemakey=='0')
                     <label class="control-label">Order By</label>
                     @endif
                     {{$emaillist->email_order_by}}
                   </div>
                </div>
                   @endforeach
                   @endif
                @endif
              </div>
              <div class="form-group col-sm-12">
              <div class="col-sm-12">
                <label>Phone Number Detail</label>
              </div>
                @if(isset($view->phone))
                @php
                $phonenum = json_decode($view->phone);
                @endphp
                @foreach($phonenum->primary as $priphokey => $phonenumber)
                <div class="col-sm-12">
                <div class="col-sm-2">
                  @if($priphokey=='0')
                  <label class="control-label">Primary Country Code</label>
                  @endif
                  </p>{{$phonenumber->phonecode}}</p>
                </div>
                <div class="col-sm-2">
                  @if($priphokey=='0')
                  <label class="control-label">Primary Phone No.</label>
                  @endif
                  </p>{{$phonenumber->phone}}</p>
                </div>
                <div class="col-sm-2">
                  @if($priphokey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  <p>{{$phonenumber->phone_order_by}}</p>
                </div>
                </div>
                @endforeach
                @if(isset($phonenum->secondary))
                @foreach($phonenum->secondary as $secphokey => $phonenumber)
                <div class="col-sm-12">
                <div class="col-sm-2">
                  @if($secphokey=='0')
                  <label class="control-label">Secondary Country Code</label>
                  @endif
                  <p>{{$phonenumber->phonecode}}</p>
                </div>
                <div class="col-sm-2">
                  @if($secphokey=='0')
                  <label class="control-label">Secondary Phone No.</label>
                  @endif
                  <p>{{$phonenumber->phone_order_by}}</p>
                </div>
                <div class="col-sm-2">
                  @if($secphokey=='0')
                  <label class="control-label">Order By</label>
                  @endif
                  <p>{{$phonenumber->phone}}</p>
                </div>
                </div>
                @endforeach
                @endif
                @endif
              </div>
              <div class="form-group col-sm-12">
              <div class="col-sm-12">
                <label>Timing Detail</label>
              </div>
              @if(isset($view->timings))
                @php
                $timings = json_decode($view->timings);
               
                @endphp
                @foreach($timings->days as $timingskey => $timinglist)


                <div class="col-sm-12">
                <div class="col-sm-2">
                  @if($timingskey=='0')
                  <label class="control-label">Days</label>
                  @endif
                  <p>{{$timinglist->day}}</p>
                </div>
                <div class="col-sm-2">
                  @if($timingskey=='0')
                  <label class="control-label">Start Time</label>
                  @endif
                  <p>{{$timinglist->start_time}}</p>
                </div>
                <div class="col-sm-2">
                  @if($timingskey=='0')
                  <label class="control-label">End Time</label>
                  @endif
                  <p>{{$timinglist->end_time}}</p>
                </div>
                <div class="col-sm-2">
                  @if($timingskey=='0')
                  <label class="control-label">Type</label>
                  @endif
                  <p>{{$timinglist->status}}</p>
                </div>
                </div>
                @endforeach
                @endif
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/address_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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

<!--main content end-->
@endsection