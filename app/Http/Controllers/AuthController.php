<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function register(request $request) {
        $this->validate($request, [
            'name'      => 'required|min:3|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:3|max:60|confirmed',
        ]);

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = md5($request->password);
        $newUser->save();
        return json_encode([
            'message' => 'You registered successfully!',
        ]);
    }

    public function logout() {
        session_start();
        unset($_SESSION['userSession']);
        return redirect('/home');
    }
}
