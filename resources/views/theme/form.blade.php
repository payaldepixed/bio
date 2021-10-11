@extends('layouts.app')

@section('title')
Theme
@endsection

@section('css_before')
@endsection

@section('css_after')
<style type="text/css">
    img {
    /* display: block; */
    max-width: 100%;
    }
    .preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid red;
    }
    .modal-lg{
    max-width: 1000px !important;
    }
    </style>
@endsection

@section('js_after')
<script src="{{ asset('js/pages/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/pages/theme.js') }}"></script>
@endsection

@section('content')
<div class="page-body template-layout">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="template-header">
            <div class="tab-item">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                    {{-- <li class="nav-item">
                        <a href="#Design" class="nav-link" data-bs-toggle="tab">
                            Design
                            <svg xmlns="http://www.w3.org/2000/svg" class="tab_svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="template">
            <div class="item_one active">
                <div class="card-section">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="Content">
                                <form id="designForm" action="{{route('theme.store')}}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{@$id}}">
                                    <div class="general-option">
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">@if(@$id) Edit @else Add @endif Theme</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <div class="input-group mb-2">
                                                <input id="title" name="title" value="{{@$theme->title}}" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Primary Text Color</div>
                                                <div id="primary-text-color">
                                                    <input name="primary_text_color" type="color" value="{{@$theme->primary_text_color ? $theme->primary_text_color : '#000000'}}">
                                                </div>
                                            </div>
                                        </div>
                                        <input name="primary_background_type" id="primary_background_type" type="hidden" value="{{@$theme->primary_background_type}}">
                                        <div class="social-links mb-3">
                                            <div class="accordion" id="accordion-example">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-2">
                                                    <button id="mainTitleBackground" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-colors" aria-expanded="false">
                                                        Primary Background
                                                    </button>
                                                    </h2>
                                                    <div id="collapse-colors" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                        <div class="accordion-body p-2">
                                                          <div id="selectColor" class="primary-colors">
                                                            <div data-type="preset" class="select-color preset custom-preset selected">Preset</div>
                                                            <div data-type="gradient" class="select-color custom-gradient">Custom Gradient</div>
                                                            <div data-type="color" class="select-color custom-color">Custom Color</div>
                                                            <div data-type="image" class="select-color custom-image">Custom Image</div>
                                                            <div data-type="video" class="select-color custom-video">Custom Video</div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="background_type_preset" class="row @if(@$theme->primary_background_type != 'preset') d-none @endif">
                                            <input type="hidden" value="{{@$theme->primary_background_type}}" id="preset_color">
                                            <input type="hidden" value="{{@$theme->primary_background}}" name="primary_background_preset" id="primary_background_preset">
                                            <label for="settings_background_type_preset_one" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(111.7deg, #a529b9 19.9%, #50b1e1 95%)" id="settings_background_type_preset_one" class="d-none">
                                                <div class="link-background-type-preset link-body-background-one"></div>
                                            </label>
                                            <label for="settings_background_type_preset_two" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(109.6deg, #ffb418 11.2%, #f73131 91.1%)" id="settings_background_type_preset_two" class="d-none">
                                                <div class="link-background-type-preset link-body-background-two"></div>
                                            </label>
                                            <label for="settings_background_type_preset_three" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(135deg, #79f1a4 10%, #0e5cad 100%)" id="settings_background_type_preset_three" class="d-none">
                                                <div class="link-background-type-preset link-body-background-three"></div>
                                            </label>
                                            <label for="settings_background_type_preset_four" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(to bottom, #ff758c, #ff7eb3)" id="settings_background_type_preset_four" class="d-none">
                                                <div class="link-background-type-preset link-body-background-four"></div>
                                            </label>
                                            <label for="settings_background_type_preset_five" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(292.2deg, #3355ff 33.7%, #0088ff 93.7%)" id="settings_background_type_preset_five" class="d-none">
                                                <div class="link-background-type-preset link-body-background-five"></div>
                                            </label>
                                            <label for="settings_background_type_preset_six" class="m-0 col-4 mb-4">
                                                <input type="radio" name="background" value="linear-gradient(to bottom, #fc5c7d, #6a82fb)" id="settings_background_type_preset_six" class="d-none">
                                                <div class="link-background-type-preset link-body-background-six"></div>
                                            </label>
                                        </div>
                                        <div id="background_type_gradient" class="@if(@$theme->primary_background_type != 'gradient') d-none @endif">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Color One</label>
                                                <input type="color" id="settings_background_type_gradient_color_one" name="primary_background_one" class="form-control" value="{{@$theme->primary_background ? $theme->primary_background : '#ffffff'}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Color Two</label>
                                                <input type="color" id="settings_background_type_gradient_color_two" name="secondary_background" class="form-control" value="{{@$theme->secondary_background ? $theme->secondary_background : '#ffffff'}}">
                                            </div>
                                        </div>
                                        <div id="background_type_color" class="mb-3 @if(@$theme->primary_background_type && $theme->primary_background_type != 'color') d-none @endif">
                                            <div class="form-group">
                                                <label class="form-label" for="">Custom Color</label>
                                                <input type="color" id="settings_background_type_color" name="primary_background" class="form-control" value="{{@$theme->primary_background ? $theme->primary_background : '#ffffff'}}">
                                            </div>
                                        </div>
                                        <div id="background_type_image" class="mb-3 @if(@$theme->primary_background_type != 'image') d-none @endif">
                                            <input type="hidden" value="{{ (@$theme->primary_background && @$theme->primary_background_type == 'image') ? Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background) : '' }}" id="imgurl">
                                            <div class="form-group">
                                                <img id="background_type_image_preview" height="50" width="50" src="{{ (@$theme->primary_background && @$theme->primary_background_type == 'image') ? Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background) : asset('static/template_svg/new-link/img/empty-state.jpg') }}" class="link-background-type-image">
                                                <input id="background_type_image_input" type="file" name="primary_background_image" accept=".gif, .ico, .png, .jpg, .jpeg, .svg" class="form-control-file">
                                            </div>
                                        </div>
                                        <div id="background_type_video" class="mb-3 @if(@$theme->primary_background_type != 'video') d-none @endif">
                                            <input type="hidden" value="{{ (@$theme->primary_background && @$theme->primary_background_type == 'video') ? Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background) : '' }}" id="videourl">
                                            <div class="form-group">
                                                <label class="form-label" for="">Custom Video</label>
                                                <input id="background_type_video_input" name="primary_background_video" type="file" accept="video/mp4,video/x-m4v,video/*" name="file[]" >
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="range-row">
                                                <div class="range-label">Profile Picture Shadow</div>
                                                <input name="profile_picture_shadow" id="profileShadow" type="range" class="form-range" value="{{@$theme->profile_picture_shadow ? $theme->profile_picture_shadow : '0'}}" min="0" max="10" step="1">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="range-row">
                                                <div class="range-label">Profile Picture Border</div>
                                                <input name="profile_picture_border" id="profile_img_border" type="range" class="form-range" value="{{@$theme->profile_picture_border ? $theme->profile_picture_border : '0'}}" min="0" max="10" step="1">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Profile Picture Border Color</div>
                                                <div id="profile-picture-border-color">
                                                    <input name="profile_picture_border_color" type="color" value="{{@$theme->profile_picture_border_color ? $theme->profile_picture_border_color : '#000000'}}">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- General option --}}
                                        {{-- Fonts option --}}
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">Fonts</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="accordion" id="accordion-fonts">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fonts" aria-expanded="false">
                                                        Text Font: {{@$theme->text_font ? ucwords($theme->text_font) : 'Open Sans' }}
                                                    </button>
                                                </h2>
                                                <input type="hidden" name="text_font" id="text_font" value="{{@$theme->text_font}}">
                                                <div id="collapse-fonts" class="accordion-collapse collapse" data-bs-parent="#accordion-fonts">
                                                    <div class="accordion-body p-2">
                                                        <div id="fonts" class="font-list">
                                                            <div data-id="opan-sans" class="font-item opan-sans">Open Sans</div>
                                                            <div data-id="roboto" class="font-item roboto">Roboto</div>
                                                            <div data-id="lato" class="font-item lato">Lato</div>
                                                            <div data-id="dosis" class="font-item dosis">Dosis</div>
                                                            <div data-id="fuggles" class="font-item fuggles">Fuggles</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Fonts option --}}
                                    </div>
                                    <div class="text-center pb-4">
                                        <button type="submit" class="btn btn-success w-100">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item_two">
                <div class="change_preview_layout">
                    <div class="change_layout">
                        <div id="mobile_layout" class="change_item selected">
                            <img class="show_preview" src="{{ asset('static/template_svg/mobile.svg') }}" alt="">
                        </div>
                        <div id="website_layout" class="change_item">
                            <img class="show_preview" src="{{ asset('static/template_svg/website.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="preview-layout">
                    <div id="preview_size" class="preview-details mobile_size">
                        <div class="card-layout minHeight">
                            <video id="bgVideo" autoplay muted loop class="d-none">
                                <source src="" type="video/mp4" id="video_here" />
                            </video>
                            <div class="preview-all">
                                <div id="previewImg" class="preview-img">
                                    <img src="{{@$user->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url($user->profile_picture) : asset('static/default.png')}}" alt="">
                                </div>
                                <div id="PreviewName" class="preview-title">
                                    {{'@'.@$user->username}}
                                </div>
                                <div id="previewBio" class="preview-description">
                                    {!! $user->bio !!}
                                </div>
                                {{-- <div class="preview-card">
                                    <div class="link_preview normal">
                                        <div class="preview-card-body card-style">
                                            <div class="main-title">{{@$user->name}}</div>
                                            <div class="subtitle-title">Text</div>
                                        </div>
                                    </div>
                                    <div class="link_preview normal">
                                        <div class="preview-card-body card-style">
                                            <div class="main-title">{{@$user->name}}</div>
                                            <div class="subtitle-title">Text</div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
