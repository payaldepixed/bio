@extends('layouts.auth')

@section('content')

<div class="text-center text-muted">
    <a href="{{ route('login') }}" tabindex="-1">{{ __('auth.login') }}</a>
</div>

@endsection
