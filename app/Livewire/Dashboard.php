<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;
use Livewire\WithFileUploads;
class Dashboard extends Component
{   
    
    use WithPagination, WithFileUploads;
    
    public $isOpenModal = false;
    public $name = '';
    public $last_nameF = '';
    public $last_nameM = '';
    public $email = '';
    public $pass = '';
    public $photo;
    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage(); // Reinicia la paginación cuando cambia el valor de búsqueda
    }

    public function searchUsers(){
        $this->render();
    }

    public function render()
    {   
          // Lógica de búsqueda y paginación
        if (empty($this->search)) {
            $users = User::orderBy('tuition')->paginate(5);
        } else {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('tuition', 'like', '%' . $this->search . '%')
                ->orWhere('last_nameF', 'like', '%' . $this->search . '%')
                ->orWhere('last_nameM', 'like', '%' . $this->search . '%')
                ->orderBy('tuition')
                ->paginate(5);
        }

        return view('livewire.dashboard', compact('users'));
    }

    public function openModal(){
        $this->isOpenModal = true;
    }

    public function closeModal(){
        $this->isOpenModal = false;
    }

    public function deleteFields(){
        $this->name = '';
        $this->last_nameF = '';
        $this->last_nameM = '';
        $this->email = '';
        $this->pass = '';
    }

    public function saveUser()
    {
        $this->validate([
            "name" => "required|string|max:80|unique:users,name",
            "last_nameF" => "required|string|max:80",
            "last_nameM" => "required|string|max:80",
            "email" => "required|email|unique:users,email",
            "pass" => "required|min:8|max:15",
            "photo" => "file|mimes:jpg,jpeg,png"
        ]);

        // Verifica si se subió una foto
        $file_name = null;
        if ($this->photo) {
            
            $file_name = strtolower($this->last_nameF . $this->last_nameM .'_' . time()) . '.' . $this->photo->getClientOriginalExtension();

            // Guardar el archivo con ese nombre
            $this->photo->storeAs('private/photos', $file_name);
        }

        // Generar matrícula
        $tuition = substr($this->last_nameF, 0, 1)
                . substr($this->last_nameM, 0, 1)
                . substr($this->name, 0, 1)
                . substr(date('Y'), 0, 2)
                . Str::random(3);

        // Guardar usuario en la base de datos
        User::create([
            "name" => $this->name,
            "last_nameF" => $this->last_nameF,
            "last_nameM" => $this->last_nameM,
            "email" => $this->email,
            "password" => Hash::make($this->pass),
            "photo" => $file_name, // Aquí ya va el nombre del archivo
            "tuition" => $tuition
        ]);

        $this->closeModal();
        $this->deleteFields();
        $this->dispatchBrowserEvent('toast.success', ['message' => 'Usuario registrado exitosamente.']);
    }


   

}
