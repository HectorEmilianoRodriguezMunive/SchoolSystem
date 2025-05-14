<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class Register extends Component
{
    public $name = '';
    public $email = '';
    public $pass = '';

    public function render()
    {
        return view('livewire.register');
    }

    public function registrar(){
       $this->validate(["name" => "required|min:3|max:10",
                        "email" => "required|email|unique:users,email",
                        "pass" => "required|min:5|max:15"
                         ]);

      $user = User::create(["name" => $this->name,
                     "email" => $this->email,
                     "password" => Hash::make($this->pass)]);

      event(new Registered($user));

      Auth::login($user);
      return redirect()->route('verification.notice');
    }
}
