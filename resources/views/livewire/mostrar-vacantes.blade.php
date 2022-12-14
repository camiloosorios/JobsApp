<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
            <div class="space-y-3">   
                <a href="{{ route('vacantes.show', $vacante) }}" class="text-xl font-bold">{{ $vacante->titulo }}</a> 
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>  
                <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>               
            </div>

            <div class="flex flex-col md:flex-row items-stretch gap-3 items-center mt-5 md:mt-0 text-center">
                <a href="{{ route('candidatos.index', $vacante) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold">{{ $vacante->candidatos->count() }} @choice('Candidato|Candidatos', $vacante->candidatos->count())</a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold">Editar</a>
                <button wire:click="$emit('mostrarAlerta', {{ $vacante->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold">Eliminar</button>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes para mostrar</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

{{-- Se envia el script hacia el @stack del app.blade --}}
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Desea eliminar la vacante?',
                text: "¡Esta es una acción irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {

                //Emitir evento
                Livewire.emit('eliminarVacante', vacanteId);

                Swal.fire(
                '¡Vacante eliminada!',
                'La vacante ha sido eliminada correctamente.',
                'success'
                )
            }
            })
        })

    </script>
@endpush