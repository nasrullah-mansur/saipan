<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aptaxisaipan.com</title>
</head>
<body>
    

    <table style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: center; background-color: #f1f1f1; width: 420px; margin: 30px auto; max-width: 100%; padding: 30px 15px;" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td colspan="2">
                <h1 style="margin: 0; color: #E91F2A;">Hello {{ $data['body']['name'] }}</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-size: 18px; color: #333">Your aptaxisaipan.com login info is : </p>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Email :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data['body']['email'] }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px; text-align: right;">
                <strong>Password :</strong>
            </td>
            <td style="padding: 5px; text-align: left;">
                <span>{{ $data['body']['password'] }}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="margin: 0;">Please don't share this info with another.</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="margin: 0;">Thank You <br> aptaxisaipan.com</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="margin: 0;">Lgoin link: <br> <a target="_blank" href="{{ route('login') }}">{{ route('login') }}</a></p>
            </td>
        </tr>
    </table>

</body>
</html>