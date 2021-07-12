@extends('layouts.app')

@section('title')
General
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
                    General Details
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
                <form id="generalForm" action="{{route('general.store')}}" method="post" class="card" enctype='multipart/form-data'>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label required">Profile Name</label>
                                    <div>
                                        <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control" placeholder="Profile Name" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Profile Picture</label>
                                    <div>
                                        <input id="profile_picture" type="file" name="profile_picture" class="form-control">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div @if(!@Auth::user()->profile_picture) style="display:none;" @endif id="img" class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label"> </label>
                                    <div>
                                        <img id="image" height="50" width="50" src="{{@Auth::user()->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url(Auth::user()->profile_picture) : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label required">Profile Bio</label>
                                    <div>
                                        <textarea name="bio" class="form-control" placeholder="Enter bio">{{Auth::user()->bio}}</textarea>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
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
