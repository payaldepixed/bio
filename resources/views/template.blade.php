@extends('layouts.app')

@section('title')
Page Template
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
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
                    Page Template
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
                   <span class="my-page"> My Page:</span>  <a href="javascript:void(0)"  target="_blank">links.co/mox</a> <img class="" src="{{ asset('static/template_svg/mypage.svg') }}" alt="">
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
                                                    <div class="social_icons_lists mb-4">
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="email" style="display: none;">
                                                             <label for="email" class="social-icon">
                                                                 <img class="social-img" src="{{ asset('static/template_svg/email.svg') }}" alt="email">
                                                                 <span class="social-icon-name">Email</span>
                                                            </label>
                                                        </div>

                                                         <div class="checkbox-social">
                                                            <input type="checkbox" id="newsletter" style="display: none;">
                                                            <label for="newsletter" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/newsletter.svg') }}" alt="newsletter"> <span class="social-icon-name">Newsletter</span>
                                                            </label>
                                                         </div>
                                                         <div class="checkbox-social">
                                                            <input type="checkbox" id="phone" style="display: none;">
                                                            <label for="phone" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/phone.svg') }}" alt="phone"> <span class="social-icon-name">Phone</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="website" style="display: none;">
                                                            <label for="website" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/website.svg') }}" alt="website"> <span class="social-icon-name">Website</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="apple-music" style="display: none;">
                                                            <label for="apple-music" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/apple_music.svg') }}" alt="apple-music"> <span class="social-icon-name">Apple Music</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="apple-podcast" style="display: none;">
                                                            <label for="apple-podcast" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/apple_podcast.svg') }}" alt="apple-podcast"> <span class="social-icon-name">Apple Podcast</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="bandcamp" style="display: none;">
                                                            <label for="bandcamp" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/bandcamp.svg') }}" alt="bandcamp"> <span class="social-icon-name">Bandcamp</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="behance" style="display: none;">
                                                            <label for="behance" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/behance.svg') }}" alt="behance"> <span class="social-icon-name">Behance</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="clubhouse" style="display: none;">
                                                            <label for="clubhouse" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/clubhouse.svg') }}" alt="clubhouse"> <span class="social-icon-name">clubhouse</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="discord" style="display: none;">
                                                            <label for="discord" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/discord.svg') }}" alt="discord"> <span class="social-icon-name">Discord</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="dribble" style="display: none;">
                                                            <label for="dribble" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/dribble.svg') }}" alt="dribble"> <span class="social-icon-name">Dribble</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="facebook" style="display: none;">
                                                            <label for="facebook" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/facebook.svg') }}" alt="facebook"> <span class="social-icon-name">Facebook</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="google_podcast" style="display: none;">
                                                            <label for="google_podcast" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/google_podcast.svg') }}" alt="google_podcast"> <span class="social-icon-name">Google Podcast</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="instagram" style="display: none;">
                                                            <label for="instagram" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/instagram.svg') }}" alt="instagram"> <span class="social-icon-name">Instagram</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="kofi" style="display: none;">
                                                            <label for="kofi" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/kofi.svg') }}" alt="kofi"> <span class="social-icon-name">Ko-fi</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="last_fm" style="display: none;">
                                                            <label for="last_fm" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/last_fm.svg') }}" alt="last_fm"> <span class="social-icon-name">Last.fm</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="linkedin" style="display: none;">
                                                            <label for="linkedin" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/linkedin.svg') }}" alt="linkedin"> <span class="social-icon-name">Linkedin</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="medium" style="display: none;">
                                                            <label for="medium" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/medium.svg') }}" alt="medium"> <span class="social-icon-name">Medium</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="meetup" style="display: none;">
                                                            <label for="meetup" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/meetup.svg') }}" alt="meetup"> <span class="social-icon-name">Meetup</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="only_fans" style="display: none;">
                                                            <label for="only_fans" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/only_fans.svg') }}" alt="only_fans"> <span class="social-icon-name">OnlyFans</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="patreon" style="display: none;">
                                                            <label for="patreon" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/patreon.svg') }}" alt="patreon"> <span class="social-icon-name">Patreon</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="pinterest" style="display: none;">
                                                            <label for="pinterest" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/pinterest.svg') }}" alt="pinterest"> <span class="social-icon-name">Pinterest</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="reddit" style="display: none;">
                                                            <label for="reddit" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/reddit.svg') }}" alt="reddit"> <span class="social-icon-name">Reddit</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="signal" style="display: none;">
                                                            <label for="signal" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/signal.svg') }}" alt="signal"> <span class="social-icon-name">Signal</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="slack" style="display: none;">
                                                            <label for="slack" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/slack.svg') }}" alt="slack"> <span class="social-icon-name">Slack</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="snapchat" style="display: none;">
                                                            <label for="snapchat" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/snapchat.svg') }}" alt="snapchat"> <span class="social-icon-name">Snapchat</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="soundcloud" style="display: none;">
                                                            <label for="soundcloud" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/soundcloud.svg') }}" alt="soundcloud"> <span class="social-icon-name">Soundcloud</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="spotify" style="display: none;">
                                                            <label for="spotify" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/spotify.svg') }}" alt="spotify"> <span class="social-icon-name">Spotify</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="telegram" style="display: none;">
                                                            <label for="telegram" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/telegram.svg') }}" alt="telegram"> <span class="social-icon-name">Telegram</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="tidal" style="display: none;">
                                                            <label for="tidal" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/tidal.svg') }}" alt="tidal"> <span class="social-icon-name">Tidal</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="tiktok" style="display: none;">
                                                            <label for="tiktok" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/tiktok.svg') }}" alt="tiktok"> <span class="social-icon-name">TikTok</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="tumblr" style="display: none;">
                                                            <label for="tumblr" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/tumblr.svg') }}" alt="tumblr"> <span class="social-icon-name">Tumblr</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="twitch" style="display: none;">
                                                            <label for="twitch" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/twitch.svg') }}" alt="twitch"> <span class="social-icon-name">Twitch</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="twitter" style="display: none;">
                                                            <label for="twitter" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/twitter.svg') }}" alt="twitter"> <span class="social-icon-name">Twitter</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="unsplash" style="display: none;">
                                                            <label for="unsplash" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/unsplash.svg') }}" alt="unsplash"> <span class="social-icon-name">Unsplash</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="vimeo" style="display: none;">
                                                            <label for="vimeo" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/vimeo.svg') }}" alt="vimeo"> <span class="social-icon-name">Vimeo</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="wechat" style="display: none;">
                                                            <label for="wechat" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/wechat.svg') }}" alt="wechat"> <span class="social-icon-name">WeChat</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="whatsapp" style="display: none;">
                                                            <label for="whatsapp" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/whatsapp.svg') }}" alt="whatsapp"> <span class="social-icon-name">WhatsApp</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox-social">
                                                            <input type="checkbox" id="youtube" style="display: none;">
                                                            <label for="youtube" class="social-icon">
                                                                <img class="social-img" src="{{ asset('static/template_svg/youtube.svg') }}" alt="youtube"> <span class="social-icon-name">Youtube</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                     <div class="social-inputs">

                                                        <div class="social-details mb-2">
                                                            <div class="drag_drop">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                            </div>
                                                            <div class="input-url">
                                                                <div class="inputStyle">
                                                                    <input type="text">
                                                                    <div class="social-input-icon">
                                                                        <img class="" src="{{ asset('static/template_svg/instagram.svg') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="delete_icon">
                                                                <img class="" src="{{ asset('static/template_svg/delete.svg') }}" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="social-details mb-2">
                                                            <div class="drag_drop">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                            </div>
                                                            <div class="input-url">
                                                                <div class="inputStyle">
                                                                    <input type="text">
                                                                    <div class="social-input-icon">
                                                                        <img class="" src="{{ asset('static/template_svg/facebook.svg') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="delete_icon">
                                                                <img class="" src="{{ asset('static/template_svg/delete.svg') }}" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="social-details mb-2">
                                                            <div class="drag_drop">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                            </div>
                                                            <div class="input-url">
                                                                <div class="inputStyle">
                                                                    <input type="text">
                                                                    <div class="social-input-icon">
                                                                        <img class="" src="{{ asset('static/template_svg/twitter.svg') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="delete_icon">
                                                                <img class="" src="{{ asset('static/template_svg/delete.svg') }}" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="social-details mb-2">
                                                            <div class="drag_drop">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                                <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                            </div>
                                                            <div class="input-url">
                                                                <div class="inputStyle">
                                                                    <input type="text">
                                                                    <div class="social-input-icon">
                                                                        <img class="" src="{{ asset('static/template_svg/linkedin.svg') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="delete_icon">
                                                                <img class="" src="{{ asset('static/template_svg/delete.svg') }}" alt="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-block">
                                    <div class="my-block-header">
                                        My Blocks
                                    </div>
                                    <div class="block-body">
                                        <div class="block-details">
                                            <div class="plus-icon" data-bs-toggle="modal" data-bs-target="#modal-large">
                                                <div class="plus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="block-card">
                                                <div class="card-details">
                                                    <div class="card-drag">
                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="">
                                                        <img class="" src="{{ asset('static/template_svg/three_dot.svg') }}" alt="" style="margin-left: -12px;">
                                                    </div>
                                                    <div class="block-card-details">
                                                        <div class="block-title">
                                                            <img class="" src="{{ asset('static/template_svg/link.svg') }}" alt=""> Block name
                                                        </div>
                                                        <div class="views">
                                                            Views: <span>0</span>
                                                        </div>
                                                    </div>
                                                    <div class="block-card-action">
                                                        <div class="action-icon">
                                                            <img class="" src="{{ asset('static/template_svg/edit.svg') }}" alt="">
                                                        </div>
                                                        <div class="action-icon">
                                                            <img class="" src="{{ asset('static/template_svg/copy.svg') }}" alt="">
                                                        </div>
                                                        <div class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                                            <img class="" src="{{ asset('static/template_svg/delete_red.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="plus-icon" data-bs-toggle="modal" data-bs-target="#modal-large">
                                                <div class="plus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="submit-button mt-4">
                                    <button class="btn btn-primary w-100">Save</button>
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
                <div class="preview-layout">
                    <div class="preview-details">
                        <div class="card-layout">
                            <div class="preview-all">
                                <div class="preview-img">
                                    <img src="{{ asset('static/default.png') }}" alt="">
                                </div>
                                <div class="preview-title">
                                    @Ritesh
                                </div>
                                <div class="preview-description">
                                    Saving humanity from cold & lifeless robots 😉
                                </div>
                                <div class="selected-social-icon">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/website.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/email.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/facebook.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/instagram.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/linkedin.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/twitter.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/tiktok.svg') }}" alt="">
                                    <img class="selected-icon" src="{{ asset('static/template_svg/youtube.svg') }}" alt="">
                                </div>
                                <div class="preview-card">

                                        <!--<div class="link_preview thumbnail-basic">


                                            {{-- thumbnail-basic --}}

                                            <a href="#" class="live-preview thumbnail-view">
                                                <div class="thumbnail-img">
                                                    <img class="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        Ritesh pandey
                                                    </div>
                                                    <div class="dec">
                                                        Ritesh pandey
                                                    </div>
                                                </div>
                                            </a>

                                            {{-- thumbnail-basic --}}


                                            {{-- thumbnail-highlight --}}

                                            <a href="#" class="live-preview thumbnail-highlight-view">
                                                <div class="thumbnail-highlight-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        Ritesh pandey
                                                    </div>
                                                    <div class="dec">
                                                        Ritesh pandey
                                                    </div>
                                                </div>
                                            </a>

                                            {{-- thumbnail-highlight --}}


                                            {{-- thumbnail-grid --}}
                                            <div class="live-preview grid-2 thumbnail-grid-view">
                                                <a href="#" class="">
                                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                                </a>
                                                <a href="#" class="">
                                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                                </a>
                                            </div>

                                            {{-- thumbnail-grid --}}


                                            {{-- thumbnail-carousel --}}
                                            <div class="live-preview thumbnail-carousel-view">
                                                <a href="#" class="">
                                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                                    </div>
                                                    <div class="details">
                                                        <div class="title">
                                                            Ritesh pandey
                                                        </div>
                                                        <div class="dec">
                                                            Ritesh pandey
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="">
                                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                                    </div>
                                                    <div class="details">
                                                        <div class="title">
                                                            Ritesh pandey
                                                        </div>
                                                        <div class="dec">
                                                            Ritesh pandey
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="">
                                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                                    </div>
                                                    <div class="details">
                                                        <div class="title">
                                                            Ritesh pandey
                                                        </div>
                                                        <div class="dec">
                                                            Ritesh pandey
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            {{-- thumbnail-carousel --}}

                                        </div>-->





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
                                </div>
                            </div>
                            <div class="footer-text">
                                <a href="javasctipt:void(0)">
                                    <div class="powered-by">Powered by</div>
                                    <div class="link-text">
                                        <img class="" src="{{ asset('static/template_svg/link_black.svg') }}" alt="">Ritesh</div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>







