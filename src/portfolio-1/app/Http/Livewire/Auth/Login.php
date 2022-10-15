<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected function rules()
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.template')
            ->section('content');
    }

    public function authenticate(Request $request)
    {
        $this->dispatchBrowserEvent('before-validation');
        $validated_data = $this->validate();

        if (Auth::attempt($validated_data, $this->remember)) {
            // Auth::logoutOtherDevices($validated_data['password']);
            $request->session()->regenerate();

            return redirect()->intended('home')
                ->with('message', __('messages.complete.login'));
        }
        $this->addError('email', __('auth.failed'));
    }
}
