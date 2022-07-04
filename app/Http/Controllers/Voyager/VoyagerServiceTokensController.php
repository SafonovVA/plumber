<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Voyager\VoyagerCreateTokenRequest;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Laravel\Sanctum\PersonalAccessToken;

class VoyagerServiceTokensController extends Controller
{
    public function index(Service $service): View
    {
        $attributes = ['name', 'abilities', 'last_used_at'];

        return view('vendor.voyager.tokens.browse', compact('service', 'attributes'));
    }

    public function revoke(Service $service, PersonalAccessToken $token): RedirectResponse
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $service->tokens()->where('id', $token->id)->delete();

        return back();
    }

    /** @noinspection PhpUnused */
    public function revokeAll(Service $service): RedirectResponse
    {
        $service->tokens()->delete();

        return back();
    }

    public function store(VoyagerCreateTokenRequest $request, Service $service): RedirectResponse
    {
        $token = $service->createToken($request->name, $request->abilities ?? ['*']);
        $request->session()->flash('token', $token->plainTextToken);

        return back();
    }
}
