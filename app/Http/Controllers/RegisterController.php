<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }
    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|max:20|min:8',
            'phone' => 'required|numeric|digits:10'
        ]);
        if(User::firstWhere('phone',$attributes['phone']) == null) {
            $user = User::create($attributes);
            auth()->login($user);
            session()->flash('success', 'Hesabınız Oluşturuldu.');
            return redirect('/anasayfa');
        }
        return back()->with('error', 'Bu numara sistemimize kayıtlıdır.');
    }
}
