<div class="modal fade" id="edit{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Edit ' . $gallery?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.mainGallery.update', $gallery->id) }}" method="POST">
                    @csrf
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $gallery->name }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Notes -->

                    {{--<div class="form-group">
                        <label for="name">Dsecription</label>
                        <input type="text" class="form-control" required name="note" id="note" value="{{$gallery->note}}">
                        @error('note')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>--}}
                    
                    <!-- Start Notes -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 ">
                            <div class="card" style="height: 243.2px; width:420px !important;">
                                <div class="card-header">
                                    <label for="note" class="cursor-pointer card-title">Note Description</label>
                                </div>
                                <div class="card-body center">
                                    <fieldset class="form-group">
                                        <textarea class="form-control" required name="note" id="note" rows="3">{!! $gallery->note !!}</textarea>
                                    </fieldset>
                                    @error('note')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Notes -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
