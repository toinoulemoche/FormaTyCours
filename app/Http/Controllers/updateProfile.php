<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class updateProfile extends Controller
{

    public function edit(User $user)
    {
        return view('modifyUser', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        date_default_timezone_set("Europe/Paris");
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'updated_at' => date("Y-m-d H:i:s"),
            'password' => ['nullable','confirmed']
        ]);

        if(!is_null($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        }
        else{
            $validated['password'] = $user['password'];
        }

        $user->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'User updated successfully');
    }
}
