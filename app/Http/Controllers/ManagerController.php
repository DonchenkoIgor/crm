<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::where('role', 'manager')->get();
        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        return view('managers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'manager',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'manager',
        ]);

        return redirect()->route('managers.index');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'role' => 'nullable',
        ]);

        $user->update();

        return redirect()->route('managers.index');
    }

    public function destroy(User $manager)
    {
        if ($manager->role !== 'manager'){
            abort(403);
        }
        $manager->delete();

        return redirect()->route('managers.index');
    }
}
