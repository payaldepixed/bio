@extends('layouts.app')

@section('title')
Page
@endsection

@section('css_before')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
@endsection

@section('css_after')
<style type="text/css">
    img {
    display: block;
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
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('js/pages/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('js/pages/page.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

@endsection

@section('content')
<div class="page-body template-layout">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="template-header">
            <input type="hidden" id="link_id" value="{{@$link_id}}">
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
                   <span class="my-page"> My Page:</span>  <a href="{{route('mypage',['name'=>@$linkname])}}" target="_blank">{{request()->getHttpHost()}}/{{@$linkname}}</a>
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
                                                        <input type="hidden" name="link_id" value="{{@$link_id}}">
                                                        <div class="social_icons_lists mb-4">
                                                            @php $socials = Commonhelper::getSocials(); @endphp
                                                            @foreach($socials as $social)
                                                                @php $name = ucwords(str_replace("_", " ", $social)); @endphp
                                                                <div class="checkbox-social">
                                                                    <input type="checkbox" id="type_{{$social}}" @if(Commonhelper::getSocial($social,$link_id)) checked @endif value="{{$social}}" name="types[]" class="sociallinks" style="display: none;">
                                                                    <label for="type_{{$social}}" class="social-icon">
                                                                        <img class="social-img" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt="{{$social}}"> <span class="social-icon-name">{{$name}}</span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @foreach($socials as $social)
                                                            @php $name = ucwords(str_replace("_", " ", $social)); @endphp
                                                            <div id="social_{{$social}}" class="social-inputs" @if(!Commonhelper::getSocial($social,$link_id)) style="display:none;" @endif>
                                                                <div class="social-details mb-2">
                                                                    <div class="drag_drop">
                                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                                    </div>
                                                                    <div class="input-url">
                                                                        <div class="inputStyle">
                                                                            <input type="{{$social == 'email' ? 'email' : 'url' }}" id="{{$social}}" name="{{$social}}" class="form-control types" placeholder="{{$social == 'email' ? 'Email Address' : $name.' URL' }}" value="{{Commonhelper::getSocial($social,$link_id)}}">
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
                                <div class="my-block">
                                    <div class="my-block-header">
                                        My Blocks
                                    </div>
                                    <div class="block-body" id="blocks">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Design">
                                <form id="designForm" action="{{route('design.store')}}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <input type="hidden" name="link_id" value="{{@$link_id}}">
                                    <div class="general-option">
                                        {{-- General option --}}
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">General</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">URl</label>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">{{request()->getHttpHost()}}/</span>
                                                <input id="linkname" name="linkname" value="{{@$linkname}}" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3 input_file_bg">
                                            <label for="inputFile" class="input-file">
                                                <input name="profile_picture" type="file" id="inputFile" >
                                                <div class="fileRow">
                                                    <div class="fileLabel">Profile Picture</div>
                                                    <div id="designImg" class="fileImg" style="background-image: url('{{ @$user->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url($user->profile_picture) : asset('static/template_svg/image_icon.svg') }}')">
                                                    </div>
                                                </div>
                                            </label>
                                            @if(@$user->profile_picture)
                                                <div id="designSIdeAciton" class="file_action">
                                                    <label id="designImgRemove" class="action-file" for="">Remove</label>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Profile Bio</label>
                                            <textarea id="profileBio" class="form-control" name="bio" rows="4" placeholder="Profile Bio">{{@$user->bio}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Profile Name</label>
                                            <input id="profileName" name="name" value="{{@$user->name}}" type="text" class="form-control" placeholder="Profile Name">
                                        </div>
                                        @if(@count(@$themes) > 0)
                                        <input type="hidden" id="theme" name="theme">
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">Themes</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3" id="themes">
                                            {{-- <select id="theme" name="theme">
                                                <option value="">Select Theme</option>
                                                @foreach ($themes as $theme)
                                                    <option value="{{$theme->id}}" @if(@$design->theme == $theme->id) selected @endif>{{$theme->title}}</option>
                                                @endforeach
                                            </select> --}}
                                            @include('page.previewtheme', ['themes' => $themes,'themeid' => @$design->theme])
                                        </div>
                                        @endif
                                        <a href="{{route('theme.add')}}" class="btn btn-primary w-100">Create New Theme</a>
                                        <div style="display:none;">
                                            <div class="mb-3">
                                                <div class="color-row">
                                                    <div class="color-label">Primary Text Color</div>
                                                    <div id="primary-text-color">
                                                        <input name="primary_text_color" type="color" value="{{@$design->primary_text_color ? $design->primary_text_color : '#000000'}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="primary_background_type" id="primary_background_type" type="hidden" value="{{@$design->primary_background_type}}">
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
                                            <div id="background_type_preset" class="row @if(@$design->primary_background_type != 'preset') d-none @endif">
                                                <input type="hidden" value="{{@$design->primary_background_type}}" id="preset_color">
                                                <input type="hidden" value="{{@$design->primary_background}}" name="primary_background_preset" id="primary_background_preset">
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
                                            <div id="background_type_gradient" class="@if(@$design->primary_background_type != 'gradient') d-none @endif">
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="">Color One</label>
                                                    <input type="color" id="settings_background_type_gradient_color_one" name="primary_background_one" class="form-control" value="{{@$design->primary_background ? $design->primary_background : '#ffffff'}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="">Color Two</label>
                                                    <input type="color" id="settings_background_type_gradient_color_two" name="secondary_background" class="form-control" value="{{@$design->secondary_background ? $design->secondary_background : '#ffffff'}}">
                                                </div>
                                            </div>
                                            <div id="background_type_color" class="mb-3 @if(@$design->primary_background_type && $design->primary_background_type != 'color') d-none @endif">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Custom Color</label>
                                                    <input type="color" id="settings_background_type_color" name="primary_background" class="form-control" value="{{@$design->primary_background ? $design->primary_background : '#ffffff'}}">
                                                </div>
                                            </div>
                                            <input type="hidden" id="back_url" name="back_url">
                                            <div id="background_type_image" class="mb-3 @if(@$design->primary_background_type != 'image') d-none @endif">
                                                <input type="hidden" value="{{ (@$design->primary_background && @$design->primary_background_type == 'image') ? Storage::disk(Config::get('constants.DISK'))->url($design->primary_background) : '' }}" id="imgurl">
                                                <div class="form-group">
                                                    <img id="background_type_image_preview" height="50" width="50" src="{{ (@$design->primary_background && @$design->primary_background_type == 'image') ? Storage::disk(Config::get('constants.DISK'))->url($design->primary_background) : asset('static/template_svg/new-link/img/empty-state.jpg') }}" class="link-background-type-image">
                                                    <input id="background_type_image_input" type="file" name="primary_background_image" accept=".gif, .ico, .png, .jpg, .jpeg, .svg" class="form-control-file">
                                                </div>
                                            </div>
                                            <div id="background_type_video" class="mb-3 @if(@$design->primary_background_type != 'video') d-none @endif">
                                                <input type="hidden" value="{{ (@$design->primary_background && @$design->primary_background_type == 'video') ? Storage::disk(Config::get('constants.DISK'))->url($design->primary_background) : '' }}" id="videourl">
                                                <div class="form-group">
                                                    <label class="form-label" for="">Custom Video</label>
                                                    <input id="background_type_video_input" name="primary_background_video" type="file" accept="video/mp4,video/x-m4v,video/*" name="file[]" >
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="range-row">
                                                    <div class="range-label">Profile Picture Shadow</div>
                                                    <input name="profile_picture_shadow" id="profileShadow" type="range" class="form-range" value="{{@$design->profile_picture_shadow ? $design->profile_picture_shadow : '0'}}" min="0" max="10" step="1">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="range-row">
                                                    <div class="range-label">Profile Picture Border</div>
                                                    <input name="profile_picture_border" id="profile_img_border" type="range" class="form-range" value="{{@$design->profile_picture_border ? $design->profile_picture_border : '0'}}" min="0" max="10" step="1">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="color-row">
                                                    <div class="color-label">Profile Picture Border Color</div>
                                                    <div id="profile-picture-border-color">
                                                        <input name="profile_picture_border_color" type="color" value="{{@$design->profile_picture_border_color ? $design->profile_picture_border_color : '#000000'}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- General option --}}
                                        {{-- Cards option --}}
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">Cards</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Tactile Cards</div>
                                            <input type="hidden" name="tactile_card" value="{{@$design->tactile_card}}" id="tactile_card">
                                            <div id="tactileCard" class="tactile-cards">
                                                <div class="tactile-item tactile_no @if(!@$design->tactile_card) selected @endif">
                                                    <img class="tactile_img" src="{{ asset('static/template_svg/tactile_cards/no_tactile.svg') }}" alt="">
                                                </div>
                                                <div class="tactile-item tactile_1 @if(@$design->tactile_card == 1) selected @endif" data-id="1">
                                                    <img class="tactile_img" src="{{ asset('static/template_svg/tactile_cards/tactile_one.svg') }}" alt="">
                                                </div>
                                                <div class="tactile-item tactile_2 @if(@$design->tactile_card == 2) selected @endif" data-id="2">
                                                    <img class="tactile_img" src="{{ asset('static/template_svg/tactile_cards/tactile_two.svg') }}" alt="">
                                                </div>
                                                <div class="tactile-item tactile_3 @if(@$design->tactile_card == 3) selected @endif" data-id="3">
                                                    <img class="tactile_img" src="{{ asset('static/template_svg/tactile_cards/tactile_three.svg') }}" alt="">
                                                </div>
                                                <div class="tactile-item tactile_4 @if(@$design->tactile_card == 4) selected @endif" data-id="4">
                                                    <img class="tactile_img" src="{{ asset('static/template_svg/tactile_cards/tactile_four.svg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 noTactileCard">
                                            <div class="color-row">
                                                <div class="color-label">Color</div>
                                                <div id="card-color">
                                                    <input name="button_color" type="color" value="{{@$design->button_color ? $design->button_color : '#f1dfd5'}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Text Color</div>
                                                <div id="text-color">
                                                    <input name="button_text_color" type="color" value="{{@$design->button_text_color ? $design->button_text_color : '#000000'}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="range-row">
                                                <div class="range-label">Corner</div>
                                                <input name="button_corner" id="button_corner" type="range" class="form-range" value="{{@$design->button_corner ? $design->button_corner : '1'}}" min="6" max="30" step="1">
                                            </div>
                                        </div>
                                        <div class="mb-3 noTactileCard">
                                            <div class="range-row">
                                                <div class="range-label">Border</div>
                                                <input name="button_border" id="button_border" type="range" class="form-range" value="{{@$design->button_border ? $design->button_border : '0'}}" min="0" max="10" step="1">
                                            </div>
                                        </div>
                                        <div class="mb-3 noTactileCard">
                                            <div class="color-row">
                                                <div class="color-label">Border Color</div>
                                                <div id="card-border-color">
                                                    <input name="button_border_color" type="color" value="{{@$design->button_border_color ? $design->button_border_color : '#000000'}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 noTactileCard">
                                            <div class="range-row">
                                                <div class="range-label">Shadow</div>
                                                <input name="card_shadow" id="card_shadow" type="range" class="form-range" value="{{@$design->card_shadow ? $design->card_shadow : '0'}}" min="0" max="10" step="1">
                                            </div>
                                        </div>
                                        <div class="mb-3 noTactileCard">
                                            <div class="range-row">
                                                <div class="range-label">Content Spacing</div>
                                                <input name="card_spacing" id="card_spacing" type="range" class="form-range" value="{{@$design->card_spacing ? $design->card_spacing : '15'}}" min="15" max="44" step="1">
                                            </div>
                                        </div>
                                        {{-- Cards option --}}
                                        {{-- Fonts option --}}
                                        <div style="display: none;">
                                            <div class="title-row mb-3">
                                                <div class="line"></div>
                                                <div class="design-title">Fonts</div>
                                                <div class="line"></div>
                                            </div>
                                            <div class="accordion" id="accordion-fonts">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-2">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fonts" aria-expanded="false">
                                                            Text Font: {{@$design->text_font ? ucwords($design->text_font) : 'Open Sans' }}
                                                        </button>
                                                    </h2>
                                                    <input type="hidden" name="text_font" id="text_font" value="{{@$design->text_font}}">
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
                                        </div>
                                        {{-- Fonts option --}}
                                        {{-- Social & Sharing option --}}
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">Social & Sharing</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Enable vCard</div>
                                                <label class="form-check form-check-single form-switch">
                                                    <input name="enable_vcard" id="enable_vcard" class="form-check-input" type="checkbox" @if(@$design->enable_vcard == 0) @else checked @endif>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Enable Share Button</div>
                                                <label class="form-check form-check-single form-switch">
                                                    <input name="enable_share_button" id="enable_share" class="form-check-input" type="checkbox" @if(@$design->enable_share_button == 0) @else checked @endif>
                                                </label>
                                            </div>
                                        </div>
                                        {{-- Social & Sharing option --}}
                                        {{-- Other option --}}
                                        <div class="title-row mb-3">
                                            <div class="line"></div>
                                            <div class="design-title">Other</div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="color-row">
                                                <div class="color-label">Hide Links Branding</div>
                                                <label class="form-check form-check-single form-switch">
                                                    <input name="hide_link_binding" id="links_branding" class="form-check-input" type="checkbox" @if(@$design->hide_link_binding == 0) @else checked @endif>
                                                </label>
                                            </div>
                                        </div>
                                        {{-- Other option --}}
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
                        <div class="card-layout">
                            <video id="bgVideo" autoplay muted loop class="d-none">
                                <source src="" type="video/mp4" id="video_here" />
                            </video>
                            <div class="preview-all">
                                <div class="share_vcard_icons">
                                    <div class="preview_share" @if(@$design->enable_share_button == 1) @else style="display:none;" @endif>
                                        <img class="upper_icon" src="{{ asset('static/template_svg/share.svg') }}" alt="">
                                    </div>
                                    <div class="preview_vcard" @if(@$design->enable_vcard == 1) @else style="display:none;" @endif>
                                        <img class="upper_icon" src="{{ asset('static/template_svg/v_card.svg') }}" alt="">
                                    </div>
                                </div>
                                <div id="previewImg" class="preview-img">
                                    <img src="{{@$user->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url($user->profile_picture) : asset('static/default.png')}}" alt="">
                                </div>
                                <div id="PreviewName" class="preview-title">
                                    {{'@'.@$user->username}}
                                </div>
                                <div id="previewBio" class="preview-description">
                                    {!! $user->bio !!}
                                </div>
                                <div class="selected-social-icon" id="socialData">
                                    @foreach($socials as $social)
                                        <a @if(!$value = Commonhelper::getSocial($social,$link_id)) style="display:none;" @endif id="social_link_{{$social}}" href="@if($social == 'email')mailto:@endif{{strpos($value, 'http') === false ? 'https://' . $value : $value}}" target="_blank"><img class="selected-icon" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="preview-card" id="preview-blocks">
                                </div>
                            </div>
                            <div @if(@$design->hide_link_binding == 1) style="display:none;" @endif id="preview_footer" class="footer-text">
                                <a href="javasctipt:void(0)">
                                    <div class="powered-by">Powered by</div>
                                    <div class="link-text">
                                        <img class="link-img" src="{{ asset('static/template_svg/link_black.svg') }}" alt="">{{config('app.name')}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modals --}}
{{-- Block model  --}}
<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered newBlockModel" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">New Block</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="model-row">
                    <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_link">
                        <img class="" src="{{ asset('static/template_svg/link_black.svg') }}" alt="">
                        <div class="model-card-title">Link</div>
                        <div class="model-card-dec">Create a link to anywhere on the web</div>
                    </div>
                    <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_divider">
                        <img class="" src="{{ asset('static/template_svg/divider.svg') }}" alt="">
                        <div class="model-card-title">Divider</div>
                        <div class="model-card-dec">Organize your content with dividers</div>
                    </div>
                    <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_media">
                        <img class="" src="{{ asset('static/template_svg/media.svg') }}" alt="">
                        <div class="model-card-title">Media</div>
                        <div class="model-card-dec">Embed YouTube, Spotify, and more...</div>
                    </div>
                    <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_text">
                        <img class="" src="{{ asset('static/template_svg/text.svg') }}" alt="">
                        <div class="model-card-title">Text</div>
                        <div class="model-card-dec">Tell your page's story with a text section</div>
                    </div>
                    {{-- <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_instagram_scraper">
                        <img class="" src="{{ asset('static/template_svg/instagram.svg') }}" alt="">
                        <div class="model-card-title">Instagram Scraper</div>
                        <div class="model-card-dec">Automatically import links from Instagram captions</div>
                    </div>
                    <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_mailing">
                        <img class="" src="{{ asset('static/template_svg/email.svg') }}" alt="">
                        <div class="model-card-title">Mailing List</div>
                        <div class="model-card-dec">Collect email addresses and send to Mailchimp</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Block model  --}}

{{-- Link model  --}}
<div class="modal modal-blur fade" id="new_link" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered newLinkModel" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="edit_link">New Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addLink" action="{{route('block.store')}}" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="id">
                    <input type="hidden" name="type" value="link">
                    <input type="hidden" name="layout" id="layout" value="1">
                    <div class="new-link-model row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">URL or Email</label>
                                <div class="input-group mb-2">
                                    <input name="url" id="link_url" type="text" class="form-control" placeholder="URL or Email" autocomplete="off">
                                    <span class="input-group-text tooltip-layout">
                                        <img class="" src="{{ asset('static/template_svg/download.svg') }}" alt="">
                                        <span class="tooltiptext tooltip-top">Click to extract title, description and thumbnail from URL</span>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input id="link_title" name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="link_description" class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3" id="grid" style="display:none;">
                                <label class="form-label">Grid Size</label>
                                <select type="text" name="grid_size" class="form-select" placeholder="Select Attention" id="select-tags" value="">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="mb-3" id="labelDiv" style="display:none;">
                                <label class="form-label">
                                    <span class="tooltip-layout">
                                        <img class="question_mark" src="{{ asset('static/template_svg/question_icon.svg') }}" alt="">
                                        <span class="tooltiptext tooltip-top">Use a label to display a snippet of information like a price or category. After adding a label, you can configure it's colors in the Design tab.</span>
                                    </span>Label
                                </label>
                                <input type="text" id="label" name="label" class="form-control" placeholder="Label">
                            </div>
                            <div class="mb-3 input_file_bg" id="file" style="display:none;">
                                <label for="uploadFile" class="input-file">
                                    <input type="file" name="medias" id="uploadFile">
                                    <div class="fileRow">
                                        <div class="fileLabel">Image</div>
                                        <div class="fileImg" style="background-image: url('{{ asset('static/template_svg/image_icon.svg') }}')">
                                        </div>
                                    </div>
                                </label>
                                <div class="file_action" id="fileAction" style="display:none;">
                                    <label class="action-file" for="uploadFile">Replace</label>
                                    <label class="action-file" id="removeImg" for="">Remove</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Link Layout</label>
                                <div class="select-card-layout">
                                    <div class="card-view-layout layout_1 selected" data-type="1">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/button.svg') }}" alt="">
                                    </div>
                                    <div class="card-view-layout layout_2" data-type="2">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/thumbnail-basic.svg') }}" alt="">
                                    </div>
                                    <div class="card-view-layout layout_3" data-type="3">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/button-image-background.svg') }}" alt="">
                                    </div>
                                    <div class="card-view-layout layout_4" data-type="4">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/thumbnail-highlight.svg') }}" alt="">
                                    </div>
                                    <div class="card-view-layout layout_5" data-type="5">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/thumbnail-grid-2.svg') }}" alt="">
                                    </div>
                                    <div class="card-view-layout layout_6" data-type="6">
                                        <img class="card-view-img" src="{{ asset('static/template_svg/new-link/thumbnail-carousel.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Draw Attention</label>
                                <select type="text" id="animation" name="animation" class="form-select" placeholder="Select Attention" id="select-tags" value="">
                                    <option value="NONE">None</option>
                                    <option value="animate__shakeX">Shake</option>
                                    <option value="animate__tada">Tada</option>
                                    <option value="animate__pulse">Pulse</option>
                                    <option value="animate__bounceInDown">Jump</option>
                                    <option value="animate__swing">Swing</option>
                                    <option value="animate__jello">Jello</option>
                                    <option value="animate__rubberBand">Rubber Band</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Preview</label>
                                <div id="linkPreview" class="link_preview normal">
                                    {{-- normal --}}
                                    <a href="#" id="layout_preview_1" class="live-preview normal-view animate__animated animate__shakeX links_preview">
                                        <div class="details">
                                            <div id="layout_title_1" class="title">
                                                My Example Link
                                            </div>
                                            <div id="layout_desc_1" class="dec">
                                            </div>
                                        </div>
                                    </a>
                                    {{-- normal --}}
                                    {{-- thumbnail-basic --}}
                                    <a href="#" id="layout_preview_2" class="live-preview thumbnail-view animate__animated animate__tada links_preview">
                                        <div class="thumbnail-img">
                                            <img id="layout_img_2" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                        </div>
                                        <div class="details">
                                            <div id="layout_title_2" class="title">
                                                Ritesh pandey
                                            </div>
                                            <div id="layout_desc_2" class="dec">
                                                Ritesh pandey
                                            </div>
                                        </div>
                                    </a>
                                    {{-- thumbnail-basic --}}
                                    {{-- button-image-background --}}
                                    <a href="#" id="layout_preview_3" class="live-preview image-background-view animate__animated animate__pulse links_preview">
                                        <div class="details" id="layout_img_3" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                            <div id="layout_title_3" class="title">
                                                Ritesh pandey
                                            </div>
                                            <div id="layout_desc_3" class="dec">
                                                Ritesh pandey
                                            </div>
                                        </div>
                                    </a>
                                    {{-- button-image-background --}}
                                    {{-- thumbnail-highlight --}}
                                    <a href="#" id="layout_preview_4" class="live-preview thumbnail-highlight-view animate__animated animate__bounceInDown links_preview">
                                        <div class="thumbnail-highlight-img">
                                            <img id="layout_img_4" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                        </div>
                                        <div class="details">
                                            <div id="layout_title_4" class="title">
                                                Ritesh pandey
                                            </div>
                                            <div id="layout_desc_4" class="dec">
                                                Ritesh pandey
                                            </div>
                                        </div>
                                    </a>
                                    {{-- thumbnail-highlight --}}
                                    {{-- thumbnail-grid --}}
                                    <div id="layout_preview_5" class="live-preview grid-2 thumbnail-grid-view links_preview">
                                        <a href="#" class="animate__animated animate__swing">
                                            <div class="thumbnail-grid-img">
                                                <img id="layout_img_5" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                            </div>
                                        </a>
                                        <a href="#" class="animate__animated animate__swing">
                                            <div class="thumbnail-grid-img">
                                                <img id="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    {{-- thumbnail-grid --}}
                                    {{-- thumbnail-carousel --}}
                                    <div id="layout_preview_6" class="live-preview thumbnail-carousel-view animate__animated animate__jello links_preview">
                                        <a href="#" class="">
                                            <div class="thumbnail-carousel-img">
                                                <img id="layout_img_6" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                            </div>
                                            <div class="details">
                                                <div id="layout_title_6" class="title">
                                                    Ritesh pandey
                                                </div>
                                                <div id="layout_desc_6" class="dec">
                                                    Ritesh pandey
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="">
                                            <div class="thumbnail-carousel-img">
                                                <img id="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                            </div>
                                            <div class="details">
                                                <div class="title">

                                                </div>
                                                <div class="dec">

                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="">
                                            <div class="thumbnail-carousel-img">
                                                <img id="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                            </div>
                                            <div class="details">
                                                <div class="title">

                                                </div>
                                                <div class="dec">

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- thumbnail-carousel --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-button mt-4">
                        <button class="btn btn-primary w-100 addLink" data-id="addLink">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Link model  --}

{{-- Divider model  --}}
<div class="modal modal-blur fade" id="new_divider" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered newDividerModel" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="edit_divider">New Divider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addDivider" action="{{route('block.store')}}" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="type" value="divider">
                    <input type="hidden" name="id">
                    <div class="new-divider-model row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">
                                    Divider Title
                                </label>
                                <input type="text" id="divider_title" name="title" class="form-control" placeholder="Divider Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Divider Preview</label>
                                <div class="link_preview normal">
                                    {{-- normal --}}
                                    <a href="#" class="live-preview normal-view">
                                        <div class="details">
                                            <div class="title">
                                                {{@$user->name}}
                                            </div>
                                            <div id="divider_title1" class="dec">
                                                Title
                                            </div>
                                        </div>
                                    </a>
                                    <div class="divider-text"> Divider Text</div>
                                    <a href="#" class="live-preview normal-view">
                                        <div class="details">
                                            <div class="title">
                                                {{@$user->name}}
                                            </div>
                                            <div id="divider_title2" class="dec">
                                                Title
                                            </div>
                                        </div>
                                    </a>
                                    {{-- normal --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-button mt-4">
                        <button class="btn btn-primary w-100 addDivider" data-id="addDivider">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Divider model  --}}

{{-- Media model  --}}
<div class="modal modal-blur fade" id="new_media" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered newMediaModel" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="edit_media">New Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMedia" action="{{route('block.store')}}" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="type" value="media">
                    <input type="hidden" name="id">
                    <div class="new-media-model row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">
                                    Embed from YouTube, Vimeo, Apple Music, Soundcloud, Spotify, Twitch, and lots more!
                                </label>
                                <input type="text" id="media_url" name="url" class="form-control" placeholder="URL">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Embed Preview</label>
                                <div class="link_preview normal">
                                    {{-- default layout --}}
                                    <div class="default_embed_layout" id="embed_preview_default">
                                        <div class="embedUrl">
                                            <div class="video_svg">
                                                <img class="" src="{{ asset('static/template_svg/embeded_url.svg') }}" alt="">
                                            </div>
                                            <div class="embed_placeholder">Add a URL to embed media</div>
                                        </div>
                                    </div>
                                    {{-- default layout --}}
                                    {{-- dynamic layout --}}
                                    <div class="embded_url mb-2" id="embed_preview" style="display: none;">
                                        <iframe id="iframeUrl" style="border-radius: 10px;" width="100%" height="250" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                                    </div>
                                    {{-- dynamic layout --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-button mt-4">
                        <button class="btn btn-primary w-100 addMedia" data-id="addMedia">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Media model  --}}

{{-- Text model  --}}
<div class="modal modal-blur fade" id="new_text" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered newTextModel" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="edit_text">New Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addText" action="{{route('block.store')}}" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="type" value="text">
                    <input type="hidden" name="id">
                    <div class="new-text-model row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div id="summernote"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Text Preview</label>
                                <div class="link_preview">
                                    <div class="textPreview">
                                        <div class="preview-text" id="text_preview">
                                            <h2>This is example text</h2>
                                            <p>Start writing in the text box to add your own 🙌</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-button mt-4">
                        <button class="btn btn-primary w-100 addText" data-id="addText">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Text model  --}}

{{-- delete block model --}}
<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove this block? What you've done cannot be undone.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-danger w-100 deleteBlockBtn" data-bs-dismiss="modal">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- delete block model --}}

{{-- crop image model --}}
<div class="modal modal-blur fade" id="crop-image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <img id="image" src="">
                    </div>
                    <div class="col-md-4">
                        <div class="preview"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn me-auto" data-bs-dismiss="modal">Cancel</a>
                <a href="#" class="btn btn-primary deleteBlockBtn" id="crop" data-bs-dismiss="modal">Crop</a>
            </div>
        </div>
    </div>
</div>

@endsection
