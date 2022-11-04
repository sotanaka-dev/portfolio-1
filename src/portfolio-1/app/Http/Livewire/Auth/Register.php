<?php

/* 会員登録 */

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    public $email;
    public $password;

    protected function rules()
    {
        return [
            'email'    => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.template')
            ->section('content');
    }

    public function register()
    {
        $this->dispatchBrowserEvent('request-scroll-up');

        $validated_data = $this->validate();

        $user = User::create([
            'email'       => $validated_data['email'],
            'password'    => Hash::make($validated_data['password']),
        ]);

        event(new Registered($user));

        Auth::guard()->login($user);

        return redirect()->route('verification.notice')
            ->with('message', __('messages.complete.send_mail'));
    }
}
