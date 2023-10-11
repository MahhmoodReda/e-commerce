<!-- Create  Modal -->
<div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="AddBrandModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddBrandModal">Add Brand</h5>
            </div>
            <form wire:submit.prevent='storeBrand'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" wire:model.defer='name' class="form-control" placeholder="Brand name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Brand slug</label>
                        <input type="text" wire:model.defer='slug' class="form-control" placeholder="Brand slug">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Update  Modal -->
<div wire:ignore.self class="modal fade" id="UpdateBrandModal" tabindex="-1" role="dialog"
    aria-labelledby="UpdateBrandModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateBrandModal">Edit Brand</h5>
            </div>
            <form wire:submit.prevent='updateBrand'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" wire:model.defer='name' class="form-control" placeholder="Brand name">
                        @error('name')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">slug</label>
                        <input type="text" class="form-control" wire:model.defer='slug' placeholder="Brand slug">
                        @error('slug')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Delete  Modal -->
<div wire:ignore.self class="modal fade" id="DeleteBrandModal" tabindex="-1" role="dialog"
    aria-labelledby="DeleteBrandModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteBrandModal">Delete Brand</h5>
            </div>
            <form wire:submit.prevent='destroyBrand'>
                <div class="modal-body">
                    Are You want to delete this brand ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
