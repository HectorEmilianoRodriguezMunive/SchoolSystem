<!-- Fondo gris con desenfoque y transición de opacidad -->
<div class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm transition-opacity duration-500 ease-out opacity-100"></div>

<!-- Modal centrado -->
<div class="fixed inset-0 z-50 flex items-center justify-center">
  <div
    class="relative m-4 p-4 w-3/5 rounded-lg bg-white shadow-sm
           transform transition-all duration-300 ease-out
           opacity-100 scale-100">
           
    <!-- Título -->
    <div class="pb-4 text-xl font-medium text-slate-800">
      Agregar usuario
    </div>

    <!-- Cuerpo -->
    <div class="border-t border-slate-200 py-4 text-slate-600 font-light flex flex-col items-center">

            <div x-data="{ 
                file: null, 
                urlphoto: null, 
                updatePhoto(e) { 
                    this.file = e.target.files[0]; 
                    this.urlphoto = URL.createObjectURL(this.file); 
                } 
            }" class="flex flex-col items-center gap-2">

            <img :src="urlphoto || '{{ asset('img/logo.jpg') }}'" alt="foto_perfil" class="w-50 h-50 rounded-full border">

            <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">
                Foto de perfil 
            </label>

            <label class="inline-block cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Seleccionar foto
                <input @change="updatePhoto($event)" type="file" accept=".jpg,.jpeg,.png" class="hidden" wire:model = "photo"/>
            </label>
        </div>

        <div class = "flex gap-4 flex-wrap">
            <div>
                <label for="nombre" class="block text-sm font-medium text-slate-700 mb-1">
                    Nombre  @error('name') <span class="text-red-500">{{ 'Nombre obligatorio' }}</span> @enderror

                </label>
                <input wire:model = "name" type="text" class = "w-80 px-4 py-2 rounded-md border shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Roberto">
            </div>

            <div>
                <label for="paterno" class="block text-sm font-medium text-slate-700 mb-1">
                    Apellido paterno   @error('last_nameF') <span class="text-red-500">{{ 'Apellido paterno obligatorio' }}</span> @enderror
                </label>
                <input wire:model = "last_nameF" type="text" class = "w-80 px-4 py-2 rounded-md border shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Goméz">
            </div>

            <div>
                <label for="materno" class="block text-sm font-medium text-slate-700 mb-1">
                    Apellido materno  @error('last_nameM') <span class="text-red-500">{{ 'Apellido materno obligatorio' }}</span> @enderror
                </label>
                <input  wire:model = "last_nameM" type="text" class = "w-80 px-4 py-2 rounded-md border shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Pérez">
            </div>

            
            <div class = "flex gap-4 flex-wrap">
                <div>
                    <label for="correo" class="block text-sm font-medium text-slate-700 mb-1">
                        Correo electrónico                     @error('email') <span class="text-red-500">{{ 'Email obligatorio y/o verificar formato' }}</span> @enderror
                    </label>
                    <input wire:model = "email" type="text" class = "w-80 px-4 py-2 rounded-md border shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Roberto@email.com">
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium text-slate-700 mb-1">
                        Contraseña                     @error('pass') <span class="text-red-500">{{ 'Contraseña obligatoria, de 8-15 caracteres' }}</span> @enderror
                    </label>
                    <input wire:model = "pass" type="password" class = "w-80 px-4 py-2 rounded-md border shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="password1234">
                </div>
            </div>
        </div>


    </div>

    <!-- Botones -->
    <div class="pt-4 flex justify-end">
      <button wire:click="closeModal()" class="rounded-md py-2 px-4 text-sm text-slate-600 hover:bg-slate-100 transition">
        Cancelar
      </button>
      <button wire:click ="saveUser()"class="ml-2 rounded-md bg-green-600 py-2 px-4 text-sm text-white hover:bg-green-700 transition">
        Confirmar
      </button>
    </div>
  </div>
</div>
