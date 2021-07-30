<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('meta')
    <!-- SEO -->
    <title>
        {{'@'.$user->username}} | {{ config('app.name') }}
    </title>

    @yield('css_before')
    <!-- CSS -->
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    {{-- <link href="https://fontawesome.com/v4.7/assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @yield('css_after')
</head>

<body class="antialiased viewLayout">
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="template-layout">
                <div class="container-fluid p-0">
                    <div class="template">
                        <div class="item_two p-0">
                            <div class="preview-layout">
                                <div class="preview-details">
                                    <div class="card-layout">
                                        <input type="hidden" name="primary_text_color" value="{{@$design->primary_text_color}}">
                                        <input type="hidden" name="primary_background" value="{{@$design->primary_background}}">
                                        <input type="hidden" name="profile_picture_shadow" value="{{@$design->profile_picture_shadow}}">
                                        <input type="hidden" name="profile_picture_border" value="{{@$design->profile_picture_border}}">
                                        <input type="hidden" name="profile_picture_border_color" value="{{@$design->profile_picture_border_color}}">
                                        <input type="hidden" name="card_shadow" value="{{@$design->card_shadow}}">
                                        <input type="hidden" name="card_spacing" value="{{@$design->card_spacing}}">
                                        <input type="hidden" name="text_font" value="{{@$design->text_font}}">
                                        <input type="hidden" name="button_color" value="{{@$design->button_color}}">
                                        <input type="hidden" name="button_text_color" value="{{@$design->button_text_color}}">
                                        <input type="hidden" name="button_corner" value="{{@$design->button_corner}}">
                                        <input type="hidden" name="button_border" value="{{@$design->button_border}}">
                                        <input type="hidden" name="button_border_color" value="{{@$design->button_border_color}}">
                                        <div class="preview-all">
                                            <div class="share_vcard_icons">
                                                <div class="preview_share" @if(@$design->enable_share_button == 1) @else style="display:none;" @endif>
                                                    <img class="upper_icon" src="{{ asset('static/template_svg/share.svg') }}" alt="">
                                                </div>
                                                <div class="preview_vcard" @if(@$design->enable_vcard == 1) @else style="display:none;" @endif>
                                                    <img class="upper_icon" src="{{ asset('static/template_svg/v_card.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="preview-img">
                                                <img src="{{@$user->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url($user->profile_picture) : asset('/static/default_user.png')}}" alt="">
                                            </div>
                                            <div class="preview-title">
                                                {{'@'.@$user->username}}
                                            </div>
                                            <div class="preview-description">
                                                {!! $user->bio !!}
                                            </div>
                                            <div class="selected-social-icon">
                                                @php $socials = Commonhelper::getSocials(); @endphp
                                                @foreach($socials as $social)
                                                    <a @if(!$value = Commonhelper::getSocial($social)) style="display:none;" @endif id="social_link_{{$social}}" href="@if($social == 'email')mailto:@endif{{strpos($value, 'http') === false ? 'https://' . $value : $value}}" target="_blank"><img class="selected-icon" src="{{ asset('static/template_svg/'.$social.'.svg') }}" alt=""></a>
                                                @endforeach
                                            </div>
                                            <div class="preview-card" id="preview-blocks">
                                            </div>
                                        </div>
                                        <div @if(@$design->hide_link_binding == 1) style="display:none;" @endif class="footer-text">
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
        </div>
    </div>
    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/pages/page.js') }}"></script>
    <script src="{{ asset('js/tabler.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
