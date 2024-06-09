<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginAdminForm extends Form
{
    #[Validate('required|min:3|email')]
    public $username_login = '';

    #[Validate('required|min:6')]
    public $password_login = '';
}
