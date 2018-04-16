<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(request $request) {
        session_start();

        if ( User::where('email', '=', $request->email)->count() > 0 ){
            $user = User::where('email', '=', $request->email)->first();
            if ( $user->password == md5($request->password) ){
                $_SESSION['userSession'] = $user->name;
                return json_encode([
                    'status' => 'ok',
                    'message' => 'You\'re logged in, '.$user->name
                ]);
            }
            else {
              return json_encode([
                  'status' => 'error',
                  'message' => 'Incorrect username or password'
              ]);
            };
        }
        else{
            return json_encode([
                'status' => 'error',
                'message' => 'Incorrect username or password'
            ]);
        };

    }
}
