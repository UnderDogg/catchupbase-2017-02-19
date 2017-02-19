@extends('vendor.installer.layouts.master')

@section('title', "installer welcome?")
@section('container')
    <p class="paragraph">{{ trans('messages.welcome.message') }}</p>
    <div class="buttons">
        <a href="{{ route('LaravelInstaller::environment') }}" class="button">{{ trans('messages.next') }}</a>
    </div>
@stop