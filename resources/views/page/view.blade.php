<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('meta')
    <!-- SEO -->
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
        - {{ config('app.name') }}
        @endif
    </title>

    @yield('css_before')
    <!-- CSS -->
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @yield('css_after')
</head>

<body class="antialiased">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-fluid">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-3">
                            <img id="image" height="100" width="100" @if(!@Auth::user()->profile_picture) style="background-color:black; color:white;" @endif src="{{@Auth::user()->profile_picture ? Storage::disk(Config::get('constants.DISK'))->url(Auth::user()->profile_picture) : ''}}" alt="{{@Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            {{'@'.@Auth::user()->username}}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            {{Auth::user()->bio}}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row g-2 align-items-center mb-n3">
                            @foreach($socials as $social)
                                @if($value = Commonhelper::getSocial($social))
                                        @if($social == 'facebook')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="{{$value}}" target="_blank" class="btn btn-facebook w-100 btn-icon" aria-label="Facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path></svg>
                                            </a>
                                        </div>
                                        @endif
                                        @if($social == 'instagram')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="{{$value}}" target="_blank" class="btn btn-instagram w-100 btn-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle><line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line></svg>
                                            </a>
                                        </div>
                                        @endif
                                        @if($social == 'twitter')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="{{$value}}" target="_blank" class="btn btn-twitter w-100 btn-icon" aria-label="Facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
                                            </a>
                                        </div>
                                        @endif
                                        @if($social == 'email')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="mailto:{{$value}}" target="_blank" class="btn btn-tabler w-100 btn-icon" aria-label="Facebook">
                                                <svg class="_3KpvHF_5T23c8sDCV9LEfx jaCGGbEXqG59KOa9TYXLY" width="20" height="20" style="fill: rgb(0, 0, 0);" data-links-category="social" data-links-identifier="5e70f070d4fb9201d6dadcf8" data-links-user="5e57392c534518368ba9135d" data-links-url="mailto:email@bothello.io" data-google-action="click" data-google-category="social-link-click" data-google-label="bothello-5e57392c534518368ba9135d" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 24 24" xml:space="preserve"><path d="M20,3H4C2.3,3,1,4.3,1,6v12c0,1.7,1.3,3,3,3h16c1.7,0,3-1.3,3-3V6C23,4.3,21.7,3,20,3z M4,5h16c0.4,0,0.7,0.2,0.9,0.6
                                                    L12,11.8L3.1,5.6C3.3,5.2,3.6,5,4,5z M20,19H4c-0.6,0-1-0.4-1-1V7.9l8.4,5.9c0.2,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2L21,7.9V18
                                                    C21,18.6,20.6,19,20,19z"></path></svg>                                            </a>
                                        </div>
                                        @endif
                                        @if($social == 'linkedin')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="{{$value}}" target="_blank" class="btn btn-tabler w-100 btn-icon" aria-label="Facebook">
                                                <svg class="_3KpvHF_5T23c8sDCV9LEfx jaCGGbEXqG59KOa9TYXLY" width="20" height="20" style="fill: rgb(0, 0, 0);" data-links-category="social" data-links-identifier="5e70f070d4fb9201d6dadcfa" data-links-user="5e57392c534518368ba9135d" data-links-url="https://www.linkedin.com/company/bothello" data-google-action="click" data-google-category="social-link-click" data-google-label="bothello-5e57392c534518368ba9135d" role="img" viewBox="0 0 24 24"><title>LinkedIn icon</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path></svg>                                            </a>
                                        </div>
                                        @endif
                                        @if($social == 'youtube')
                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                            <a href="{{$value}}" target="_blank" class="btn btn-youtube w-100 btn-icon" aria-label="Facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="4"></rect><path d="M10 9l5 3l-5 3z"></path></svg>
                                            </a>
                                        </div>
                                        @endif
                                @endif
                            @endforeach
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
