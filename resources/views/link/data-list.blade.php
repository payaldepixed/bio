<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th class="sorting @if(request()->get('sort_by') == 'name')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="name" style="cursor: pointer">Name</th>
                <th class="sorting @if(request()->get('sort_by') == 'created_at')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="created_at" style="cursor: pointer">Created</th>
                <th class="sorting @if(request()->get('sort_by') == 'is_active')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="is_active" style="cursor: pointer">Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="min-height: 500px;">
            @if(@count(@$links) > 0)
                @foreach($links as $link)
                    <tr>
                        <td width="15%"><a href="{{route('page', ['id'=>$link->id])}}" class="text-reset" tabindex="-1">{{$link->name}}</a></td>
                        <td width="20%">{{$link->created_at}}</td>
                        <td width="15%">
                            @if($link->is_active == 1)
                            <span class="badge bg-success me-1"></span> Yes
                            @else
                            <span class="badge bg-danger me-1"></span> No
                            @endif
                        </td>
                        <td width="10%">
                            <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                    data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{route('page', ['id'=>$link->id])}}">
                                        Edit
                                    </a>
                                    <a class="dropdown-item deleteModal" href="#" data-url="{{route('link.remove',['id'=>$link->id])}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        @if($link->is_active == 1) Inactive @else Active @endif
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
    {!! $links->links('pagination') !!}
</div>
