<div>
    {{-- include modal form --}}
    @include('livewire.admin.brands.model-form')

    {{-- include session messages --}}
    @include('sessions.success')
    @include('sessions.error')

    {{-- Modal crete button --}}
    <button class="mt-2 btn btn-primary mt-xl-0" type="button" data-bs-toggle="modal" data-bs-target="#AddBrandModal">
        Add Brand
    </button>
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Brands
                    </h2>
                </div>
                <div class="crad-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->status == '1' ? 'hidden' : 'visible'  }}</td>
                                        <td>
                                            <div class="btn-toolbar">
                                                {{-- Modal edit button --}}
                                                <button wire:click='editBrand({{ $brand->id }})' class="btn btn-success" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#UpdateBrandModal">Edit</button>
                                                {{-- Modal delete button --}}
                                                <button type="button"  data-bs-toggle="modal"
                                                data-bs-target="#DeleteBrandModal" class="btn btn-danger"
                                                wire:click='deleteBrand({{ $brand->id }})'>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        {{ $brands->links() }}
    </div>
</div>
    {{-- close the modal after submition --}}
@push('script')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('close-modal', (event) => {
                $('#AddBrandModal').modal('hide');
                $('#UpdateBrandModal').modal('hide');
                $('#DeleteBrandModal').modal('hide');
            });
        });
    </script>
@endpush
