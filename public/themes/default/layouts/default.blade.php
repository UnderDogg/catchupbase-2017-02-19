<!DOCTYPE html>
<html lang="en">
<head>
    <title>        @section('title')
            Localhost Corporation | FlatlyDark
        @show</title>
    <meta id="token" name="token" value="{{ csrf_token() }}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{!! Theme::get('keywords') !!}}">
        <meta name="description" content="{{!! Theme::get('description') !!}}">
        <link href="/css/reset.css" rel="stylesheet">


        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/jquery.min.js"></script>

        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}


<!-- Bootstrap -->
  <link href="/css/datatables.min.css" rel="stylesheet">
  <link href="/css/open-sans.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/animate.min.css">
  <link href="/css/jquery.datetimepicker.css" rel="stylesheet">
    <link href="/css/basic.min.css" rel="stylesheet">
  <link href="/css/dropzone.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/jquery-comments.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bs-overides.css">
  <link href="/css/defaultstyle.css" rel="stylesheet" type="text/css">

<style class="custom_style_modal-heading">
.modal-header{
background:#b2bacf;
}
</style>
<style class="custom_style_modal-heading-color">
.modal-header .modal-title{
color:#7279ba;
}
</style>
@section('styles')
@show


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
        var admin_url = 'http://catchupbase.local/admin/';
        var site_url = 'http://catchupbase.local/';
        // Settings required for javascript
        var maximum_allowed_ticket_attachments = '4';
        var use_services = '0';
        var tables_pagination_limit = '25';
        var date_format = 'm-d-Y|%m-%d-%Y';
        date_format = date_format.split('|');
        date_format = date_format[0];
        var dt_lang = {"emptyTable":"No entries found","info":"Showing _START_ to _END_ of _TOTAL_ entries","infoEmpty":"Showing 0 to 0 of 0 entries","infoFiltered":"(filtered from _MAX_ total entries)","lengthMenu":"Show _MENU_ entries","loadingRecords":"Loading...","processing":"<div class=\"dt-loader\"><\/div>","search":"<div class=\"input-group\"><span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-search\"><\/span><\/span>","searchPlaceholder":"Search:","zeroRecords":"No matching records found","paginate":{"first":"First","last":"Last","next":"Next","previous":"Previous"},"aria":{"sortAscending":"activate to sort column ascending","sortDescending":"activate to sort column descending"}};
        var discussions_lang = {"discussion_add_comment":"Add comment","discussion_newest":"Newest","discussion_oldest":"Oldest","discussion_attachments":"Attachments","discussion_send":"Send","discussion_reply":"Answer","discussion_edit":"Edit","discussion_edited":"Modified","discussion_you":"You","discussion_save":"Save","discussion_delete":"Delete","discussion_view_all_replies":"Show all replies","discussion_hide_replies":"Hide replies","discussion_no_comments":"No comments","discussion_no_attachments":"No attachments","discussion_attachments_drop":"Drag and drop to upload file"};
        var confirm_action_prompt = 'Are you sure you want to perform this action?';
        var field_is_required = 'This field is required';
        // Discussions
        var locale;
                  locale = 'en';
                var allowed_files = '.gif,.png,.jpeg,.jpg,.pdf,.doc,.txt,.docx,.xls,.zip,.rar,.xls,.mp4,.psd';
      </script>
    </head>
    <body class="customers ">
        {!! Theme::partial('header') !!}
        {!! Theme::content() !!}
        {!! Theme::partial('footer') !!}
        {!! Theme::asset()->container('footer')->scripts() !!}





<script src="/js/bootstrap.min.js"></script>
<script src="/js/datatables.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/additional-methods.min.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>
<script src="/js/Chart.min.js" type="text/javascript"></script>
<script src="/js/global.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>
<script src="/js/dropzone.min.js"></script>
<script src="/js/moment-with-locales.min.js"></script>
<script src="/js/moment-timezone-with-data.min.js"></script>
<script src="/js/moment-duration-format.js"></script>
<script src="/js/jquery-comments.min.js"></script>
<script src="/js/circle-progress.js"></script>
<script src="/js/jquery.fn.gantt.min.js"></script>
<script src="/js/clients.js"></script>
<script src="/js/client-report.js"></script>

    </body>
</html>
