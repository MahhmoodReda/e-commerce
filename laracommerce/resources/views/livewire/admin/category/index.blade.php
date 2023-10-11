<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Are You Sure You Want To Delete This Category ?</h5>
                </div>
                <form wire:submit.prevent='destroyCategory'>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

        {{-- display masseges stored in sessions --}}
        @include('sessions.success')
        @include('sessions.error')
        {{-- ----------------------------------- --}}

        <div class="col-md-12 grid-margin">
            <div class="flex-wrap d-flex justify-content-between">
                <div class="flex-wrap d-flex justify-content-between align-items-end">

                    <form action="{{ route('category.create') }}" method="get">
                        @csrf
                        <button class="mt-2 btn btn-primary mt-xl-0" type="submit">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-header">
            <h2 >Categories</h2>

            <div class="card">
                <div class="card-body">
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
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status == '1' ? 'hidden' : 'visible' }}</td>
                                        <td>
                                            <div class="btn-toolbar">
                                                <form action="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                    method="get">
                                                    @csrf
                                                    <!-- Button edit modal -->
                                                    <button class="btn btn-success" type="submit">Edit</button>
                                                </form>
                                                <!-- Button delete modal -->
                                                <button type="button" wire:click='deleteCategory({{ $category->id }})'
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteModal">
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
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@push('script')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('close-modal', (event) => {
                $('#DeleteModal').modal('hide');
            });
        });
    </script>
@endpush
