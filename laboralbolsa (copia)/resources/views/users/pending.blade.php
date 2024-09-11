<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios Pendientes de Aprobación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Mostrar mensajes de éxito al aprobar o rechazar usuarios -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tabla de usuarios pendientes -->
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 text-center">Nombre</th>
                            <th class="px-4 py-2 text-gray-900 text-center">Email</th>
                            <th class="px-4 py-2 text-gray-900 text-center">DNI</th>
                            <th class="px-4 py-2 text-gray-900 text-center">RUC</th>
                            <th class="px-4 py-2 text-gray-900 text-center">Celular</th>
                            <th class="px-4 py-2 text-gray-900 text-center">Rol</th>
                            <th class="px-4 py-2 text-gray-900 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuariosPendientes as $usuario)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $usuario->id }}</td>
                                <td class="border px-4 py-2 text-center">{{ $usuario->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $usuario->email }}</td>
                                <td class="border px-4 py-2 text-center">{{ $usuario->dni }}</td>
                                <td class="border px-4 py-2 text-center">{{ $usuario->ruc }}</td>
                                <td class="border px-4 py-2 text-center">{{ $usuario->celular }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if($usuario->rol == '1')
                                        Admin
                                    @elseif($usuario->rol == '2')
                                        Empresa
                                    @elseif($usuario->rol == '3')
                                        Postulante
                                    @elseif($usuario->rol == '4')
                                        Supervisor
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <!-- Botón para aprobar -->
                                    <form method="POST" action="{{ route('usuarios.aprobar', $usuario) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Aprobar</button>
                                    </form>
                                    <!-- Botón para rechazar -->
                                    <form method="POST" action="{{ route('usuarios.rechazar', $usuario) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Rechazar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Si no hay usuarios pendientes -->
                @if($usuariosPendientes->isEmpty())
                    <div class="text-center mt-4">
                        <p class="text-gray-500">No hay usuarios pendientes de aprobación.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
