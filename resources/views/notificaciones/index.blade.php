<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center mb-10 mt-5">Publicar Vacante</h1>
                @forelse ($notificaciones as $notificacion)
                <div class="p-5 border divide-y divide-gray-200 lg:flex lg:justify-between lg:items-center">
                    <div>                    
                        <p>Tienes un nuevo candidato en:
                            <span class="font-bold">{{ $notificacion->data['nombreVacante'] }}</span>
                        </p>
                        <p><span class="text-sm font-bold text-gray-600">{{ $notificacion->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                    <div class="mt-5 md:mt-0">                        
                        <a href="{{route('candidatos.index', $notificacion->data['vacante_id'])}}" class="bg-indigo-500 p-2 text-sm rounded-lg text-white">Ver Candidatos</a>
                    </div>
                </div>
                    @empty
                    <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
                </div>
                @endforelse
        </div>
    </div>
</x-app-layout>