<div class="modal fade" id="delete{{ $button->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{ 'Delete ' . $button?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('button.destroy', $button->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        <h3 class="form-group ml-5 p-1">
                            Are You Sure To Delete <span class="text-danger">{{ $button?->name }}</span>
                        </h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
