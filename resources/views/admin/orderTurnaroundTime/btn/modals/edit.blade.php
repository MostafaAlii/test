<div class="modal fade" id="edit{{ $orderServiceTime->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Edit ' . $orderServiceTime?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orderServiceTime.update', $orderServiceTime->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $orderServiceTime->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <input type="text" class="form-control" name="notes" id="notes"
                            value="{{ $orderServiceTime->notes }}">
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Notes -->

                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="number" class="form-control" required name="price" id="price"
                            value="{{ $orderServiceTime->price }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">Status</label>
                        <select name="status" class="p-1 form-control">
                            <option selected disabled>Select <span
                                    class="text-primary">{{ $orderServiceTime->name }}</span>
                                Status...</option>
                            <option value="1"
                                {{ old('status', $orderServiceTime->status) == '1' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0"
                                {{ old('status', $orderServiceTime->status) == '0' ? 'selected' : '' }}>
                                Not Active
                            </option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Status Selected -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
