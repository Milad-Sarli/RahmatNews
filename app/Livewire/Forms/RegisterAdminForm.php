<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterAdminForm extends Form
{
    #[Validate('required|min:3|unique:users,email|email')]
    public $username = '';

    #[Validate('required|min:6')]
    public $password = '';

    #[Validate('required_with:password|same:password')]
    public $verify_password = '';
}