{{-- New Block model  --}}


  <div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newBlockModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Block</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="model-row">
                <div class="model-card" data-bs-toggle="modal" data-bs-target="#newLink">
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
                <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_instagram_scraper">
                    <img class="" src="{{ asset('static/template_svg/instagram.svg') }}" alt="">
                    <div class="model-card-title">Instagram Scraper</div>
                    <div class="model-card-dec">Automatically import links from Instagram captions</div>
                </div>
                <div class="model-card" data-bs-toggle="modal" data-bs-target="#new_mailing">
                    <img class="" src="{{ asset('static/template_svg/email.svg') }}" alt="">
                    <div class="model-card-title">Mailing List</div>
                    <div class="model-card-dec">Collect email addresses and send to Mailchimp</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


{{-- New Block model  --}}



{{-- New Link model  --}}

<div class="modal modal-blur fade" id="newLink" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newLinkModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Link</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="new-link-model row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">URL or Email</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="http://example.com" autocomplete="off">
                            <span class="input-group-text tooltip-layout">
                                <img class="" src="{{ asset('static/template_svg/download.svg') }}" alt="">
                            <span class="tooltiptext tooltip-top">Click to extract title, description and thumbnail from URL</span>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Title"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Grid Size</label>
                        <select type="text" class="form-select" placeholder="Select Attention" id="select-tags" value="">
                           <option value="2">2</option>
                           <option value="3">3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <span class="tooltip-layout">
                                <img class="question_mark" src="{{ asset('static/template_svg/question_icon.svg') }}" alt="">
                                <span class="tooltiptext tooltip-top">Use a label to display a snippet of information like a price or category. After adding a label, you can configure it's colors in the Design tab.</span>
                            </span>Label
                        </label>
                        <input type="text" class="form-control" placeholder="Label">
                    </div>
                    <div class="mb-3">
                        <label for="inputFile" class="input-file">
                            <input type="file" id="inputFile">
                            <div class="fileRow">
                                <div class="fileLabel">Image</div>
                                <div class="fileImg" style="background-image: url('{{ asset('static/template_svg/image_icon.svg') }}')">
                                    {{-- <img class="" src="{{ asset('static/template_svg/image_icon.svg') }}" alt=""> --}}
                                </div>
                            </div>
                        </label>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Link Layout</label>
                        <div class="select-card-layout">
                            <div class="card-view-layout selected">
                                <img class="" src="{{ asset('static/template_svg/new-link/button.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-basic.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/button-image-background.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-highlight.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-grid-2.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-carousel.svg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Draw Attention</label>
                        <select type="text" class="form-select" placeholder="Select Attention" id="select-tags" value="">
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
                        <div class="link_preview normal">

                            {{-- normal --}}
                            <a href="#" class="live-preview normal-view animate__animated animate__shakeX">
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>
                            {{-- normal --}}


                            {{-- thumbnail-basic --}}

                            <a href="#" class="live-preview thumbnail-view animate__animated animate__tada">
                                <div class="thumbnail-img">
                                    <img class="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            {{-- thumbnail-basic --}}


                            {{-- button-image-background --}}

                            <a href="#" class="live-preview image-background-view animate__animated animate__pulse">
                                <div class="details" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            {{-- button-image-background --}}


                            {{-- thumbnail-highlight --}}

                            <a href="#" class="live-preview thumbnail-highlight-view animate__animated animate__bounceInDown">
                                 <div class="thumbnail-highlight-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            {{-- thumbnail-highlight --}}


                            {{-- thumbnail-grid --}}
                            <div class="live-preview grid-2 thumbnail-grid-view">
                                <a href="#" class="animate__animated animate__swing">
                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                </a>
                                <a href="#" class="animate__animated animate__swing">
                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                </a>
                            </div>

                            {{-- thumbnail-grid --}}


                            {{-- thumbnail-carousel --}}
                            <div class="live-preview thumbnail-carousel-view animate__animated animate__jello">
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
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
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Link model  --}}



