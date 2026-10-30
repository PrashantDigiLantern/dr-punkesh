<table style='border:1px;text-align:left;'>
        <tr>
                <th>Name:</th>
                <td>{{ ucwords($details['name']) }}</td>
        </tr>
        <tr>
                <th>Phone:</th>
                <td>{{$details['clientphone']}}</td>
        </tr>
        <tr>
                <th>Email:</th>
                <td>{{$details['clientemail']}}</td>
        </tr>
        <tr>
                <th>Message:</th>
                <td>{{$details['message']}}</td>
        </tr>
</table>