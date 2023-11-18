{{--<div class="modal fade" id="edit{{ $button->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Edit ' . $button?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('button.update', $button->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $button?->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Notes -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="type">Type</label>
                        <select name="type" class="p-1 form-control">
                            <option selected disabled>Select <span class="text-primary">{{ $button->name }}</span>
                                Type...</option>
                            <option value="header" {{ old('type', $button->type) == 'header' ? 'selected' : '' }}>
                                header
                            </option>
                            <option value="service" {{ old('type', $button->type) == 'service' ? 'selected' : '' }}>
                                service
                            </option>
                            <option value="payment" {{ old('type', $button->type) == 'payment' ? 'selected' : '' }}>
                                payment
                            </option>
                        </select>
                        @error('type')
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
</div>--}}


<div class="modal fade" id="edit{{ $button->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Edit ' . $button?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('button.update', $button->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $button?->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Notes -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="type">Type</label>
                        <select name="type" class="p-1 form-control">
                            <option selected disabled>Select <span class="text-primary">{{ $button->name }}</span>
                                Type...</option>
                            <option value="header" {{ old('type', $button->type) == 'header' ? 'selected' : '' }}>
                                header
                            </option>
                            <option value="service" {{ old('type', $button->type) == 'service' ? 'selected' : '' }}>
                                service
                            </option>
                            <option value="payment" {{ old('type', $button->type) == 'payment' ? 'selected' : '' }}>
                                payment
                            </option>
                        </select>
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Status Selected -->

                    <!-- Start Url -->
                    @if($button->type == 'header' || $button->type == 'service')
                    <div class="p-1 form-group col-6">
                        <div class="input-group url">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">https://</span>
                                <input type="text" class="form-control" name="url" placeholder="Type a Url Link"
                                    aria-describedby="basic-addon1" value="{{$button->url}}">
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- End Url -->
                    
                    <!-- Start Status Status -->
                    @if($button->type == 'payment')
                    <div class="p-1 form-group" id="typePaymentsGroup">
                        <label for="typePaymernts">Payment type</label>
                        <select name="typePaymernts" id="typePayments" class="form-control">
                            <option selected disabled>Select {{ $button?->name }} type Payments...</option>
                            <option value="paypal" {{ old('typePaymernts', $button->typePaymernts) == 'paypal' ? 'selected' : '' }}>PayPal
                            </option>
                            <option value="checkout" {{ old('typePaymernts', $button->typePaymernts) == 'checkout' ? 'selected' : ''
                                }}>2Checkout</option>
                        </select>
                        @error('typePaymernts')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    <!-- End Status Selected -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option selected disabled>Select {{ $button?->name }} Status...</option>
                            <option value="1" {{ old('status', $button->status)=='1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $button->status)=='0' ? 'selected' : '' }}>Not Active</option>
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