{{-- New Divider model  --}}

<div class="modal modal-blur fade" id="new_divider" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newDividerModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Divider</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="new-divider-model row">
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">
                            Divider Title
                        </label>
                        <input type="text" class="form-control" placeholder="Divider Title">
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
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            <div class="divider-text"> Divider Text</div>

                            <a href="#" class="live-preview normal-view">
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>
                            {{-- normal --}}

                        </div>
                    </div>

                </div>
            </div>

            <div class="submit-button mt-4">
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Divider model  --}}



{{-- New Media model  --}}

<div class="modal modal-blur fade" id="new_media" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newMediaModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Media</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="new-media-model row">
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">
                           Embed from YouTube, Vimeo, Apple Music, Soundcloud, Spotify, Twitch, and lots more!
                        </label>
                        <input type="text" class="form-control" placeholder="Paste your http:// URL">
                    </div>
                </div>
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">Embed Preview</label>
                        <div class="link_preview normal">

                            {{-- default layout --}}

                            <div class="default_embed_layout">
                                <div class="embedUrl">
                                    <div class="video_svg">
                                        <img class="" src="{{ asset('static/template_svg/embeded_url.svg') }}" alt="">
                                    </div>
                                    <div class="embed_placeholder">Add a URL to embed media</div>
                                </div>
                            </div>

                             {{-- default layout --}}



                              {{-- dynamic layout --}}


                            {{-- <div class="embded_url mb-2">
                                <iframe style="border-radius: 10px;" width="100%" height="250" src="https://www.youtube.com/embed/2JyW4yAyTl0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                            </div> --}}

                             {{-- dynamic layout --}}

                        </div>
                    </div>

                </div>
            </div>

            <div class="submit-button mt-4">
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Media model  --}}




