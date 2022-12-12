<div class="p-5">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">{{ $vacante->titulo }}</h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase">Empresa: <span class="normal-case font-normal">{{ $vacante->empresa }}</span></p>
            <p class="font-bold text-sm uppercase">Ultimo día para postularse: <span class="normal-case font-normal">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span></p>
            <p class="font-bold text-sm uppercase">Categoria: <span class="normal-case font-normal">{{ $vacante->categoria_id }}</span></p>
            <p class="font-bold text-sm uppercase">Salario: <span class="normal-case font-normal">{{ $vacante->salario_id }}</span></p>
        </div>
    </div>
</div>
