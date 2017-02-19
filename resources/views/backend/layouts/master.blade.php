<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="author" content="@yield('author', 'Anthony Rappa')">
    @yield('meta')
    <title>@yield('title', app_name())</title>
    @yield('before-styles-end')
    {!! HTML::style(elixir('css/backend.css')) !!}
    {!! HTML::style('css/backend/plugin/select2/select2.min.css') !!}

    @yield('after-styles-end')

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">
    @include('backend.includes.header')
    @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('page-header')

            {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
            {!! Breadcrumbs::renderIfExists() !!}
        </section>

        <!-- Main content -->
        <section class="content">
            @include('includes.partials.messages')
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('backend.includes.footer')
</div><!-- ./wrapper -->

{!! HTML::script('js/vendor/jquery-1.11.2.min.js') !!}
{!! HTML::script('js/vendor/bootstrap.min.js') !!}

@yield('before-scripts-end')
{!! HTML::script(elixir('js/backend.js')) !!}
@yield('after-scripts-end')

{!! HTML::script('css/backend/plugin/select2/select2.full.min.js') !!}

<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
</body>
</html>