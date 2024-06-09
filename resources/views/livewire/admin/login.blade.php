<?php

use App\Livewire\Forms\LoginAdminForm;
use App\Livewire\Forms\RegisterAdminForm;
use App\Models\User;
use function Livewire\Volt\{form, layout, mount};

layout('components.layouts.admin');
form(RegisterAdminForm::class, 'RegisterForm');
form(LoginAdminForm::class);
mount(function () {
    if(\Illuminate\Support\Facades\Auth::user()) {
        return redirect('/admin');
    }
});

$save = function () {
    $this->validate([
        'RegisterForm.username' => 'required|min:3|unique:users,email|email',
        'RegisterForm.password' => 'required|min:6',
        'RegisterForm.verify_password' => 'required_with:RegisterForm.password|same:RegisterForm.password',
    ]);
    $new_user = new User();
    $new_user->email = $this->RegisterForm->username;
    $new_user->password = $this->RegisterForm->password;
    $new_user->save();
    if (Auth::attempt(['email' => $this->RegisterForm->username, 'password' => $this->RegisterForm->password])) {
        $this->redirect('/admin', navigate: true);
    }
};

$login = function () {
    $this->validate([
        'form.username_login' => 'required|min:3|email',
        'form.password_login' => 'required|min:6',
    ]);
    if (Auth::attempt(['email' => $this->form->username_login, 'password' => $this->form->password_login])) {
        $this->redirect('/admin', navigate: true);
    }
};
?>

<div class="flex items-center justify-center min-h-screen bg-base-200">
    <div class="shadow-xl card w-96 bg-base-100">
        <div class="card-body" dir="rtl">
            <h2 class="mx-auto text-center card-title ">
                {{ __('main.login_to_dashboard') }}
            </h2>
            <form wire:submit="login">
                <input type="text" wire:model='form.username_login' placeholder="{{ __('main.username') }}"
                       class="w-full max-w-xs input input-bordered"/>
                @error('form.username_login')
                <span class="error">{{ $message }}</span>
                @enderror
                <x-inputs.password dir="rtl"  wire:model='form.password_login' placeholder="{{ __('main.password') }}"
                       class="w-full max-w-xs my-2 input input-bordered"/>
                <div class="justify-center card-actions">
                    <button class="w-full btn btn-primary" type="submit">{{ __('main.login') }}</button>
                </div>
            </form>
            <button x-on:click="$openModal('simpleModal')" class="btn btn-link">{{ __('main.signup') }}</button>

        </div>
    </div>
    <x-modal name="simpleModal">
        <x-card title="{{ __('main.signup') }}" dir="rtl">
            <form wire:submit="save">
                <input type="text" wire:model='RegisterForm.username' placeholder="{{ __('main.username') }}"
                       class="w-full input input-bordered"/>
                @error('RegisterForm.username')
                <span class="error">{{ $message }}</span>
                @enderror
                <input type="password" wire:model='RegisterForm.password' placeholder="{{ __('main.password') }}"
                       class="w-full my-2 input input-bordered"/>
                @error('RegisterForm.password')
                <span class="error">{{ $message }}</span>
                @enderror
                <input type="password" wire:model='RegisterForm.verify_password'
                       placeholder="{{ __('main.verify_password') }}" class="w-full mb-2 input input-bordered"/>
                @error('RegisterForm.verify_password')
                <span class="error">{{ str_replace('verify password', __('main.verify_password'), $message) }}</span>
                @enderror
                <div class="justify-center card-actions">
                    <button class="w-full btn btn-primary" type="submit">{{ __('main.signup') }}</button>
                </div>
            </form>
        </x-card>
    </x-modal>
    <style>
        .bg-secondary-400 {
            background: rgba(0, 0, 0, 0.164) !important;
            backdrop-filter: blur(3px)
        }

        .error{
            color: red;
        }
    </style>
</div>
