<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Illuminate\Support\Facades\Auth;

class UserTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'device_name' => 'required'
        // ]);
        // /** @var  User $user */
        // $user = User::where('email', $request->get('email'));

        // if(!$user && !Hash::check($request->pasword, $user->password))
        // {
        //     throw ValidationValidationException::withMessages([
        //         'email' => 'El email no existe o no coincide con nuestros datos'
        //     ]);
        // }

        // return response()->json([
        //     'token' => $request->createToken($request->device_name)->plainTextToken
        // ]);
        
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'token' => $request->user()->createToken($request->name)->plainTextToken,
            'message' => 'Success'
        ]);
        }

        return response()->json([
        'message' => 'Unauthorized'
        ], 401);
    }

        public function validatelogin(Request $request)
        {
            return $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required'
            ]);
        }

}
