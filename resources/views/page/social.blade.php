@extends('layouts.app')

@section('title')
Social
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pages/page.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Manage
                </div>
                <h2 class="page-title">
                    Social Links
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <form id="socialForm" action="{{route('social.store')}}" method="post" class="card" enctype='multipart/form-data'>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <div class="form-label">Select Social Links</div>
                                    <div>
                                        @foreach($socials as $social)
                                            <label class="form-check form-check-inline">
                                                <input id="type_{{$social}}" @if(Commonhelper::getSocial($social)) checked @endif type="checkbox" value="{{$social}}" name="types[]" class="form-check-input links">
                                                <span class="form-check-label">{{ucfirst($social)}}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($socials as $social)
                                <div id="social_{{$social}}" class="mb-3" @if(!Commonhelper::getSocial($social)) style="display:none;" @endif>
                                    <div class="input-group">
                                        <input type="{{$social == 'email' ? 'email' : 'url' }}" id="{{$social}}" name="{{$social}}" class="form-control" placeholder="{{$social == 'email' ? 'Email Address' : $social.' URL' }}" value="{{Commonhelper::getSocial($social)}}">
                                        <span class="removeSocial" data-type="{{$social}}">
                                            <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{route('settings')}}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
