<div class="gb-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postular a esta Vacante</h3>

    <form class="w-96 mt-5" action="">
        <div class="mb-4">
            <x-input-label for="cv" value="{{__('Hoja de vida (PDF)')}}"/>
            <x-text-input   id="cv" 
                            class="block mt-1 w-full" 
                            type="file" 
                            accept=".pdf"/>
        </div>
    </form>
</div>
