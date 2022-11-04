<?php

/* メールアドレス再設定（届いたメールのリンクにアクセスすると認証完了） */

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ResetEmail extends Component
{

    public function mount()
    {
        $this->user  = Auth::user();
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
        ];
    }

    public function render()
    {
        return view('livewire.auth.reset-email')
            ->extends('layouts.template')
            ->section('content');
    }

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
    }

    public function resetEmail()
    {
        $this->dispatchBrowserEvent('request-scroll-up');

        $validated_data = $this->validate();

        $this->user->email = $validated_data['email'];
        $this->user->email_verified_at = null;
        $this->user->save();
        $this->user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')
            ->with('message', __('messages.complete.send_mail'));
    }
}
