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
  $phonelist = $phonedata->primary;
  $phoneseclist = $phonedata->secondary;
  $phonelist = collect($phonelist)->sortBy('phone_order_by');
  $phoneseclist = collect($phoneseclist)->sortBy('phone_order_by');
@endphp
  @endif
  @if(isset($contactus->email_id))
  @php
  $emailiddata = json_decode($contactus->email_id); 
  $emailidlist = $emailiddata->primary;
  $emailidseclist = $emailiddata->secondary;
  $emailidlist = collect($emailidlist)->sortBy('email_order_by');
  $emailidseclist = collect($emailidseclist)->sortBy('email_order_by');
  @endphp
  @endif
<ul class="adressinfo">
  @if(isset($contactus->address))
    <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$contactus->address}}</li>
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
    @foreach($phonelist as $priphonelist)
    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$priphonelist->phonecode}} {{$priphonelist->phone}}">+{{$priphonelist->phonecode}} {{$priphonelist->phone}}</a></li>
    @endforeach
    @if(!$phoneseclist->isEmpty())
    @foreach($phoneseclist as $phonesecdatalist)
    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}">+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}</a></li>
    @endforeach
    @endif
    @endif
    @if(isset($contactus->email_id))
    @foreach($emailidlist as $emailiddatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a></li>
    @endforeach
    @if(!$emailidseclist->isEmpty())
    @foreach($emailidseclist as $emailidsecdatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Tel:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a></li>
    @endforeach
    @endif
    @endif
    </ul>