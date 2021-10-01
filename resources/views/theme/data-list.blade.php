<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th class="sorting @if(request()->get('sort_by') == 'title')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="title" style="cursor: pointer">Title</th>
                <th class="sorting @if(request()->get('sort_by') == 'created_at')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="created_at" style="cursor: pointer">Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="min-height: 500px;">
            @if(@count(@$themes) > 0)
                @foreach($themes as $theme)
                    <tr>
                        <td width="15%"><a href="{{route('theme.edit', ['id'=>$theme->id])}}" class="text-reset" tabindex="-1">{{$theme->title}}</a></td>
                        <td width="20%">{{$theme->created_at}}</td>
                        <td width="10%">
                            <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                    data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{route('theme.edit', ['id'=>$theme->id])}}">
                                        Edit
                                    </a>
                                    <a class="dropdown-item deleteModal" href="#" data-url="{{route('theme.remove',['id'=>$theme->id])}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        Delete
                                    </a>
                                </div>
                            </span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="card-footer d-flex align-items-center">
    {!! $themes->links('pagination') !!}
</div>
