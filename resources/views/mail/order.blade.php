<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aptaxisaipan.com</title>
</head>
<body>
    

    <table style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: center; background-color: #f1f1f1; width: 430px; margin: 30px auto; max-width: 100%; padding: 30px 15px;" cellpadding="0" cellspacing="0" border="0">
        
        <tr>
            <td colspan="2">
                <h4>Taxi Order</h4>
            </td>
        </tr>
        
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Name :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data->name }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Email :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data->email }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Phone :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data->phone }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Taxi :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ App\Models\Admin\Taxi::where('id', $data->taxi_id)->first()->title }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Pick Up :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ App\Models\Admin\PickUp::where('id', $data->pick_up)->first()->title  }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Drop Off :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ App\Models\Admin\DropOff::where('id', $data->drop_off)->first()->title }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Date and Time :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data->date_and_time }}</span>
            </td>
        </tr>
        
        
    </table>

</body>
</html>