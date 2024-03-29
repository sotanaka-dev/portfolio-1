<?php

/* ログイン済みユーザーのお問い合わせ機能 */

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Contact extends Component
{
    public $user;
    public $text;

    public function mount()
    {
        $this->user = Auth::user();
    }

    protected function rules()
    {
        return [
            'text' => ['required'],
        ];
    }

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
    }

    public function render()
    {
        return view('livewire.contact')
            ->extends('layouts.template')
            ->section('content');
    }

    public function submitContactForm()
    {
        $this->dispatchBrowserEvent('request-scroll-up');

        $this->validate();

        $this->insertContacts();

        $this->reset('text');

        session()->flash('message', __('messages.complete.contact'));
    }

    private function insertContacts()
    {
        DB::table('contacts')
            ->insert([
                'user_id' => $this->user->id,
                'text'    => $this->text,
            ]);
    }
}
