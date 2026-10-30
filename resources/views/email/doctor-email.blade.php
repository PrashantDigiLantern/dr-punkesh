<h2>{{$data['emailsubject']}}</h2>
<table style='border:1px;text-align:left;' border="1">
    @if(isset($data['name']))
    <tr>
        <th>Name:</th>
        <td>{{ isset($data['name'])? $data['name'] : null}}</td>
    </tr>
    @endif
    @if(isset($data['mobile']))
    <tr>
        <th>Phone:</th>
        <td>{{ isset($data['mobile'])? $data['mobile'] : null}}</td>
    </tr>
    @endif
    @if(isset($data['email']))
    <tr>
        <th>Email:</th>
        <td>{{ isset($data['email'])? $data['email'] : null}}</td>
    </tr>
    @endif
    @if(isset($data['date']))
    <tr>
        <th>Appointment Date:</th>
        <td>{{ isset($data['date'])? date("d-m-Y", strtotime($data['date']))  : null}}</td>
    </tr>
    @endif

    @if(isset($data['message']))
    <tr>
        <th>Message:</th>
        <td>{{ isset($data['message'])? $data['message'] : null}}</td>
    </tr>
    @endif


    <!-- Landing Page Fields-->
    @if(isset($data['service']))
    <tr>
        <th>Service:</th>
        <td>{{ isset($data['service'])? $data['service'] : null}}</td>
    </tr>
    @endif

    @if(isset($data['requesturl']))
    <tr>
        <th>Request Url:</th>
        <td>{{ isset($data['requesturl'])? $data['requesturl'] : null}}</td>
    </tr>
    @endif

    @if(isset($data['refferelurl']))
    <tr>
        <th>Referral  Url:</th>
        <td>{{ isset($data['refferelurl'])? $data['refferelurl'] : null}}</td>
    </tr>
    @endif

    
  
</table>


