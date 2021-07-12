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
    <div class="page-header d-print-none">
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
    </div>
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
                   <span class="my-page"> My Page:</span>  <a href="javascript:void(0)"  target="_blank">links.co/mox</a>
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
                                <div class="social-links">
                                    <div class="accordion" id="accordion-example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                                                Social Links
                                            </button>
                                            </h2>
                                            <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                <div class="accordion-body p-2">
                                                    <div class="social_icons_lists">
                                                        <label for="email" class="social-icon">
                                                            <input type="checkbox" id="email" class="d-none">
                                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="social-icon-name">Email</span>
                                                        </label>
                                                        <label for="newsletter" class="social-icon">
                                                            <input type="checkbox" id="newsletter" class="d-none">
                                                            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="social-icon-name">Newsletter</span>
                                                        </label>
                                                        <label for="phone" class="social-icon">
                                                            <input type="checkbox" id="phone" class="d-none">
                                                            <i class="fa fa-phone" aria-hidden="true"></i> <span class="social-icon-name">Phone</span>
                                                        </label>
                                                        <label for="website" class="social-icon">
                                                            <input type="checkbox" id="website" class="d-none">
                                                            <i class="fa fa-desktop" aria-hidden="true"></i> <span class="social-icon-name">Website</span>
                                                        </label>
                                                        <label for="apple-music" class="social-icon">
                                                            <input type="checkbox" id="apple-music" class="d-none">
                                                            <i class="fa fa-music" aria-hidden="true"></i> <span class="social-icon-name">Apple Music</span>
                                                        </label>
                                                        <label for="apple-podcast" class="social-icon">
                                                            <input type="checkbox" id="apple-podcast" class="d-none">
                                                            <i class="fa fa-music" aria-hidden="true"></i> <span class="social-icon-name">Apple Podcast</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-home-7" class="nav-link active" data-bs-toggle="tab">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab">Profile</a>
                    </li>
                    </ul>
                    <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-7">
                        <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies fringilla at sed facilisis lacus pellentesque purus nibh</div>
                        </div>
                        <div class="tab-pane" id="tabs-profile-7">
                        <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
