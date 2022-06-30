<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\PersonalAccessToken;

class VoyagerServiceTokensController extends Controller
{
    public function index(Service $service): View
    {
        $attributes = Schema::getColumnListing('personal_access_tokens'); // users table
        $attributes = array_filter($attributes, fn($attribute) =>
            ! in_array($attribute, ['created_at', 'updated_at', 'id', 'tokenable_id', 'tokenable_type', 'token']));

        return view('vendor.voyager.tokens.browse', compact('service', 'attributes'));
    }

    public function revoke(Service $service, PersonalAccessToken $token): RedirectResponse
    {
        $service->tokens()->where('id', $token->id)->delete();

        return back();
    }

    public function revokeAll(Service $service): RedirectResponse
    {
        $service->tokens()->delete();

        return back();
    }

    public function store(Request $request, Service $service): RedirectResponse
    {
        $token = $service->createToken($request->name);
        $request->session()->flash('token', $token->plainTextToken);
\Debugbar::info($token->plainTextToken);
        return back();
    }

    public function recreateToken(Request $request, $id)
    {
        $user = User::find($id);
        $user->tokens()->delete();
        $token = $user->createToken($user->name);
        $user->token = $token->plainTextToken;
        $user->save();
        return back();
    }
}
