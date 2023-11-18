<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proccess
    </button>
    <div class="dropdown-menu">
        <a type="button" class="modal-effect btn btn-sm btn-success dropdown-item"
            style="text-align: center !important" href="{{ route('orders.show', $order->id) }}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                Show Details
            </span>
        </a>
        
        
         <button type="button" class="modal-effect btn btn-sm btn-danger dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#delete{{$order->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                Delete
            </span>
        </button>
    </div>
    
@include('admin.orders.btn.delete')
</div>