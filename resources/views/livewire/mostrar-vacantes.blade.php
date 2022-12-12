<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
            <div class="space-y-3">   
                <a href="#" class="text-xl font-bold">{{ $vacante->titulo }}</a> 
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>  
                <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>               
            </div>

            <div class="flex flex-col md:flex-row items-stretch gap-3 items-center mt-5 md:mt-0 text-center">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold">Candidatos</a>
                <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold">Editar</a>
                <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold">Eliminar</a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes para mostrar</p>
    @endforelse
</div>

<div class="mt-10">
    {{ $vacantes->links() }}
</div>