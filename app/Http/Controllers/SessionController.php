<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Session extends Controller
{

    public function store(){
        $attributes = request()->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => 'required'
        ]);
        if(Auth::attempt($attributes)){
            session()->regenerate();//session fixation
            return redirect('/anasayfa')->with('success', 'Hoşgeldiniz. '.$user->name.' '.$user->surname);
        }
        return redirect('/')->with('error', 'Parola hatalı');
    }
    public function destroy(){
        $username = auth()->user()->name;
        $usersurname = auth()->user()->surname;
        auth()->logout();
        return redirect('/')->with('success', 'Hoşçakalın. '.$username.' '.$usersurname);
    }
}
