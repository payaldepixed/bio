@if(@count(@$blocks) > 0)
    @foreach($blocks as $block)
        @if($block->type == 'link')
            @if($block->layout == 1)
                <div class="link_preview normal link_preview_click" data-id="{{$block->id}}">
                    <div class="preview-card-body card-style">
                        <div class="main-title">{{@$block->title ? $block->title : @Auth::user()->name}}</div>
                        <div class="subtitle-title">{!! @$block->description !!}</div>
                    </div>
                </div>
            @endif
            @if($block->layout == 2)
                <div class="link_preview thumbnail-basic link_preview_click" data-id="{{$block->id}}">
                    <a href="{{@$block->url ? '//'.$block->url : '#' }}" target="_blank" class="live-preview thumbnail-view">
                        <div class="thumbnail-img">
                            <img class="" src="{{@$block->medias[0]->media_file ? $block->medias[0]->media_file : asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                {{@$block->title ? $block->title : @Auth::user()->name}}
                            </div>
                            <div class="dec">
                                {!! @$block->description !!}
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($block->layout == 3)
                <div class="link_preview button-image-background link_preview_click" data-id="{{$block->id}}">
                    <a href="{{@$block->url ? '//'.$block->url : '#' }}" target="_blank" class="live-preview image-background-view animate__animated animate__pulse">
                        <div class="details" style="background-image: url('{{@$block->medias[0]->media_file ? $block->medias[0]->media_file : asset('static/template_svg/new-link/img/empty-state.jpg') }}')">
                            <div class="title">
                                {{@$block->title ? $block->title : @Auth::user()->name}}
                            </div>
                            <div class="dec">
                                {!! @$block->description !!}
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($block->layout == 4)
                <div class="link_preview thumbnail-highlight link_preview_click" data-id="{{$block->id}}">
                    <a href="{{@$block->url ? '//'.$block->url : '#' }}" target="_blank" class="live-preview thumbnail-highlight-view">
                        <div class="thumbnail-highlight-img">
                            <img class="" src="{{@$block->medias[0]->media_file ? $block->medias[0]->media_file : asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                {{@$block->title ? $block->title : @Auth::user()->name}}
                            </div>
                            <div class="dec">
                                {!! @$block->description !!}
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if($block->layout == 5)
                <div class="link_preview thumbnail-grid link_preview_click" data-id="{{$block->id}}">
                    <div class="live-preview grid-{{$block->grid_size}} thumbnail-grid-view">
                        @for ($i = 1; $i <= $block->grid_size ; $i++)
                            <a href="#" class="">
                                <div class="thumbnail-grid-img">
                                    <img src="{{@$block->medias[$i-1]->media_file ? $block->medias[$i-1]->media_file : asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>
            @endif
            @if($block->layout == 6)
                <div class="link_preview thumbnail-carousel link_preview_click" data-id="{{$block->id}}">
                    <div class="live-preview thumbnail-carousel-view">
                        @for ($i = 1; $i <= 3 ; $i++)
                            <a href="{{@$block->url ? '//'.$block->url : '#' }}" target="_blank">
                                <div class="thumbnail-carousel-img">
                                    <img src="{{@$block->medias[$i-1]->media_file ? $block->medias[$i-1]->media_file : asset('static/template_svg/new-link/img/empty-state.jpg') }}" alt="">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        {{@$block->title ? $block->title : @Auth::user()->name}}
                                    </div>
                                    <div class="dec">
                                        {!! @$block->description !!}
                                    </div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>
            @endif
        @endif
        @if($block->type == 'media')
        <div class="embded_url mb-2 link_preview_click" data-id="{{$block->id}}">
            @php $videoUrl = ''; if($block->url)$videoUrl = preg_replace('/<code\b[^>]*>.*?<\/code>(*SKIP)(*F)|<a.*?<\/a>(*SKIP)(*F)|\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)|\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)(\?[a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', "https://www.youtube.com/embed/$1$3", $block->url); @endphp
            <iframe style="border-radius: 10px;" width="100%" height="250" src="{{$videoUrl}}" frameborder="0" allow="" allowfullscreen=""></iframe>
        </div>
        @endif
        @if(in_array($block->type,['divider','text']))
            <div class="link_preview normal link_preview_click" data-id="{{$block->id}}">
                <div class="preview-card-body card-style">
                    <div class="main-title">{{@$block->title ? $block->title : @Auth::user()->name}}</div>
                    <div class="subtitle-title">{!! @$block->description !!}</div>
                </div>
            </div>
        @endif
    @endforeach
@endif

