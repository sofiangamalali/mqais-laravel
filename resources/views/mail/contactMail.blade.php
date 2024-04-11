<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cstomer Message</title>
</head>

<body>
    <p>Customer Name : <b>{{ $data['FirstName'] . ' ' . $data['LastName'] }}</b><br>
        Customer Phone : <b>{{ $data['PhoneNumber'] }}</b><br>
        Customer Email : <b><a href="mailto: {{ $data['Email'] }}">{{ $data['Email'] }}</a></b><br>
        @isset($data['Product'])
            Product : <b><a href="{{ $data['ProductRoute'] }}">{{ $data['Product'] }}</a></b><br>
        @endisset
        Customer Message : <b>{{ $data['Message'] }}</b></p>

</body>

</html>
