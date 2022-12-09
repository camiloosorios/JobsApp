<form action="" class="md:w-1/2 space-y-5">
    <!-- Título de la vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Título')" />
        <x-text-input   id="titulo" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="titulo" 
                        :value="old('titulo')"
                        placeholder="Título de la Vacante"/>
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <!-- Descripción del cargo -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Cargo')" />
        <textarea   name="descricion" 
                    placeholder="Descripción del cargo, Experiencia, Requerimientos, etc."
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm h-48"
        ></textarea>
    </div>

    <!-- Salasio de la vacante -->
    <div>
        <x-input-label for="salario" :value="__('Salario')" />
        <select name="salario" id="salario" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">Seleccione una opción</option>
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <!-- Categoria de la vacante -->
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select name="categoria" id="categoria" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">Seleccione una opción</option>
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!-- Nombre empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input   id="empresa" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="empresa" 
                        :value="old('empresa')"
                        placeholder="Nombre de la Empresa"/>
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <!-- Fecha límite de postulación -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Fecha límite de postulación')" />
        <x-text-input   id="ultimo_dia" 
                        class="block mt-1 w-full" 
                        type="date" 
                        name="ultimo_dia" 
                        :value="old('ultimo_dia')"/>
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <!-- Título de la vacante -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input   id="imagen" 
                        class="block mt-1 w-full" 
                        type="file" 
                        name="imagen"/>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button class="w-full justify-center">
        Crear Vacante
    </x-primary-button>
</form>
