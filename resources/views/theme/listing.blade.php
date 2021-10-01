@extends('layouts.app')

@section('title')
Themes
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pages/theme.js') }}"></script>
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
                    Themes
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{route('theme.add')}}" class="btn btn-primary d-none d-sm-inline-block">
                        Create Theme
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body" id="ThemeTableList">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            {{-- <div class="text-muted">
                                Filter:
                                <div class="mx-2 d-inline-block">
                                    <select id="filter" class="form-select form-control-sm form-select-searchfilter">
                                        <option value="">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="ms-auto text-muted">
                                <div class="input-group">
                                    <input type="text" id="searchTxt" class="form-control form-control-sm" placeholder="Search for…">
                                    <button id="search" class="btn btn-sm" type="button">Go!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="themes">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary deleteUrl">Yes</a>
            </div>
        </div>
    </div>
</div>
@endsection
