@extends('layouts.auth')

@section('content')
<div class="header">
    <div class="container">
        <div class="header-details">
            <div class="header-logo text-center">
                <a href="."><img src="{{ asset('img/logo.png') }}" alt="Bio"></a>
            </div>
            <div class="header-menu text-center text-muted d-sm-none">
                <a href="{{ route('login') }}" class="btn btn-style text-black w-100 gradient-color-left"> Sign In</a>
            </div>
        </div>
    </div>
</div>

<div class="home-page">
    <div class="container">
        <section class="section_one pt-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bio-content">
                        <h1 class="">Multiple Links for your Link in Bio</h1>
                        <h6 class="mb-5">Supercharge your Link in Bio on Instagram, TikTok, YouTube ...</h6>
                        <div class="bio-main-btn w-100 ">
                            <div class="row">
                                <div class="col pr-2">
                                    <a href="{{ route('login') }}" class="btn btn-style text-black w-100 gradient-color-left"> Sign In</a>
                                </div>
                                <div class="col pl-2">
                                    <a href="{{ route('register') }}" class="btn btn-style text-black w-100 gradient-color-right"> Sign Up</a>
                                </div>
                            </div>
                        </div>
                        <div class="bio-main-btn d-block mt-5">
                            <a href="javascript:void(0);" class="btn btn-style text-black w-100 gradient-color">
                                Agency or Multi-Account?</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="intro-mockup">
                            <img src="{{ asset('img/home/main.png') }}" alt="" class="img-one ">
                    </div>
                </div>
            </div>
        </section>



        <section class="section_two">
            <div class="row">
                <div class="col-lg-6">
                    <div class="intro-mockup">
                        <div class="video-parent">
                            <video class="" key="{{ asset('img/videos/link_to_anywhere.mp4') }}" playsinline="" autoplay="" muted="" loop="">
                                <source src="{{ asset('img/videos/link_to_anywhere.mp4') }}">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-tow-content">
                        <h1 class="">Use it anywhere</h1>
                        <h6 class="mb-5">Take your Bio wherever your audience<br> is, to help them to discover all your<br> important content.</h6>
                    </div>
                </div>
            </div>
        </section>

            <section class="section_one">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bio-content">
                            <h1 class="">Sit and watch your social media traffic increase</h1>
                            <h6 class="mb-5">Built to drive traffic on mobile and give Instagram followers a clear call to action share links, making it easier for them to discover more about your posts or buy your products. Click stats are available for each Bio Link.</h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="intro-mockup">
                                <img src="{{ asset('img/home/analytics.webp') }}" alt="" class="img-one ">
                        </div>
                    </div>
                </div>
            </section>


            <section class="section_two">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="intro-mockup">
                            <div class="video-parent">
                                <video class="" key="{{ asset('img/videos/security.mp4') }}" playsinline="" autoplay="" muted="" loop="">
                                    <source src="{{ asset('img/videos/security.mp4') }}">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-tow-content">
                            <h1 class="">Safe, trusted, private</h1>
                            <h6 class="mb-5">Privacy is non-negotiable. Bio doesn’t<br> track any personal data on your visitors, so<br> your Bio remains your place on the internet.</h6>
                        </div>
                    </div>
                </div>
            </section>

        <section class="section_three">
            <div class="text-center">
				<div class="third-section">
					<h2 class="text-uppercase ">Are you an Agency or Agent?</h2>
					<h6 class="text-black">You can manage all your Influencers' link from a single control panel.</h6>
					<div class="price-btn mt-4">
						<a href="javascript:void(0);" class="btn btn-style text-black gradient-color">Multi-account signup</a>
					</div>
				</div>
			</div>
        </section>

    </div>
</div>


@endsection
