<div class="modal fade" id="edit{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Edit ' . $blog?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $blog->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Image -->
                    <div class="form-group">
                        <label>Image : <span style="color:rgb(199, 8, 8)">*</span></label>
                        <input class="form-control img" name="image" type="file" accept="image/*"
                            onchange="previewImage(this);">
                        <img class="img-thumbnail img-fluid" id="image-preview" src="{{ $blog->ImagePath() }}"
                            alt="{{ $blog->name }}">
                    </div>
                    <div class="form-group">
                        <label>Multiple Image : <span style="color:rgb(199, 8, 8)">*</span></label>
                        <input class="form-control img" name="images[]" type="file" accept="image/*" multiple>
                    </div>
                    <!-- End Image -->

                    <!-- Start Notes -->


                    <div class="form-group">
                        <label for="notes">Description</label>
                        <textarea type="notes" class="form-control" name="notes" rows="5" id="notes"
                            placeholder="Type Your Description">
                            {!! $blog->notes !!}
                        </textarea>
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Notes -->


                    <div class="form-group">
                        <label>Section</label>
                        <select class="form-control" name="section_id" required>
                            <option value="" disabled selected>-- Choose --</option>
                            @foreach (\App\Models\Section::active()->get() as $row)
                                <option value="{{ $row->id }}"
                                    {{ $row->id == $blog->section_id ? 'selected' : null }}>{{ $row->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">Status</label>
                        <select name="status" class="p-1 form-control">
                            <option selected disabled>Select <span class="text-primary">{{ $blog->name }}</span>
                                Status...</option>
                            <option value="1" {{ old('status', $blog->status) == '1' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ old('status', $blog->status) == '0' ? 'selected' : '' }}>
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
