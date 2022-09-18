<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    public $name;
    public $postal_code;
    public $address;
    public $email;
    public $tel;
    public $password;

    protected function rules()
    {
        return [
            'name'        => ['required', 'max:255'],
            'postal_code' => ['required', new PostalCodeRule()],
            'address'     => ['required'],
            'email'       => ['required', 'email', 'max:255', 'unique:users'],
            'tel'         => ['required', new TelRule()],
            'password'    => ['required', 'min:8'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPostalCode()
    {
        $this->postal_code = \Util::addHyphenToPostalCode($this->postal_code);
    }

    public function updatedTel()
    {
        $this->tel = \Util::addHyphenToTel($this->tel);
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.template')
            ->section('content');
    }

    public function register()
    {
        $this->dispatchBrowserEvent('before_validation');

        $validated_data = $this->validate();

        $user = User::create([
            'name'        => $validated_data['name'],
            'postal_code' => $validated_data['postal_code'],
            'address'     => $validated_data['address'],
            'email'       => $validated_data['email'],
            'tel'         => $validated_data['tel'],
            'password'    => Hash::make($validated_data['password']),
        ]);

        /* NOTE: メール送信の為のイベント */
        event(new Registered($user));

        Auth::guard()->login($user);

        return redirect()->route('verification.notice')
            ->with('status', __('messages.complete.send_mail'));
        // return redirect()->route('home');
    }
}
