@extends('layouts.app')

@section('title')
Links
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pages/user.js') }}"></script>
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
                    Link
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
                <form id="linkForm" action="{{route('link.store')}}" method="post" class="card" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id" value="{{@$id}}">
                    <div class="card-header">
                        <h3 class="card-title">@if(@$id) Edit @else Create @endif Link</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Name</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">{{request()->getHttpHost()}}/link/</span>
                                        <input type="text" value="{{@$link->name}}" name="name" class="form-control" placeholder="Enter name" maxlength="255" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{route('link')}}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
