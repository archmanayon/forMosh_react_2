<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed',

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('registerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];


        return response([
            'message' => 'Successfully created user',
            'data' => $response
        ], 201);
    }

    // login
    public function login(Request $request)
    {
        $fields = $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        $user = User::where('email', $fields['email'])->first();


        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                "message" => "Invalid Credentials"
            ], 401);
        }

        $token = $user->createToken('registerToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    // remove token on logout
    public function destroyToken(Request $request)
    {
        // Revoke the current user's token
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "message" => "Successfully logged out",
        ], 200);

        // to completely destroy token from db
        // auth()->user()->tokens()->delete();
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
