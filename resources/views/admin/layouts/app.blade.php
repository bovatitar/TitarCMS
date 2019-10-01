<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="Админ-панель">
    <meta property="og:description" content="Админ-панель">
    <title>Админ-панель</title>
    <link href="{{URL::to('/')}}/css/uikit.css" rel="stylesheet">
    <script src="{{URL::to('/')}}/js/uikit.min.js"></script>
    <script src="{{URL::to('/')}}/js/uikit-icons.min.js"></script>
</head>

<body>
@if(!isset($hideMenu) || $hideMenu === false)
{{--    @include('admin.components.navbar')--}}
@endif

@yield('content')


</body>
</html>
