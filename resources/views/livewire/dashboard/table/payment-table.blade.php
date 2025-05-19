<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h4 class="header-title">Pending Payment List</h4>
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
                        <th>Username</th>
                        <th>Order Number</th>
                        <th>Items</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td class="table-user">
                            <img src="{{asset('assets/images/users/avatar-2.jpg')}}" alt="table-user"
                                class="me-2 rounded-circle" />
                            {{$payment->user->username}}
                        </td>
                        <td>{{ $payment->order_number }}</td>
                        <td>{{ $payment->order->first->product->name }}</td>
                        <td>{{ $payment->created_at->format('d-M-y') }}</td>
                        {{-- <td>
                            <a href="{{route('admin.account.detail',Crypt::encrypt($user->id))}}" class="text-reset fs-16 px-1"> <i
                                    class="ri-settings-3-line"></i></a>
                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                    class="ri-delete-bin-2-line"></i></a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container">
                {{ $payments->links() }}
            </div>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
</div> <!-- end card -->
