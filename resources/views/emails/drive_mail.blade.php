<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <style>
        .wrapper{width:60%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
        .logo_header{width:100%; height:70px;background: #000000; padding:10px;}
        .email_body{width:100%; padding:0 15px;}
        .receipt_list{width:100%;}
        .receipt_list .left_list{float:left; width:60%;}
        .receipt_list .right_list{float:left; width:40%;}
        .left_list b,.right_list b{width:100%; float:left; margin:0 0 10px 0;}
        .left_list span,.right_list span{width:100%; float:left; margin:0 0 5px 0;}
        .right_list span{text-align:left; padding-left:15%;}
        .list_divider{width:100%; border-top:1px solid rgba(0,0,0,0.2);float:left;}
        .invoice_trans{width:100%;float:left; margin:5px 0;}
        .invoice_left{float:left; width:60%;}
        .invoice_right{float:left; width:40%;}
        .content-td{
            padding: 0!important;
        }

    </style>
</head>
<body>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                    <tr><td align="center"  bgcolor="#e8e8e8" valign="top"><a href="{{route('home')}}" target="_blank"><img width="100" src="{{url('uploads/'.\Setting::orderBy('id','desc')->first()->foton_logo)}}"/></a></td></tr>
                    <tr><td class="content-td" align="center" valign="top"><h1>Hello</h1></td></tr>
                    <tr>
                        <td class="content-td" valign="top">

                            <p>A test drive message from foton Website . Here are there details:</p>

                            <ul>
                                @if($data->first_name)
                                <li>First name: {{$data->first_name}}</li>
                                @endif
                                @if($data->last_name)
                                <li>Last name: {{$data->last_name}}</li>
                                @endif
                                @if($data->phone)
                                <li>Mobile: {{$data->phone}}</li>
                                @endif
                                @if($data->email)
                                <li>Email: {{$data->email}}</li>
                                @endif
                                @if($data->state_id)
                                <li>Governorate: {{$data->state_id}}</li>
                                @endif
                                @if($data->vehicle_id)
                                <li>Car: {{$data->vehicle_id}}</li>
                                @endif
                            </ul>
                            @if($data->message)
                            <p>Message:</p>
                            <p>{{$data->message}}</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
                    <tr>
                        <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">Powered by <a target="_blank" href="http://icons-agency.com/en-eg" style="color:#222222; text-decoration:underline; font-weight: bold;">Icons</a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
