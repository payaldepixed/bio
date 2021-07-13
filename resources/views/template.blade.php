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
                                                        <label for="email" class="social-icon">
                                                            <input type="checkbox" id="email" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/email.svg') }}" alt="email"> <span class="social-icon-name">Email</span>
                                                        </label>
                                                        <label for="newsletter" class="social-icon">
                                                            <input type="checkbox" id="newsletter" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/newsletter.svg') }}" alt="newsletter"> <span class="social-icon-name">Newsletter</span>
                                                        </label>
                                                        <label for="phone" class="social-icon">
                                                            <input type="checkbox" id="phone" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/phone.svg') }}" alt="phone"> <span class="social-icon-name">Phone</span>
                                                        </label>
                                                        <label for="website" class="social-icon">
                                                            <input type="checkbox" id="website" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/website.svg') }}" alt="website"> <span class="social-icon-name">Website</span>
                                                        </label>
                                                        <label for="apple-music" class="social-icon">
                                                            <input type="checkbox" id="apple-music" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/apple_music.svg') }}" alt="apple-music"> <span class="social-icon-name">Apple Music</span>
                                                        </label>
                                                        <label for="apple-podcast" class="social-icon">
                                                            <input type="checkbox" id="apple-podcast" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/apple_podcast.svg') }}" alt="apple-podcast"> <span class="social-icon-name">Apple Podcast</span>
                                                        </label>
                                                        <label for="bandcamp" class="social-icon">
                                                            <input type="checkbox" id="bandcamp" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/bandcamp.svg') }}" alt="bandcamp"> <span class="social-icon-name">Bandcamp</span>
                                                        </label>
                                                        <label for="behance" class="social-icon">
                                                            <input type="checkbox" id="behance" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/behance.svg') }}" alt="behance"> <span class="social-icon-name">Behance</span>
                                                        </label>
                                                        <label for="clubhouse" class="social-icon">
                                                            <input type="checkbox" id="clubhouse" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/clubhouse.svg') }}" alt="clubhouse"> <span class="social-icon-name">clubhouse</span>
                                                        </label>
                                                        <label for="discord" class="social-icon">
                                                            <input type="checkbox" id="discord" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/discord.svg') }}" alt="discord"> <span class="social-icon-name">Discord</span>
                                                        </label>
                                                        <label for="dribble" class="social-icon">
                                                            <input type="checkbox" id="dribble" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/dribble.svg') }}" alt="dribble"> <span class="social-icon-name">Dribble</span>
                                                        </label>
                                                        <label for="facebook" class="social-icon">
                                                            <input type="checkbox" id="facebook" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/facebook.svg') }}" alt="facebook"> <span class="social-icon-name">Facebook</span>
                                                        </label>
                                                        <label for="google_podcast" class="social-icon">
                                                            <input type="checkbox" id="google_podcast" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/google_podcast.svg') }}" alt="google_podcast"> <span class="social-icon-name">Google Podcast</span>
                                                        </label>
                                                        <label for="instagram" class="social-icon">
                                                            <input type="checkbox" id="instagram" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/instagram.svg') }}" alt="instagram"> <span class="social-icon-name">Instagram</span>
                                                        </label>
                                                        <label for="kofi" class="social-icon">
                                                            <input type="checkbox" id="kofi" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/kofi.svg') }}" alt="kofi"> <span class="social-icon-name">Ko-fi</span>
                                                        </label>
                                                        <label for="last_fm" class="social-icon">
                                                            <input type="checkbox" id="last_fm" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/last_fm.svg') }}" alt="last_fm"> <span class="social-icon-name">Last.fm</span>
                                                        </label>
                                                        <label for="linkedin" class="social-icon">
                                                            <input type="checkbox" id="linkedin" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/linkedin.svg') }}" alt="linkedin"> <span class="social-icon-name">Linkedin</span>
                                                        </label>
                                                        <label for="medium" class="social-icon">
                                                            <input type="checkbox" id="medium" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/medium.svg') }}" alt="medium"> <span class="social-icon-name">Medium</span>
                                                        </label>
                                                        <label for="meetup" class="social-icon">
                                                            <input type="checkbox" id="meetup" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/meetup.svg') }}" alt="meetup"> <span class="social-icon-name">Meetup</span>
                                                        </label>
                                                        <label for="only_fans" class="social-icon">
                                                            <input type="checkbox" id="only_fans" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/only_fans.svg') }}" alt="only_fans"> <span class="social-icon-name">OnlyFans</span>
                                                        </label>
                                                        <label for="patreon" class="social-icon">
                                                            <input type="checkbox" id="patreon" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/patreon.svg') }}" alt="patreon"> <span class="social-icon-name">Patreon</span>
                                                        </label>
                                                        <label for="pinterest" class="social-icon">
                                                            <input type="checkbox" id="pinterest" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/pinterest.svg') }}" alt="pinterest"> <span class="social-icon-name">Pinterest</span>
                                                        </label>
                                                        <label for="reddit" class="social-icon">
                                                            <input type="checkbox" id="reddit" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/reddit.svg') }}" alt="reddit"> <span class="social-icon-name">Reddit</span>
                                                        </label>
                                                        <label for="signal" class="social-icon">
                                                            <input type="checkbox" id="signal" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/signal.svg') }}" alt="signal"> <span class="social-icon-name">Signal</span>
                                                        </label>
                                                        <label for="slack" class="social-icon">
                                                            <input type="checkbox" id="slack" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/slack.svg') }}" alt="slack"> <span class="social-icon-name">Slack</span>
                                                        </label>
                                                        <label for="snapchat" class="social-icon">
                                                            <input type="checkbox" id="snapchat" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/snapchat.svg') }}" alt="snapchat"> <span class="social-icon-name">Snapchat</span>
                                                        </label>
                                                        <label for="soundcloud" class="social-icon">
                                                            <input type="checkbox" id="soundcloud" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/soundcloud.svg') }}" alt="soundcloud"> <span class="social-icon-name">Soundcloud</span>
                                                        </label>
                                                        <label for="spotify" class="social-icon">
                                                            <input type="checkbox" id="spotify" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/spotify.svg') }}" alt="spotify"> <span class="social-icon-name">Spotify</span>
                                                        </label>
                                                        <label for="telegram" class="social-icon">
                                                            <input type="checkbox" id="telegram" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/telegram.svg') }}" alt="telegram"> <span class="social-icon-name">Telegram</span>
                                                        </label>
                                                        <label for="tidal" class="social-icon">
                                                            <input type="checkbox" id="tidal" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/tidal.svg') }}" alt="tidal"> <span class="social-icon-name">Tidal</span>
                                                        </label>
                                                        <label for="tiktok" class="social-icon">
                                                            <input type="checkbox" id="tiktok" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/tiktok.svg') }}" alt="tiktok"> <span class="social-icon-name">TikTok</span>
                                                        </label>
                                                        <label for="tumblr" class="social-icon">
                                                            <input type="checkbox" id="tumblr" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/tumblr.svg') }}" alt="tumblr"> <span class="social-icon-name">Tumblr</span>
                                                        </label>
                                                        <label for="twitch" class="social-icon">
                                                            <input type="checkbox" id="twitch" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/twitch.svg') }}" alt="twitch"> <span class="social-icon-name">Twitch</span>
                                                        </label>
                                                        <label for="twitter" class="social-icon">
                                                            <input type="checkbox" id="twitter" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/twitter.svg') }}" alt="twitter"> <span class="social-icon-name">Twitter</span>
                                                        </label>
                                                        <label for="unsplash" class="social-icon">
                                                            <input type="checkbox" id="unsplash" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/unsplash.svg') }}" alt="unsplash"> <span class="social-icon-name">Unsplash</span>
                                                        </label>
                                                        <label for="vimeo" class="social-icon">
                                                            <input type="checkbox" id="vimeo" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/vimeo.svg') }}" alt="vimeo"> <span class="social-icon-name">Vimeo</span>
                                                        </label>
                                                        <label for="wechat" class="social-icon">
                                                            <input type="checkbox" id="wechat" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/wechat.svg') }}" alt="wechat"> <span class="social-icon-name">WeChat</span>
                                                        </label>
                                                        <label for="whatsapp" class="social-icon">
                                                            <input type="checkbox" id="whatsapp" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/whatsapp.svg') }}" alt="whatsapp"> <span class="social-icon-name">WhatsApp</span>
                                                        </label>
                                                        <label for="youtube" class="social-icon">
                                                            <input type="checkbox" id="youtube" class="d-none">
                                                            <img class="social-img" src="{{ asset('static/template_svg/youtube.svg') }}" alt="youtube"> <span class="social-icon-name">Youtube</span>
                                                        </label>
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
                                                        <div class="action-icon">
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
                <div class="model-card">
                    <img class="" src="{{ asset('static/template_svg/divider.svg') }}" alt="">
                    <div class="model-card-title">Divider</div>
                    <div class="model-card-dec">Organize your content with dividers</div>
                </div>
                <div class="model-card">
                    <img class="" src="{{ asset('static/template_svg/media.svg') }}" alt="">
                    <div class="model-card-title">Media</div>
                    <div class="model-card-dec">Embed YouTube, Spotify, and more...</div>
                </div>
                <div class="model-card">
                    <img class="" src="{{ asset('static/template_svg/text.svg') }}" alt="">
                    <div class="model-card-title">Text</div>
                    <div class="model-card-dec">Tell your page's story with a text section</div>
                </div>
                <div class="model-card">
                    <img class="" src="{{ asset('static/template_svg/instagram.svg') }}" alt="">
                    <div class="model-card-title">Instagram Scraper</div>
                    <div class="model-card-dec">Automatically import links from Instagram captions</div>
                </div>
                <div class="model-card">
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
                            <span class="input-group-text">
                            <img class="" src="{{ asset('static/template_svg/download.svg') }}" alt="">
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
                           <option value="HEAD_SHAKE">Shake</option>
                           <option value="TADA">Tada</option>
                           <option value="PULSE">Pulse</option>
                           <option value="JUMP">Jump</option>
                           <option value="SWING">Swing</option>
                           <option value="JELLO">Jello</option>
                           <option value="RUBBER_BAND">Rubber Band</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link Preview</label>
                        <div class="link_preview">
                            <a href="#" class="live-preview">
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


@endsection
