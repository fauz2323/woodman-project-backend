<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" id="example-input1-group2" wire:model.live.debounce.200ms='search'
                            name="example-input1-group2" class="form-control" placeholder="Search">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary rounded-start-0"><i
                                    class="ri-search-line fs-16"></i></button>
                            <button type="button" wire:click='add' class="btn btn-success rounded-start-0"><i
                                    class="ri-folder-add-line fs-16"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex">
                                <a class="me-3" href="#">
                                    <img class="avatar-md rounded-circle bx-s"
                                        src="{{ url('storage/' . $product->images->first()->path) }}" alt="">
                                </a>
                                <div class="info">
                                    <h5 class="fs-18 my-1">{{ $product->name }}</h5>
                                    <p class="text-muted fs-15">{{ $product->description }}</p>
                                    <p class="text-muted fs-15 pt-3">Rp. {{ $product->price }}</p>
                                </div>
                            </div>
                            <div class="">
                                <button type="button" wire:click="edit('{{Crypt::encrypt($product->id)}}')" class="btn btn-success btn-sm me-1 tooltips">
                                    <i class="ri-pencil-fill"></i>
                                </button>
                                <button type="button" wire:click="deleteData('{{ Crypt::encrypt($product->id) }}')"
                                    class="btn btn-danger btn-sm tooltips">
                                    <i class="ri-close-fill"></i>
                                </button>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex">
                                {{ $product->created_at->diffForHumans() }}
                            </div>
                        </div>

                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->
            </div> <!-- end col -->
        @endforeach
    </div> <!-- End row -->
</div>
