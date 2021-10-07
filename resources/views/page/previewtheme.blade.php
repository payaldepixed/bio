<div class="themeLayout">
    @foreach ($themes as $theme)
        @php
            $profileShadow = "box-shadow:#0000004d 0px 10px 30px " .$theme->profile_picture_shadow. "px";
            $bordercolor = $theme->profile_picture_border_color ? $theme->profile_picture_border_color : '#000000';
            $borderwidth = $theme->profile_picture_border.'px';
            $fontfamily = $theme->text_font.', sans-serif';
        @endphp
        {{-- {{$theme->primary_background_type}}
        {{$theme->primary_background}}
        {{$theme->secondary_background}} --}}
        <div class="item_two themepreview" data-id="{{$theme->id}}">
            <div class="preview-layout">
                <div class="checkOverlay">
                    <div class="checkIcon">
                        <img class="checkIconImg" src="{{ asset('static/template_svg/check-mark.svg') }}" alt="">
                    </div>
                </div>
                <div id="preview_size" style="font-family:{{$fontfamily}}" class="preview-details mobile_size">
                    @if($theme->primary_background_type == 'preset')
                        <div class="preset-card-layout" style="background-image: {{$theme->primary_background}};">
                    @endif
                    @if($theme->primary_background_type == 'gradient')
                    <div class="gradient-card-layout" style="background-image: linear-gradient(135deg, {{$theme->primary_background}} 10%, {{$theme->secondary_background}} 100%); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                    @endif
                    @if($theme->primary_background_type == 'color')
                        <div class="color-card-layout" style="background-color: {{$theme->primary_background}};">
                    @endif
                    @if($theme->primary_background_type == 'image')
                        <div class="image-card-layout" style="background-image: url('{{ Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background)}}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                    @endif
                    @if($theme->primary_background_type == 'video')
                    <div class="card-layout">
                        <video id="bgVideo1" autoplay muted loop class="">
                            <source src="{{Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background)}}" type="video/mp4" id="video_here1" />
                        </video>
                    @endif
                        <div class="preview-all" style="color:{{$theme->primary_text_color}}">
                            <div id="previewImg" style="box-shadow:{{$profileShadow}};border-color:{{$bordercolor}};border-width:{{$borderwidth}}" class="preview-img">
                                <img src="{{asset('static/default.png')}}" alt="">
                            </div>
                            <div id="PreviewName" class="preview-title">
                                user name
                            </div>
                            <div id="previewBio" class="preview-description">
                                decscription
                            </div>
                        </div>
                    </div>
                    <div class="themeName">
                        {{$theme->title}}
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
