@if(@count(@$blocks) > 0)
    @foreach($blocks as $block)
        <div class="block-details" id="{{$block->id}}">
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
                    <div class="block-card-details editBlock" data-id="{{$block->id}}" data-type="{{$block->type}}">
                        <div class="block-title">
                            <img class="" src="{{ asset('static/template_svg/link.svg') }}" alt="">
                            {{@$block->title ? $block->title : ucfirst($block->type)}}
                        </div>
                        <div class="views">
                            Views: <span>{{$block->views}}</span>
                        </div>
                    </div>
                    <div class="block-card-action">
                        <div class="action-icon editBlock" data-id="{{$block->id}}" data-type="{{$block->type}}">
                            <img class="" src="{{ asset('static/template_svg/edit.svg') }}" alt="">
                        </div>
                        <div class="action-icon copyBlock" data-id="{{$block->id}}">
                            <img class="" src="{{ asset('static/template_svg/copy.svg') }}" alt="">
                        </div>
                        <div class="action-icon deleteBlock" data-id="{{$block->id}}" data-bs-toggle="modal" data-bs-target="#modal-danger">
                            <img class="" src="{{ asset('static/template_svg/delete_red.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="block-details">
        <div class="plus-icon" data-bs-toggle="modal" data-bs-target="#modal-large">
            <div class="plus">
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </div>
        </div>
    </div>
@endif

