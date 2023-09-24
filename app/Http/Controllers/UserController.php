<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return Inertia::render('User/Index' , [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create');  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    // Hash the password separately before creating the user
    $hashedPassword = Hash::make($request->password);

    // Create the user with the hashed password
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
    ]);

    return redirect()->to(route('user.index'));
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);
        
        // Update the user's name and email
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        // Check if a new password is provided and update it
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password), // Hash the new password
            ]);
        }
    
        return redirect()->to(route('user.index'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
