<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ResetEmail extends Component
{

    public function mount()
    {
        $this->user  = Auth::user();
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        /*
        NOTE: バリデーションのパターン
            最初のバリデーションの段階ですでに登録されているメールアドレスです。を表示する ✓
            現在のメールアドレスと同じです。というバリデーションを後から追加する
            現在と同じメールアドレスでも再度メールを送信して認証させる
        */
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            // 'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id()),],
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

        /* if ($this->user->email === $validated_data['email']) {
            $this->addError('email', '現在と同じメールアドレスです。');
            return;
        } */

        $this->user->email = $validated_data['email'];
        $this->user->email_verified_at = null;
        $this->user->save();
        $this->user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')
            ->with('message', __('messages.complete.send_mail'));
    }
}
