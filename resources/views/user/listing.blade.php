@extends('layouts.app')

@section('title')
Users
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
                    User
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{route('user.add')}}" class="btn btn-primary d-none d-sm-inline-block">
                        Create User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body" id="UserTableList">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Filter:
                                <div class="mx-2 d-inline-block">
                                    <select id="filter" class="form-select form-control-sm form-select-searchfilter">
                                        <option value="">All</option>
                                        <option value="0">Unblocked</option>
                                        <option value="1">Blocked</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-auto text-muted">
                                <div class="input-group">
                                    <input type="text" id="searchTxt" class="form-control form-control-sm" placeholder="Search for…">
                                    <button id="search" class="btn btn-sm" type="button">Go!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="users">
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
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary deleteUrl">Yes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="blockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Block</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to do this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-primary blockUrl">Yes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="passwordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.changepassword')}}" class="card" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="userId" name="id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Password</label>
                                    <div>
                                        <input id="password" autocomplete="off" type="password" name="password" class="form-control" placeholder="Enter Password"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Confirm Password</label>
                                    <div>
                                        <input id="password_confirmation" autocomplete="off" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                        <small id="password-hint" class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-auto">Save</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
