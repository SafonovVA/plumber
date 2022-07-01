@extends('voyager::master')

@php
    /** @var \App\Models\Service $service */
    /** @var \Illuminate\Support\Collection<\Laravel\Sanctum\PersonalAccessToken> */
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
        @if (count($tokens) !== 0)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#revoke_all_modal">
                <i class="voyager-trash"></i> <span>Revoke all</span>
            </button>
        @endif
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
                                <span class="input-group-addon" id="copy-addon"
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
                                                {{ is_array($token->{$attribute}) ? implode(', ', $token->{$attribute}) : $token->{$attribute} }}
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
    @include('vendor.voyager.tokens._create_token_modal', compact('service'))

    {{--Revoke all tokens--}}
    @include('vendor.voyager.tokens._revoke_all_tokens_modal', compact('service'))
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

            document.getElementById('add-ability').addEventListener('click', function (e) {
                e.target.parentNode.insertAdjacentHTML('beforeend', `@include('vendor.voyager.tokens._ability_input')`);
                Array.from(document.querySelectorAll('.remove-ability')).pop()
                    .addEventListener('click', event => event.target.parentNode.parentNode.remove());
            });


        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


    </script>
@endsection
