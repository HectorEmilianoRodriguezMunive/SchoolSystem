<div>
    @include('livewire.menubar')

    <div class = "flex gap-10 ">
        @include('livewire.aside')
        <main class = "h-150 w-[80vw] flex flex-col justify-center items-center bg-white mt-5 rounded-lg">
                <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Mis usuarios</h3>
                <p class="text-slate-500">Administra los usuarios de tu sistema.</p>
            </div>
            <div class="ml-3">
                <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <input
                    class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                    placeholder="Buscar usuario..."
                    wire:model.debounce.300ms="search"                    
                    wire:change="searchUsers()"
                    />
                    <button
                    class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                    type="button"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    </button>
                </div>
                </div>
            </div>
        </div>
        
        <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Matricula
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Foto
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Nombre
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Correo
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Registro
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Acciones
                </p>
                </th>

            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                 <tr class="hover:bg-slate-50 border-b border-slate-200">
                    <td class="p-4 py-5">
                    <p class="block font-semibold text-sm text-slate-800">{{$user->tuition}}</p>
                    </td>
                    <td class="p-4 py-5">
                    <img src = "{{$user->photo ? route('file.getfile', $user->photo) : asset('img/logo.jpg') }}" alt = "photo" class = "w-8 h-8 rounded-xl">
                    </td>
                    <td class="p-4 py-5">
                    <p class="block font-semibold text-sm text-slate-800">{{$user->name}}</p>
                    </td>
                    <td class="p-4 py-5">
                    <p class="block font-semibold text-sm text-slate-800">{{$user->email}}</p>
                    </td>
                    <td class="p-4 py-5">
                    <p class="block font-semibold text-sm text-slate-800">{{$user->created_at}}</p>
                    </td>

                    <td class="p-4 py-5">
                    <div class = "flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>
                </td>
                 </tr>
                    

            @endforeach
           
            </tbody>
        </table>
        
        <div class="px-4 py-3">
            {{ $users->links() }}
        </div>

            <button 

                wire:click = "openModal()"
                data-dialog-target="dialog-lg"
                class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                Agregar
            </button>
        </div>
        @if($isOpenModal)

          @include('livewire.modalusers')

        @endif
         
        </main>
    </div>

        @script
            <script type = "text/javascript">
                document.addEventListener("toast.success", e=>{
                    toastr.success(e.detail.message);

                });
            </script>    
        @endscript
  
</div>

