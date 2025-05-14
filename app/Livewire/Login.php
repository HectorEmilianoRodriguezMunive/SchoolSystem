<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email = "";
    public $pass = "";
    
    public function render()
    {
        return view('livewire.login');
    }

    public function login(){

        $this->validate(["email" => "required|email",
                         "pass" => "required|min:5|max:15"]);
        
        
       if(Auth::attempt(['email' => $this->email, 'password' => $this->pass])){
            return redirect()->route('dashboard.main');
       }else{
            session()->flash('error', 'Credenciales inválidas');
       }

    }

}
