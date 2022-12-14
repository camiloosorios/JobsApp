<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center rounded-lg">
    <h3 class="text-center text-2xl font-bold my-4">Postular a esta Vacante</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm">
            {{ session('mensaje') }}
        </div>
    @else
        @if ($vacante->validarPostulacion($vacante))
            <div class="uppercase border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm">
                <p>Ya postulaste a esta oferta</p>
            </div>
        @else
            <form class="w-96 mt-5" wire:submit.prevent='postularme'>
                <div class="mb-4">
                    <x-input-label for="cv" value="{{__('Hoja de vida (PDF)')}}"/>
                    <x-text-input   id="cv" 
                    class="block mt-1 w-full" 
                    wire:model="cv"
                    type="file" 
                    accept=".pdf"/>
                    @error('cv')
                        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                    @enderror
                </div>
                <x-primary-button class="my-5">{{__('Postularme')}}</x-primary-button>
            </form>
        @endif
    @endif

</div>
