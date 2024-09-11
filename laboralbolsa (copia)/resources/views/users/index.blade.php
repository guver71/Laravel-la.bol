<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Se eliminó el botón para crear usuarios -->

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Nombre</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Email</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">DNI</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">RUC</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Celular</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Rol</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->id }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->name }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->email }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->dni }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->ruc }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $user->celular }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">
                                @if($user->rol == '1')
                                    Admin
                                @elseif($user->rol == '2')
                                    Empresa
                                @elseif($user->rol == '3')
                                    Postulante
                                @elseif($user->rol == '4')
                                    Supervisor
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">
                                @if(auth()->user()->rol == '1')
                                <div class="flex justify-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                    <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $user->id }}')">Eliminar</button>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mostrar el mensaje de éxito
                Swal.fire({
                    title: 'Eliminado',
                    text: 'El usuario ha sido eliminado.',
                    icon: 'success',
                    timer: 1000, // Mostrar por 5 segundos
                    timerProgressBar: true,
                    showConfirmButton: false, // Deshabilitar botón de confirmación
                });

                // Esperar 5 segundos antes de enviar el formulario
                setTimeout(() => {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/users/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
                }, 5000); // Esperar 5 segundos (5000 ms)
            }
        });
    }
</script>


