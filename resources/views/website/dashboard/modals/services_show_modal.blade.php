<!-- Modal -->
<div class="service-modal modal fade" id="serviceModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mx-auto" id="serviceModalLabel">Select Your Service(s)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('website.orders.update', $order->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="modal-body selection service-modal-body">
                        @foreach ($services as $service)
                            <label class="d-block {{ $service->name }}-cont">
                                <input type="checkbox" name="order_service_id[]" value="{{ $service->id }}" data-target="{{ $service->name }}-cont" data-service="{{ $service->id }}" 
                                    {{ in_array($service->id, $order->order_service_id) ? 'checked' : '' }}>
                                {{ $service->name }}
                                <span class="float-right">${{ $service->price }} Per Photo</span>
                            </label>
                        @endforeach
                        <div class="all-services text-center p-4">You've selected all services</div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mx-auto" id="select-services-btn" >Continue</button>
                      </div>
            </form>
        </div>
      </div>
    </div>
  </div>