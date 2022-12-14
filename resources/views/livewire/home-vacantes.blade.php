<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-center md:text-start font-extrabold text-4xl text-gray-700 mb-6">Nuestras vacantes disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-4">
                        <div class="md:flex-1">
                            <a class="text-2xl font-bold text-gray-600" href="{{ route('vacantes.show', $vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-sm font-bold text-gray-600 mb-3">{{ $vacante->empresa }}</p>
                            <p class="text-xs font-bold text-gray-700">Último día para postularse: <span class="font-normal text-gray-600">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class=" bg-indigo-500 hover:bg-indigo-600 p-3 text-sm font-bold rounded-lg text-white block text-center" href="{{ route('vacantes.show', $vacante->id) }}"> Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">Aún no hay vacantes disponibles</p>
                @endforelse
            </div>
        </div>
    </div>
</div>