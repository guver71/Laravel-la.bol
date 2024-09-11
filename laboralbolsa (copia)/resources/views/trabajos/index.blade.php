<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mb-4">
                    @if(auth()->user()->rol == '1')
                    <a href="{{route('trabajos.create')}}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear</a>
                    @endif
                </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Name</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Descripción</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Salario</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-black text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trabajos as $trabajo)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $trabajo->id }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $trabajo->name }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $trabajo->descripcion }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-black text-center">{{ $trabajo->salario }}</td>

                            <td class="border px-4 py-2 text-center">
                                @if(auth()->user()->rol == '1')
                                <div class="flex justify-center">
                                    <a href="{{ route('trabajos.edit', $trabajo->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                    <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $trabajo->id }}')">Eliminar</button>

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
                // Si el usuario confirma la eliminación, crea y envía el formulario de eliminación
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/trabajos/' + id;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();

                Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado.',
                    'success'
                );
            }
        });
    }
</script>
