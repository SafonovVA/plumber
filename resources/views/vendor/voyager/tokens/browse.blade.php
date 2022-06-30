@extends('voyager::master')

@php
    $tokens = $service->tokens;
@endphp

@section('page_title', __('voyager::generic.viewing').' Service Tokens')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-rocket"></i> "{{ $service->name }}" service tokens
        </h1>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create_modal">
            <i class="voyager-plus"></i> <span>Add New</span>
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#revoke_all_modal">
            <i class="voyager-trash"></i> <span>Revoke all</span>
        </button>

    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('token'))
                    <div class="panel panel-default">
                        <div class="panel-body ">
                            <label for="token_value" class="col-form-label">Newly created token</label>
                            <div class="input-group">
                                <input type="text" id="token_value" class="form-control"
                                       value="{{ session()->get('token') }}" aria-describedby="copy-addon" readonly>
                                <span class="btn btn-info btn-sm input-group-addon" id="copy-addon"
                                      title="Copy" data-toggle="tooltip" data-placement="top">
                                    <i class="voyager-documentation"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    @foreach($attributes as $attribute)
                                        <th> {{ $attribute }} </th>
                                    @endforeach
                                    <th>actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tokens as $token)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach($attributes as $attribute)
                                            <td>
                                                {{ is_array($token[$attribute]) ? implode(' ,', $token[$attribute]) : $token[$attribute] }}
                                            </td>
                                        @endforeach
                                        <td class="no-sort no-click bread-actions">
                                            <form method="post"
                                                  action="{{ route('voyager.services.tokens.revoke', ['service' => $service, 'token' => $token]) }}">
                                                @csrf
                                                <button type="submit"
                                                        title="Revoke"
                                                        style="margin-right: 5px;"
                                                        class="btn btn-sm btn-danger pull-right edit">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Revoke</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Create token--}}
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
                        <div class="form-group">
                            <label for="token_name">Token name</label>
                            <input type="text" id="token_name" name="name" class="form-control"
                                   placeholder="token name">
                        </div>
                        @csrf
                        <input type="submit" class="btn btn-success pull-right delete-confirm" value="Generate">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{--Revoke all tokens--}}
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
                    Are you sure to revoke all tokens of "{{ $service->name }}"?
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
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            if (document.getElementById('copy-addon')) {
                document.getElementById('copy-addon').addEventListener('click', function () {
                    navigator.clipboard.writeText(document.getElementById('token_value').value);
                    toastr['info']('Token copied');
                });
            }
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


    </script>
@endsection
