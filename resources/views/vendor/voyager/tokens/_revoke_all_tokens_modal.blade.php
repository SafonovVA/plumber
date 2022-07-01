<div class="modal modal-danger fade" tabindex="-1" id="revoke_all_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Revoking all tokens</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to revoke all tokens of "{{ $service->name }}" service?
            </div>
            <div class="modal-footer">
                <form action="{{ route('voyager.services.tokens.revoke_all', ['service' => $service]) }}"
                      id="delete_form" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Revoke all">
                </form>
                <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
