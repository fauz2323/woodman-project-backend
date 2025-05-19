<div>
    <div class="row">
        <div class="col-12">
            <div class="row mb-3 text-center">
                @if ($isEdited)
                    <div class="row justify-content-center text-center mt-5">
                        @foreach ($listImages as $item)
                            <div class="col">
                                <img src="{{ $item }}" class="rounded mx-auto d-block" style="width: 300px"
                                alt="...">
                            <small>*Image {{ $loop->iteration }}</small>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Product Form</h4>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                @endif


                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model="name" placeholder="Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label">Price</label>
                                <input type="text" class="form-control" wire:model="price" placeholder="Price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">Description</label>
                            <input type="text" class="form-control" wire:model="description"
                                placeholder="Description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputAddress2" class="form-label">Dimension</label>
                                <input type="text" class="form-control" wire:model="dimension"
                                    placeholder="Dimension">
                                @error('dimension')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputAddress2" class="form-label">Stock</label>
                                <input type="text" class="form-control" wire:model="stock" placeholder="Stock">
                                @error('stock')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputCity" class="form-label">Height</label>
                                <input type="text" class="form-control" wire:model="height">
                                @error('height')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputCity" class="form-label">Weight</label>
                                <input type="text" class="form-control" wire:model="weight">
                                @error('weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputAddress2" class="form-label">Material</label>
                            <input type="text" class="form-control" wire:model="material" placeholder="Material">
                            @error('material')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Image File</label>

                            @foreach ($images as $image => $value)
                                <div class="input-group mb-3">
                                    <input type="file" id="example-fileinput" class="form-control"
                                        wire:model="images.{{ $image }}.image">
                                    @error('images.' . $image . '.image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                            <small class="text-danger">*if not change image don't upload new image</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>
