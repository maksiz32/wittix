<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteUserJob;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'string|nullable',
        ]);

        $search = $request->get('search');
        $users = User::where('username', 'like', "%$search%")
            ->orWhere('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")
            ->get();

        return response()->json($users->makeHidden('password'));
    }

    public function destroy(int $id)
    {
        DeleteUserJob::dispatch($id);

        return response()->json(['message' => 'User deletion is queued']);
    }
}
