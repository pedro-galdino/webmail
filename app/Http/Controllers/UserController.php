<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Validations;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function cadastrar(Request $request)
    {
        $request->validate(Validations::cadastrar(), ['unique' => 'Endereço de e-mail já está cadastrado.']);
        $request->cookie();

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        Auth::loginUsingId($user->id);
        return redirect('/principal');
    }

    public function logar(Request $request)
    {
        $request->flashOnly('email');
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/principal');
        }
        return back()->with('error', 'E-mail e/ou senha inválido(s).');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
