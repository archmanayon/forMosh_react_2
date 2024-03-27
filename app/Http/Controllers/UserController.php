<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\MyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


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
 
    public function forgotPassword(Request $request){
        $fields = $request->validate([
            'email' =>'required|email|exists:users',
        ]);

        $token = Str::random(length: 64);

        $pwDB = DB::table(table:'password_reset_tokens')->insert([
            'email' => $fields['email'],
            'token' => $token,
            'created_at' => Carbon::now()

        ]);
        
        $sending = Mail::to($fields['email'])
        ->send(new ForgotPasswordMail ($token));

        return response()->json([$token, 'Char token'], 200);
    }

    public function requestReset(Request $request){
        // waiting for front end link, where to input the new password
        return "ang token kay".$request['token'];
    }

    public function resetPassword(Request $request){        
        $fields = $request->validate([
            'token' => 'required|exists:password_reset_tokens',
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
        ]);

        $correct_token = DB::table('password_reset_tokens')
            ->where([
                'email' => $fields['email'],
                'token' => $fields['token']
            ]);
        
        if (!$correct_token->first()) {
            return response([
                "message" => "Invalid Token"
            ], 401);
        }

        $user = User::where('email', $fields['email'])->first();
       
        $user->update([
            'password' => bcrypt($fields['password'])
        ]);

        $correct_token->delete();

        return response()->json([
            "message" => "Successfully updated password",
        ], 200);

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
