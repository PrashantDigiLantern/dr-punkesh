@if(isset($contactus->timings))
@php
$timingdata = json_decode($contactus->timings);
$timinglist = $timingdata->days;
$timinglist = collect($timinglist)->sortBy('timing_order_by');
@endphp
@endif

  @if(isset($contactus->timings))
  @foreach($timinglist as $timingdatalist)
  @if($timingdatalist->status=='open')
  {{$timingdatalist->day}}: {{ date("g:i A", strtotime($timingdatalist->start_time)) }} {{ date("g:i A", strtotime($timingdatalist->end_time)) }}
  @else
  <br>{{$timingdatalist->day}}: {{$timingdatalist->status}}
  @endif
  @endforeach
  @endif

