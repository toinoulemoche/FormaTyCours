<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminsL extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);

        return view('administrations.index', compact('users'))
          ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('administrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      date_default_timezone_set("Europe/Paris");
      $validated = $request->validate([
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'updated_at' => date('Y-m-d H:i:s'),
          'admins'
      ]);

      $validated['password'] = Hash::make($validated['password']);

      User::create($validated);
      return redirect()->route('administrations.index')
                ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $administration)
    {
        return view('administrations.show', [
          'user' => $administration
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $administration)
    {
      return view('administrations.edit', [
        'user' => $administration
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $administration)
    {
      date_default_timezone_set("Europe/Paris");
      $validated = $request->validate([
          'name' => 'required',
          'email' => 'required',
          'updated_at' => date("Y-m-d H:i:s"),
          'admins' => 'nullable',
          'password' => ['nullable','confirmed']
      ]);

      if(!is_null($validated['password'])){
        $validated['password'] = Hash::make($validated['password']);
      }
      else{
        $validated['password'] = $administration['password'];
      }

      // If admins is null, set it to false
      if(is_null($request->get('admins'))) {
        $validated['admins'] = false;
      }
      else {
        $validated['admins'] = true;
      }

      $administration->update($validated);

      return redirect()->route('administrations.index')
          ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $administration)
    {
      $administration->delete();

      return redirect()->route('administrations.index')
          ->with('success', 'User deleted successfully');
    }
}
