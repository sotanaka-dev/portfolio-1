<?php

/* パスワードを忘れた際の再設定リンクの送信 */

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class SendPasswordResetEmail extends Component
{
    public $email;

    protected $rules = [
        'email' => ['required', 'email'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.send-password-reset-email')
            ->extends('layouts.template')
            ->section('content');
    }

    public function sendResetLinkEmail()
    {
        $this->dispatchBrowserEvent('request-scroll-up');

        $validated_data = $this->validate();

        $status = Password::sendResetLink(
            ['email' => $validated_data['email']]
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('login')->with('message', __($status))
            : $this->addError('email', __($status));
    }
}
