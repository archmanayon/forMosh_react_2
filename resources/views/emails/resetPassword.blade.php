<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password</title>

</head>

<body class="antialiased">
    <h> head  </h>
    <p>{{ $reset_message }}</p>
    <a href="{{ url('http://localhost/api/request-reset?token='.$token) }}"> reset password </a >
</body> 

</html>
