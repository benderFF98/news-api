<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function store(Request $request)
    {
        $token = \Str::random(64);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $integration = Integration::create(
            [
                'name' => $request->input('name'),
                'token' => $token
            ]
        );

        return response()->json([
            'token' => $token,
            'id' => $integration->id
        ]);
    }

    public function destroy($id)
    {
        $integration = Integration::findOrFail($id);

        $integration->delete();

        return response()->noContent();
    }
}
