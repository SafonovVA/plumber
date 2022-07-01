<div class="modal modal-success fade" tabindex="-1" id="create_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Generating new token</h4>
            </div>
            <div class="modal-footer">
                <form action="{{ route('voyager.services.tokens.store', ['service' => $service]) }}"
                      id="create_form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="token_name">Token name</label>
                        <input type="text" id="token_name" name="name" class="form-control"
                               placeholder="token name">
                    </div>
                    <div class="form-group">
                        <button type="button" id="add-ability" class="btn btn-link">Add ability</button>
                    </div>

                    <input type="submit" class="btn btn-success pull-right delete-confirm" value="Generate">
                </form>
                <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
