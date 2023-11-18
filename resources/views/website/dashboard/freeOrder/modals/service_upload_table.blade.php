<div class="service_media_details">
    <form action="{{ route('website.free-order.update_details', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach ($selectedServices as $service)
            <div class="order-service active" id="{{ $service->name }}-cont">
                <input type="hidden" name="service_id[]" value="{{ $service->id }}" />
                <div class="order-service-head">
                    <span>
                        <span class="head-service-title text-capitalize">{{ $service->name }}</span>
                        <span class="badge badge-light ml-2"> ${{ $service->price }}/Photo</span>
                    </span>

                    <button class="delete_btn {{ $service->name }}_delete_btn float-right selection" data-li="3"
                        data-parent="{{ $service->name }}-cont">
                        <i class="jam jam-trash mr-1"></i>
                        Delete <span>Service</span>
                    </button>
                </div>
                <div class="order-service-body p-3">
                    <div class="row service_row" data-service-name="{{ $service->name }}">
                        <div class="col-md-6 col-sm-12">
                            <div class="photos-cont main-photos-cont">
                                <input class="photo-upload-input" data-service-name="{{ $service->name }}"
                                    type="file" id="{{ $service->name }}" data-service="1"
                                    name="{{ $service->name }}_img[]" multiple required />
                                <div class="photos-bg">
                                    Drop your Photos here
                                    <div>Drag one set per time</div>
                                </div>
                                <div class="imgs_preview_container {{ $service->name }}_photos_container"></div>
                            </div>

                            <div class="photos-cont services-refs-cont">
                                <input class="photo-upload-input service_upload" id="{{ $service->name }}"
                                    type="file" data-service="1" name="{{ $service->name }}_refs_img[]" multiple />
                                <div class="photos-bg">
                                    Drop your References here (optional)
                                    <div>Drag one set per time</div>
                                </div>
                                <div class="imgs_preview_container"></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <textarea name="notes[]" id="{{ $service->name }}-ins"
                                placeholder="Describe your requests briefly and in detail only according to the selected service." required></textarea>
                            


                            <input type="hidden" name="basic_files_count" class="uploaded-photos-count" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Proccess btn-->
        <div class="submit-btn-cont my-5" style="display: block">
            <button class="btn submit-order-btn mx-auto justify-content-center">Save </button>
        </div>
</div>
<!-- proccess btn-->
</form>
</div>
