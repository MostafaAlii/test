@if ($blog->imagesByType(Image::GALLERY_TYPE)->count() > 0)
    <button type="button" class="modal-effect btn btn-sm btn-success" style="text-align: center !important"
        data-toggle="modal" data-target="#gallery{{ $blog->id }}" data-effect="effect-scale">
        <span class="icon text-wight text-bold">
            {{ $blog->gallary->count() }}
        </span>
    </button>
@else
    <span class="icon text-wight text-bold text-danger">
        No Madia
    </span>
@endif

<!------------------------>

<div class="modal fade" id="gallery{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Gallery ' . $blog?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-auto">
                <div class="row">
                    @foreach ($blog->GallaryPath() as $image)
                        <div class="col-md-4 mb-3">
                            <div class="image-container">
                                <img src="{{ $image }}" class="rounded p-1" width="100px" height="100px"
                                    alt="{{ $blog->name }}" />
                            </div>
                        </div>
                        @if ($loop->iteration % 4 == 0)
                </div>
                <div class="row">
                    @endif
                    @endforeach
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
