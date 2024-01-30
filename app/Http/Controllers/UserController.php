<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('covidFlags', 'qrCodes')->get();
        return response()->json($users);
    }
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'udid' => 'required|string'
        ]);

        // Create a new User instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'udid' => $request->udid
        ]);

        // Return a JSON response with the newly created User and a status code of 201 (Created)
        return response()->json($user, 201);
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the User by its ID
        $user = User::with('covidFlags', 'qrCodes')->findOrFail($id);

        // Return a JSON response with the User data
        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the User by its ID
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
            'udid' => 'required|string'
        ]);

        // Update the User instance with the new data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? bcrypt($request->password) : $user->password,
            'udid' => $request->udid
        ]);

        // Return a JSON response with the updated User
        return response()->json($user);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the User by its ID and delete it
        User::findOrFail($id)->delete();

        // Return a JSON response with a success message
        return response()->json(['message' => 'User deleted successfully']);
    }
}
