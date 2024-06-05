<?php

namespace App\Http\Controllers;

use App\Models\RentedItem;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        //dd($users);

        return view('admin.user.index', [
            'users' => $users
        ]);

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.form', [
            'user' => (new User()),
            'roles' => Role::all()->pluck('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'mobile' => 'required',
            'role' => 'required'
        ]);

        $validated['password'] = bcrypt('password');

        $user = User::create($validated);
        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.form', [
            'user' => $user,
            'roles' => Role::all()->pluck('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'address' => 'required',
            'mobile' => 'required',
            'role' => 'required'
        ]);

        $user->update($validated);
        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'User successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User successfully deleted!');
    }

//    public function show($id)
//    {
//        $user = User::findOrFail($id);
//        return view('admin.user.show-users', compact('user'));
//    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $rented_items = RentedItem::where('rentee_id', $user->id)->paginate(5);
        return view('admin.user.show-users', compact('user', 'rented_items'));
    }



}
