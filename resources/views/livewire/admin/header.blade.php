<?php

use function Livewire\Volt\{state};

state(['route_name' => \Illuminate\Support\Facades\Route::getCurrentRoute()->getName()])

?>

<div >
    <div class="drawer drawer-end">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col" dir="rtl">
            <!-- Navbar -->
            <div class="w-full navbar bg-lime-200">
                <div class="flex-none">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div>
                <div class="flex-1 font-bold px-2 mx-2">{{__('main.admin_dashboard')}}</div>
            </div>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80  min-h-full bg-lime-200" dir="rtl">

                <!-- Sidebar content here -->
                <li>  <a href="/admin" wire:navigate class="flex {{$route_name === 'home' ? "active" : ""}}">
                        <x-gmdi-space-dashboard-r  class="w-7"/>
                        {{__('main.dashboard')}}
                    </a>
                </li>
                <li>  <a href="/users" wire:navigate class="flex {{$route_name === 'users' ? "active" : ""}}">
                        <x-gmdi-supervised-user-circle-o  class="w-7"/>
                        {{__('main.users_page')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
