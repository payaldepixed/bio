@extends('layouts.app')

@section('title')
Page
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
    {{-- <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Page
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            </div>
        </div>
    </div> --}}
</div>
<div class="page-body template-layout">
    <div class="container-fluid">
        <div class="template-header">
            <div class="tab-item">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                    <a href="#Content" class="nav-link active" data-bs-toggle="tab">
                        Content
                        <svg xmlns="http://www.w3.org/2000/svg" class="tab_svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#Design" class="nav-link" data-bs-toggle="tab">
                        Design
                        <svg xmlns="http://www.w3.org/2000/svg" class="tab_svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                    </a>
                </li>
                </ul>
            </div>
            <div class="link-item">
                <div class="my-link">
                   <span class="my-page"> My Page:</span>  <a href="{{route('mypage',['username'=>@$user->username])}}" target="_blank">{{request()->getHttpHost()}}/link/{{@$user->username}}</a>
                </div>
                <div class="button-links">
                    <button href="#" class="btn btn-primary">
                        <span class="button-name">Mockup</span> <img class="button-icon" src="{{ asset('static/template_svg/mockup.svg') }}" alt="">
                    </button>
                    <button href="#" class="btn btn-warning">
                        <span class="button-name">QR Code</span> <img class="button-icon" src="{{ asset('static/template_svg/qrCode.svg') }}" alt="">
                    </button>
                    <button href="#" class="btn btn-dark">
                        <span class="button-name">Share</span> <img class="button-icon" src="{{ asset('static/template_svg/share.svg') }}" alt="">
                    </button>
                </div>
            </div>
        </div>
        <div class="template">
            <div class="item_one">
                <div class="card-section">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="Content">
                                <div class="social-links mb-4">
                                    <div class="accordion" id="accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                                                Social Links
                                            </button>
                                            </h2>
                                            <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                <div class="accordion-body p-2">
                                                    <form id="socialForm" action="{{route('social.store')}}" method="post">
                                                        <div class="social_icons_lists mb-4">
                                                            @php $socials = Commonhelper::getSocials(); @endphp
                                                            @foreach($socials as $social)
                                                                @php $name = ucwords(str_replace("_", " ", $social)); @endphp
                                                                <label for="{{$social}}" class="social-icon">
                                                                    <input type="checkbox" id="type_{{$social}}" @if(Commonhelper::getSocial($social)) checked @endif value="{{$social}}" name="types[]" class="sociallinks">
                                                                    <img class="social-img" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt="{{$social}}"> <span class="social-icon-name">{{$name}}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                        @foreach($socials as $social)
                                                            @php $name = ucwords(str_replace("_", " ", $social)); @endphp
                                                            <div id="social_{{$social}}" class="social-inputs" @if(!Commonhelper::getSocial($social)) style="display:none;" @endif>
                                                                <div class="social-details mb-2">
                                                                    <div class="drag_drop">
                                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                                    </div>
                                                                    <div class="input-url">
                                                                        <div class="inputStyle">
                                                                            <input type="{{$social == 'email' ? 'email' : 'url' }}" id="{{$social}}" name="{{$social}}" class="form-control types" placeholder="{{$social == 'email' ? 'Email Address' : $name.' URL' }}" value="{{Commonhelper::getSocial($social)}}">
                                                                            <div class="social-input-icon">
                                                                                <img class="" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <small id="social_error_{{$social}}" class="form-hint"></small>
                                                                    </div>
                                                                    <div class="delete_icon removeSocial" data-type="{{$social}}">
                                                                        <img class="" src="{{ asset('static/template_svg/delete.svg') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- blocks --}}
                            </div>
                            <div class="tab-pane" id="Design">
                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item_two">
                <div class="preview-layout">
                    <div class="preview-details">
                        <div class="card-layout">
                            <div class="preview-all">
                                <div class="preview-img">
                                    <img src="{{@$user->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url($user->profile_picture) : asset('static/default.png')}}" alt="">
                                </div>
                                <div class="preview-title">
                                    {{'@'.@$user->username}}
                                </div>
                                <div class="preview-description">
                                    {!! $user->bio !!}
                                </div>
                                <div class="selected-social-icon" id="socialData">
                                    @foreach($socials as $social)
                                        <a @if(!$value = Commonhelper::getSocial($social)) style="display:none;" @endif id="social_link_{{$social}}" href="@if($social == 'email')mailto:@endif{{strpos($value, 'http') === false ? 'https://' . $value : $value}}" target="_blank"><img class="selected-icon" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt=""></a>
                                    @endforeach
                                </div>
                                {{-- <div class="preview-card">
                                    <div class="preview-card-body">
                                        <div class="main-title">ritesh pandey</div>
                                        <div class="subtitle-title">sub title</div>
                                    </div>
                                    <div class="preview-card-body">
                                        <div class="main-title">ritesh pandey</div>
                                        <div class="subtitle-title">sub title</div>
                                    </div>
                                    <div class="preview-card-body">
                                        <div class="main-title">ritesh pandey</div>
                                        <div class="subtitle-title">sub title</div>
                                    </div>
                                    <div class="preview-card-body">
                                        <div class="main-title">ritesh pandey</div>
                                        <div class="subtitle-title">sub title</div>
                                    </div>
                                    <div class="preview-card-body">
                                        <div class="main-title">ritesh pandey</div>
                                        <div class="subtitle-title">sub title</div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="footer-text">
                                <a href="javasctipt:void(0)">
                                    <div class="powered-by">Powered by</div>
                                    <div class="link-text">
                                        <img class="" src="{{ asset('static/template_svg/link_black.svg') }}" alt="">{{config('app.name')}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
