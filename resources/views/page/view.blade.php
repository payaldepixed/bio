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
    <link href="https://fontawesome.com/v4.7/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @yield('css_after')
</head>

<body class="antialiased">
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-body template-layout">
                <div class="container-fluid">
                    <div class="template">
                        <div class="item_two">
                            <div class="preview-layout">
                                <div class="preview-details" style="border:0ch">
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
                                            <div class="selected-social-icon">
                                                @php $socials = Commonhelper::getSocials(); @endphp
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
        </div>
    </div>
    <!-- JS -->
    <script src="{{ asset('js/tabler.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
