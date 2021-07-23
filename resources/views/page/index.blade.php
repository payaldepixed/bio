@extends('layouts.app')

@section('title')
Page
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('js/pages/page.js') }}"></script>
@endsection

@section('content')
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
                                                                <div class="checkbox-social">
                                                                    <input type="checkbox" id="type_{{$social}}" @if(Commonhelper::getSocial($social)) checked @endif value="{{$social}}" name="types[]" class="sociallinks" style="display: none;">
                                                                    <label for="type_{{$social}}" class="social-icon">
                                                                        <img class="social-img" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt="{{$social}}"> <span class="social-icon-name">{{$name}}</span>
                                                                    </label>
                                                                </div>
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
                                <div class="my-block">
                                    <div class="my-block-header">
                                        My Blocks
                                    </div>
                                    <div class="block-body" id="blocks">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Design">
                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
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
                            <div class="preview-all">
                                <div class="share_vcard_icons">
                                    <div class="preview_share">
                                        <img class="upper_icon" src="{{ asset('static/template_svg/share.svg') }}" alt="">
                                    </div>
                                    <div class="preview_vcard">
                                        <img class="upper_icon" src="{{ asset('static/template_svg/v_card.svg') }}" alt="">
                                    </div>
                                </div>
                                <div id="previewImg" class="preview-img">
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
                                <div class="preview-card" id="preview-blocks">
                                </div>
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
                                <div id="linkPreview" class="link_preview normal" style="display: block;">
                                    {{-- normal --}}
                                    <a href="#" style="display: block;" id="layout_preview_1" class="live-preview normal-view animate__animated animate__shakeX links_preview">
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
                                    <div id="layout_preview_5" style="display: none;" class="live-preview grid-2 thumbnail-grid-view links_preview">
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
                                                {{@Auth::user()->name}}
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
                                                {{@Auth::user()->name}}
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

@endsection
