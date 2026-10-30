@if(isset($contactus->timings))
@php
$timingdata = json_decode($contactus->timings);
$timinglist = $timingdata->days;
$timinglist = collect($timinglist)->sortBy('timing_order_by');
@endphp
@endif


@if(isset($contactus->phone))
@php
$phonedata = json_decode($contactus->phone);
@endphp
@if(isset($phonedata->primary))
@php
$phonelist = $phonedata->primary;
$phonelist = collect($phonelist)->sortBy('phone_order_by');
@endphp
@endif
@if(isset($phonedata->secondary))
@if(!$phonedata->secondary->isEmpty())
@php
$phoneseclist = $phonedata->secondary;
$phoneseclist = collect($phoneseclist)->sortBy('phone_order_by');
@endphp
@endif
@endif
@endif


@if(isset($contactus->email_id))
@php
$emailiddata = json_decode($contactus->email_id);
@endphp
@if(isset($emailiddata->primary))
@php
$emailidlist = $emailiddata->primary;
$emailidlist = collect($emailidlist)->sortBy('email_order_by');
@endphp
@endif

@if(isset($emailiddata->secondary))
@if(!$emailiddata->secondary->isEmpty())
@php
$emailidseclist = $emailiddata->secondary;
$emailidseclist = collect($emailidseclist)->sortBy('email_order_by');
@endphp
@endif
@endif
@endif
<ul class="adressinfo">
  @if(isset($contactus->address))
  <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$contactus->address}} 
  @if(isset($contactus->address1)),<br>{{$contactus->address1}}@endif @if(isset($contactus->address2)),<br>{{$contactus->address2}}@endif @if(isset($contactus->pincode))-{{$contactus->pincode}}@endif </li>
  @endif

  @if(isset($contactus->timings))
  @foreach($timinglist as $timingdatalist)
  @if($timingdatalist->status=='open')
  <li><i class="fa fa-calendar" aria-hidden="true"></i> <strong>{{$timingdatalist->day}}:</strong> {{ date("g:i A", strtotime($timingdatalist->start_time)) }} {{ date("g:i A", strtotime($timingdatalist->end_time)) }}</li>
  @else
  <li><i class="fa fa-calendar" aria-hidden="true"></i> <strong>{{$timingdatalist->day}}:</strong> {{$timingdatalist->status}}</li>
  @endif
  @endforeach
  @endif

  @if(isset($contactus->phone))
  @if(isset($phonelist))
  @if(!$phonelist->isEmpty())
  @foreach($phonelist as $priphonelist)
  <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$priphonelist->phonecode}} {{$priphonelist->phone}}">+{{$priphonelist->phonecode}} {{$priphonelist->phone}}</a></li>
  @endforeach
  @endif
  @endif
  @if(isset($phoneseclist))
  @if(!$phoneseclist->isEmpty())
  @foreach($phoneseclist as $phonesecdatalist)
  <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}">+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}</a></li>
  @endforeach
  @endif
  @endif
  @endif

  @if(isset($contactus->email_id))
  @if(isset($emailidlist))
  @if(!$emailidlist->isEmpty())
  @foreach($emailidlist as $emailiddatalist)
  <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a></li>
  @endforeach
  @endif
  @endif
  @if(isset($emailidseclist))
  @if(!$emailidseclist->isEmpty())
  @foreach($emailidseclist as $emailidsecdatalist)
  <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Tel:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a></li>
  @endforeach
  @endif
  @endif
  @endif
</ul>