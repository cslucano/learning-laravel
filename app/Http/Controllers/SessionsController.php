<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            
            return redirect('/')->with('success','Bienvenido nuevamente!');
        }

        throw ValidationException::withMessages([
            'email' => 'Las credenciales proporcionadas no han podido ser verificadas.',
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
