<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    Registration details
</head>
<body>
Hi {{ $user->name }}! Thank you for registration in the best online store in the darknet
Your password is {{ $password }}
</body>