{{-- New Text model  --}}

<div class="modal modal-blur fade" id="new_text" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newTextModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Text</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
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
                                <div class="preview-text">
                                    <h2>This is example text</h2>
                                    <p>Start writing in the text box to add your own 🙌</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="submit-button mt-4">
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Text model  --}}



{{-- New Instagram Scraper model  --}}

<div class="modal modal-blur fade" id="new_instagram_scraper" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newInstagramScraperModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Instagram Scraper</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="instagram-subtitle text-center">
                  The Instagram Scraper block will automatically add links from your Instagram post captions to your Liinks page. Links in captions of new Instagram posts will automatically be added beneath this block using the selected layout.
              </div>
            <div class="new-instagram-Scraper-model row mt-3">
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">Scraped Link Layout</label>
                         <div class="select-card-layout">
                            <div class="card-view-layout selected">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-basic.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-highlight.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-grid-2.svg') }}" alt="">
                            </div>
                            <div class="card-view-layout">
                                <img class="" src="{{ asset('static/template_svg/new-link/thumbnail-grid-3.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">Scraped Link Preview</label>

                        <div class="link_preview thumbnail-basic">


                            {{-- thumbnail-basic --}}

                            <a href="#" class="live-preview thumbnail-view">
                                <div class="thumbnail-img">
                                    <img class="" src="{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            {{-- thumbnail-basic --}}


                            {{-- thumbnail-highlight --}}

                            <a href="#" class="live-preview thumbnail-highlight-view">
                                 <div class="thumbnail-highlight-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Ritesh pandey
                                    </div>
                                    <div class="dec">
                                        Ritesh pandey
                                    </div>
                                </div>
                            </a>

                            {{-- thumbnail-highlight --}}


                            {{-- thumbnail-grid --}}
                            <div class="live-preview grid-2 thumbnail-grid-view">
                                <a href="#" class="">
                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                </a>
                                <a href="#" class="">
                                    <div class="thumbnail-grid-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')"></div>
                                </a>
                            </div>

                            {{-- thumbnail-grid --}}


                            {{-- thumbnail-carousel --}}
                            <div class="live-preview thumbnail-carousel-view">
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="">
                                    <div class="thumbnail-carousel-img" style="background-image: url('{{ asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Ritesh pandey
                                        </div>
                                        <div class="dec">
                                            Ritesh pandey
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
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Instagram Scraper model  --}}



