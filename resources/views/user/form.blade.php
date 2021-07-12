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
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <form id="userForm" action="{{route('user.store')}}" method="post" class="card" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id" value="{{@$id}}">
                    <div class="card-header">
                        <h3 class="card-title">@if(@$id) Edit @else Create @endif User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Name</label>
                                    <div>
                                        <input type="text" value="{{@$user->name}}" name="name" class="form-control" placeholder="Enter name" maxlength="255" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">User Name</label>
                                    <div>
                                        <input type="text" value="{{@$user->username}}" name="username" class="form-control" placeholder="Enter user name" maxlength="255" @if(@$id) readonly @endif required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <div>
                                        <input type="email" value="{{@$user->email}}" name="email" class="form-control" placeholder="Enter email" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6">
                                <div class="mb-3">
                                    <div class="form-label">Upload Profile Image</div>
                                    <input name="avatar" accept=".jpg,.jpeg,.png,.webp" type="file" class="form-control" />
                                    @if(@$user->avatar)
                                        <small class="form-hint">
                                            <a href="{{Storage::disk(Config::get('constants.DISK'))->url($user->avatar)}}" target="_blank" class="input-group-link">View File</a> |
                                            <a href="{{route('user.delete.media',['id'=>$id,'type'=>'avatar'])}}" class="input-group-link">Delete File</a>
                                        </small>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                        @if(!@$id)
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Password</label>
                                        <div>
                                            <input id="password" type="password" name="password" class="form-control" autocomplete="off"
                                            placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                            <small class="form-hint"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Confirm Password</label>
                                        <div>
                                            <input id="password_confirmation" type="password" autocomplete="off" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                            <small id="password-hint" class="form-hint"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{route('user')}}" class="btn btn-link">Cancel</a>
                            @if(@$id)
                                <a href="#" data-url="{{route('user.delete',['id'=>@$id])}}" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-outline-danger ms-auto deleteModal">Delete</a>
                                <button type="submit" class="btn btn-primary ms-2">Save</button>
                            @else
                                <button type="submit" class="btn btn-primary ms-auto">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
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
@endsection
