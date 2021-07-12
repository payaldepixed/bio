<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th class="sorting @if(request()->get('sort_by') == 'name')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="name" style="cursor: pointer">Name</th>
                <th class="sorting @if(request()->get('sort_by') == 'username')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="username" style="cursor: pointer">Username</th>
                <th class="sorting @if(request()->get('sort_by') == 'email')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="email" style="cursor: pointer">Email</th>
                <th class="sorting @if(request()->get('sort_by') == 'created_at')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="created_at" style="cursor: pointer">Created</th>
                <th class="sorting @if(request()->get('sort_by') == 'is_block')@if(request()->get('sort_type') == 'asc') tbl_asc @else tbl_desc @endif @endif" data-sorting_type="{{request()->get('sort_type') ? request()->get('sort_type') : 'desc'}}" data-column_name="is_block" style="cursor: pointer">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="min-height: 500px;">
            @if(@count(@$users) > 0)
                @foreach($users as $user)
                    <tr>
                        <td width="15%"><a href="{{route('user.edit', ['id'=>$user->id])}}" class="text-reset" tabindex="-1">{{$user->name}}</a></td>
                        <td width="15%">{{$user->username}}</td>
                        <td width="20%">{{$user->email}}</td>
                        <td width="20%">{{$user->created_at}}</td>
                        <td width="15%">
                            @if($user->is_block == 1)
                            <span class="badge bg-danger me-1"></span> Blocked
                            @else
                            <span class="badge bg-success me-1"></span> Unblocked
                            @endif
                        </td>
                        <td width="10%">
                            <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                    data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{route('user.edit', ['id'=>$user->id])}}">
                                        Edit
                                    </a>
                                    <a class="dropdown-item passwordModal" href="#" data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                        Change Password
                                    </a>
                                    <a class="dropdown-item blockModal" href="#" data-url="{{route('user.block',['id'=>$user->id])}}" data-bs-toggle="modal" data-bs-target="#blockModal">
                                        @if($user->is_block == 1) Unblock @else Block @endif
                                    </a>
                                    <a class="dropdown-item deleteModal" href="#" data-url="{{route('user.delete',['id'=>$user->id])}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
    {!! $users->links('pagination') !!}
</div>
