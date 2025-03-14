<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h4 class="header-title">Account List</h4>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" wire:model.live.debounce.200ms="search" />
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="table-user">
                            <img src="{{asset('assets/images/users/avatar-2.jpg')}}" alt="table-user"
                                class="me-2 rounded-circle" />
                            {{$user->name}}
                        </td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-M-y') }}</td>
                        <td>
                            <a href="{{route('admin.account.detail',Crypt::encrypt($user->id))}}" class="text-reset fs-16 px-1"> <i
                                    class="ri-settings-3-line"></i></a>
                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                    class="ri-delete-bin-2-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container">
                {{ $users->links() }}
            </div>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
</div> <!-- end card -->
