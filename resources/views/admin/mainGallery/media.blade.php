@extends('admin.admin_master')

@section('pageTitle')
    Gallery Media
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="content-header row">
        <div class="mb-2 content-header-left col-md-6 col-12">
            <h3 class="content-header-title">
                <i class="material-icons">settings</i>
                Gallery Media
            </h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.mainGallery') }}">Gallery Media</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <div class="content-wrapper">
        <div class="content-body">
            <div id="page-account-settings">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    @include('admin.messages')
                                    <form class="form form-horizontal"
                                        action="{{ route('admin.mainGallery.images.store.db') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="gallery_id" value="{{$id}}">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                    <div class="dz-message">Upload Media Here</div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> Back
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                    @php
                                        $images = \App\Models\GalleryImage::where('gallery_id', $id)->get(['photo','id', 'gallery_id']);
                                    @endphp
                                </div>
                                </br>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Media</p>
                                        </div>
                                    </div>
                                    <div class="card-body  my-gallery" itemscope="" itemtype="http://schema.org/ImageGallery"  data-pswp-uid="1">
                                        <div class="row">
                                            @isset($images)
                                                @forelse($images as $image)
                                                    <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope=""
                                                            itemtype="http://schema.org/ImageObject">
                                                        <a href="{{asset('dashboard/img/gallery/' . $image->photo)}}" itemprop="contentUrl" data-size="480x360">
                                                            <img class="img-thumbnail img-fluid"
                                                                src="{{asset('dashboard/img/gallery/' . $image->photo)}}"
                                                                itemprop="thumbnail" alt="Image description">
                                                        </a>
                                                        <form method="POST" action="{{ route('admin.gallery.image.destroy', ['gallery_id' => $id, 'image_id' => $image->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </figure>
                                                @empty
                                                    No Gallery Media Found
                                                @endforelse
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.dpzMultipleFiles = {
            paramName: "dzfile", // The name that will be used to transfer the file
            //autoProcessQueue: false,
            maxFilesize: 10240, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: "your browser not support drag and drop",
            dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
            dictCancelUpload: " Cancel Upload ",
            dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
            dictRemoveFile: "Delete",
            dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }

            ,
            url: "{{ route('admin.mainGallery.images.store') }}", // Set the url
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            init: function() {

                @if (isset($event) && $event->document)
                    var files =
                        {!! json_encode($event->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endsection
