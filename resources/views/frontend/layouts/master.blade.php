<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="temp"/>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title') Site Name@show
    </title>
    <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">

    {!! Theme::style('css/main.css') !!}
</head>
<body>
<div class="container-full">


@include('partials.navigation')

<div class="container-full">
    @yield('content')
</div>
@include('partials.footer')




</div>
{!! Theme::script('js/all.js') !!}
{{--@yield('scripts')--}}

</body>
</html>
