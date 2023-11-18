<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proccess
    </button>
    <div class="dropdown-menu">
        <button type="button" class="modal-effect btn btn-sm btn-success dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#edit{{$slide->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                Edit
            </span>
        </button>
        <button type="button" class="modal-effect btn btn-sm btn-danger dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#delete{{$slide->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                Delete
            </span>
        </button>
    </div>
</div>

@include('admin.slides.btn.modals.edit')
@include('admin.slides.btn.modals.delete')
