<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos Postulados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-2xl font-bold text-center mb-10 mt-5">Candidatos Postulados en: {{ $vacante->titulo }}</h1>
                <div class="md:flex md:justify-center p-5">                    
                    <ul class="divide-y divide-gray-200 w-full">
                        @forelse ($vacante->candidatos as $candidato)
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">
                                        {{ $candidato->user->name }}
                                    </p class="text-xl font-medium text-gray-800">
                                    <p class="text-sm text-gray-600">
                                        {{ $candidato->user->email }}
                                    </p class="text-xl font-normal text-gray-800">
                                    <p class="text-sm font-medium text-gray-700">
                                        Postulación {{ $candidato->created_at->diffForHumans() }}
                                    </p class="text-xl font-medium text-gray-800">
                                </div>
                                <div>
                                    <a href="{{ asset('storage/cv/' . $candidato->cv) }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-gray-200 hover:bg-gray-300" target="_blank" rel="noreferrer noopener"> Ver CV</a>
                                </div>
                            </li>
                        @empty
                            <p class="text-center text-gray-600">No hay aun candidatos</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>