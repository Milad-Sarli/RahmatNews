<?php

use function Livewire\Volt\{state,layout};

layout('components.layouts.admin');
state(['user' => Auth::user()]);
?>

<div>
    <h1 class="text-3xl text-center">dashboard</h1>
</div>