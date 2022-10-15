<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetForgotPassword extends Component
{
    public $token;
    public $email;
    public $password;

    protected $rules = [
        'token'    => ['required'],
        'email'    => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ];

    public function mount(Request $request)
    {
        $this->token = $request->route()->parameter('token');
        $this->email = $request->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.reset-forgot-password')
            ->extends('layouts.template')
            ->section('content');
    }

    public function resetPassword()
    {
        $this->dispatchBrowserEvent('before-validation');

        $validated_data = $this->validate();

        $status = Password::reset(
            [
                'email'    => $validated_data['email'],
                'password' => $validated_data['password'],
                'token'    => $validated_data['token'],
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message', __($status))
            : $this->addError('email', __($status));
    }
}
