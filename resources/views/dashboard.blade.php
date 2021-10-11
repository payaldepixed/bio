@extends('layouts.app')

@section('title')
Home
@endsection

@section('css_before')
@endsection

@section('css_after')
<link rel="stylesheet" media="all" href="{{ asset('js/jquery-jvectormap-2.0.5.css') }}"/>
@endsection

@section('js_after')
<script src="{{ asset('js/pages/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('js/pages/user.js') }}"></script>
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
                    Dashboard
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Links</div>
                        <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted totallinktext" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item totallink active" data-id="7" href="javascript:void(0);">Last 7 days</a>
                                <a class="dropdown-item totallink" data-id="30" href="javascript:void(0);">Last 30 days</a>
                                <a class="dropdown-item totallink" data-id="90" href="javascript:void(0);">Last 3 months</a>
                                <a class="dropdown-item totallink" data-id="365" href="javascript:void(0);">In Year</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-3 me-2" id="totallinks">{{Commonhelper::totalLinks(7)}}</div>
                        {{-- <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                        </div> --}}
                    </div>
                    <div id="chart-active-users" class="chart-sm"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="subheader">Link Views</div>
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                        <a class="dropdown-toggle text-muted linkviewtext" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item linkview active" data-id="7" href="javascript:void(0);">Last 7 days</a>
                            <a class="dropdown-item linkview" data-id="30" href="javascript:void(0);">Last 30 days</a>
                            <a class="dropdown-item linkview" data-id="90" href="javascript:void(0);">Last 3 months</a>
                            <a class="dropdown-item linkview" data-id="365" href="javascript:void(0);">In Year</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2" id="linkviews">{{Commonhelper::getRecentActivity('link',7)}}</div>
                    {{-- <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                        4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                    </div> --}}
                    </div>
                    <div id="chart-active-users" class="chart-sm"></div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Clicks</div>
                            <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted totalclicktext" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item totalclick active" data-id="7" href="javascript:void(0);">Last 7 days</a>
                                    <a class="dropdown-item totalclick" data-id="30" href="javascript:void(0);">Last 30 days</a>
                                    <a class="dropdown-item totalclick" data-id="90" href="javascript:void(0);">Last 3 months</a>
                                    <a class="dropdown-item totalclick" data-id="365" href="javascript:void(0);">In Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-3 me-2" id="totalclicks">{{Commonhelper::getRecentActivity('block',7)}}</div>
                    </div>
                    <div id="chart-active-users" class="chart-sm"></div>
                </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row row-deck row-cards">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted chartmaptext" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item chartmap active" data-id="7" href="javascript:void(0);">Last 7 days</a>
                                    <a class="dropdown-item chartmap" data-id="30" href="javascript:void(0);">Last 30 days</a>
                                    <a class="dropdown-item chartmap" data-id="90" href="javascript:void(0);">Last 3 months</a>
                                    <a class="dropdown-item chartmap" data-id="365" href="javascript:void(0);">In Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-baseline">
                        <div id="map1" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Most Visited Pages</h3>
                <div class="ms-auto lh-1">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-muted totalpagestext" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item totalpage active" data-id="7" href="javascript:void(0);">Last 7 days</a>
                            <a class="dropdown-item totalpage" data-id="30" href="javascript:void(0);">Last 30 days</a>
                            <a class="dropdown-item totalpage" data-id="90" href="javascript:void(0);">Last 3 months</a>
                            <a class="dropdown-item totalpage" data-id="365" href="javascript:void(0);">In Year</a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-table table-responsive">
                <table class="table table-vcenter">
                    <thead>
                    <tr>
                        <th>Page name</th>
                        <th>Visitors</th>
                    </tr>
                    </thead>
                    <tbody id="tblpages">
                    @php $links = Commonhelper::getLinkVisitors(7);  @endphp
                    @if(@$links)
                    @foreach ($links as $link)
                        <tr>
                            <td>
                                {{$link->name}}
                                <a target="_blank" href="{{route('mypage',['name'=>@$link->name])}}" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                                </a>
                            </td>
                            <td class="text-muted">{{$link->visitors}}</td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                </div>
            </div>
            </div>

      </div>
</div>
@endsection
