<div class="mx-10">
    <div class="mb-4 px-4 py-3 leading-normal text-rt_s_text bg-rt_s_dark rounded-lg" role="alert">
        Catálogo de alumnos, actualiza y alimenta los datos de los alumnos que realizan estan inscritos
        en una escuela en particular y en un grado, salón, turno y algunos datos más.
        El sistema es solo una prueba que es funcional darle información al usuario para que su navegación sela solicitud de servicios
        Èstos pueden ser agregados
        por medio de éste formulario, pero también se actualiza por medio de el registro de la App y al llamar a la
        empresa para solicitar un servicio.
        En el último caso, el operador puede agregar o actualizar un cliente, así como sus direcciones.
    </div>
    <h1>Vista Alumnos</h1>
    @if(!empty($successMsg))
        <div class="mb-4 px-4 py-3 leading-normal text-rt_p_text bg-rt_p_dark rounded-lg" role="alert">
            {{ $successMsg }}
        </div>
    @endif
    <button wire:click="crar"
       class=" bg-rt_primary hover:bg-rt_p_dark text-rt_s_text font-bold py-2 px-3 rounded">
        Nuevo Alumno
    </button>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Promedio</th>
            <th>Acciones</th>
        </tr>
        @foreach($alumnos as $a)
            <tr>
                <td>
                    {{ $a->nombre }} {{ $a->apellido_pat }} {{ $a->apellido_mat}}</td>
                <td>
                    {{ $a->promedio}}</td>
                <td>
                    <button wire:click="editar( {{ $a->id }})"
                      class=" bg-rt_primary hover:bg-rt_p_dark text-rt_s_text font-bold py-2 px-3 rounded">
                        Editar
                    </button>
                    <button wire:click="borrar( {{ $a->id }})"
                        class=" bg-rt_primary hover:bg-rt_p_dark text-rt_s_text font-bold py-2 px-3 rounded">
                        Borrar
                    </button>
                </td>   
            </tr>
        @endforeach
    </table>

    <div
        class="@if (!$showModal) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-rt_s_light bg-opacity-90">
        <div class="rounded-lg w-3/4 bg-rt_p_light">
            <form wire:submit.prevent="guardar" class="w-full">
                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full border-b pb-4">
                        <div class="rt_s_text font-medium text-lg">{{ $alumnoId ? 'Editar Alumno' : 'Nuevo alumno' }}</div>
                        <svg wire:click="close" class="ml-auto fill-current w-6 h-6 cursor-pointer rt_s_text"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>

                    <div class="grid grid-cols-3 gap-4 w-full">
                        <div class="py-4   mb-4">
                            <label class="rt_primary block font-medium text-sm  rt_s_text" for="title">
                                Nombre(s)
                            </label>
                            <input wire:model="alumno.nombre" 
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            @error('alumno.nombre') <span class="text-sm text-red-500 ml-1"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="py-4   mb-4">
                            <label class="rt_primary block font-medium text-sm  rt_s_text" for="title">
                                Apellido Paterno
                            </label>
                            <input wire:model="alumno.apellido_pat" 
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            @error('alumno.apellido_pat') <span class="text-sm text-red-500 ml-1"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="py-4   mb-4">
                            <label class="rt_primary block font-medium text-sm  rt_s_text" for="title">
                                Apellido Materno
                            </label>
                            <input wire:model="alumno.apellido_mat" 
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            @error('alumno.apellido_mat') <span class="text-sm text-red-500 ml-1"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 w-full">
                        <div class="py-4   mb-4">
                            <label class="rt_primary block font-medium text-sm  rt_s_text" for="title">
                                Promedio:
                            </label>
                            <input wire:model="alumno.promedio" 
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
                            @error('alumno.promedio') <span class="text-sm text-red-500 ml-1"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="ml-auto">
                        <button class="bg-rt_p_dark hover:bg-rt_p_dark text-rt_p_text font-bold py-2 px-4 rounded"
                            type="submit">{{ $alumnoId ? 'Guardar cambios' : 'Guardar' }}
                        </button>
                        <button class="bg-gray-500 hover:bg-rt_p_dark text-rt_p_text font-bold py-2 px-4 rounded"
                            wire:click="close" type="button" data-dismiss="modal">Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