{{-- New Mailing List model  --}}

<div class="modal modal-blur fade" id="new_mailing" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered newMailingModel" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h5 class="modal-title">New Mailing List</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="new-mailing-subtitle text-center">
                  The Mailing List block allows you to collect email addresses and automatically send them to Mailchimp.
              </div>
            <div class="new-mailing-model row mt-3">
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">
                            Call to action
                        </label>
                        <input type="text" class="form-control" placeholder="Subscribe" value="Subscribe:">
                    </div>
                </div>
                <div class="col-md-6">


                    <div class="mb-3">
                        <label class="form-label">Preview</label>

                        <div class="link_preview normal">


                            <a href="#" class="live-preview normal-view">
                                <div class="details">
                                    <div class="title">
                                        Subscribe
                                    </div>
                                    <div class="subscribe">
                                       <div class="input-group mb-2">
                                            <input type="text" class="form-control" placeholder="email@example.com" autocomplete="off">
                                            <span class="input-group-text btn-dark">
                                                <img class="" src="{{ asset('static/template_svg/right_arrow.svg') }}" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>

            <div class="submit-button mt-4">
                <button class="btn btn-primary w-100">Create</button>
            </div>


          </div>
        </div>
      </div>
    </div>


{{-- New Mailing List model  --}}






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
                <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                    Cancel
                  </a></div>
                <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                    Delete
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


{{-- delete block model --}}

@endsection
