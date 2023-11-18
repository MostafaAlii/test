<div class="modal fade" id="edit{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{'Edit '. $slider?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sliders.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$slider->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Image -->
                    <div class="form-group">
                        <label>Image : <span style="color:rgb(199, 8, 8)">*</span></label>
                        <input class="form-control img" name="image" type="file" accept="image/*" onchange="previewImage(this);">
                        <img class="img-thumbnail img-fluid" id="image-preview" src="{{$slider->ImagePath()}}" alt="{{$slider->name}}">
                        
                    </div>
                    <!-- End Image -->

                    <!-- Start Notes -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 ">
                            <div class="card" style="height: 243.2px; width:420px !important;">
                                <div class="card-header">
                                    <label for="notes" class="cursor-pointer card-title">Notes Description</label>
                                </div>
                                <div class="card-body center">
                                    <fieldset class="form-group">
                                        <textarea class="form-control" id="notes" rows="3">{!! $slider->notes !!}</textarea>
                                    </fieldset>
                                    @error('notes')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Notes -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">Status</label>
                        <select name="status" class="p-1 form-control">
                            <option selected disabled>Select <span class="text-primary">{{$slider->name}}</span>
                                Status...</option>
                            <option value="1" {{ (old('status', $slider->status) == '1') ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ (old('status', $slider->status) == '0') ? 'selected' : '' }}>
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