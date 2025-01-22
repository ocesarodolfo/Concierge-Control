@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Detalhes do Funcionário</h1>

        <!-- Card principal -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                <!-- Layout flexível para foto e informações -->
                <div class="flex flex-col lg:flex-row lg:space-x-8">
                    <!-- Foto do funcionário -->
                    @if($employee->picture)
                        <div class="lg:w-1/3 mb-8 lg:mb-0">
                            <div class="flex justify-center lg:justify-start">
                                <img src="{{ asset('storage/' . $employee->picture) }}" alt="Foto do Funcionário"
                                     class="rounded-lg object-cover shadow-md hover:shadow-lg transition-shadow duration-300" width="300px">
                            </div>
                        </div>
                    @endif

                    <!-- Grid de informações -->
                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Card Nome -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Nome</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->name }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Autorizado -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-{{ $employee->active ? 'green-100' : 'pink-100' }} p-3 rounded-full">
                                    <svg class="w-6 h-6 text-{{ $employee->active ? 'green-500' : 'pink-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Autorizado</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ $employee->active ? 'Sim' : 'Não' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Documento -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Documento</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->document }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Placa do Veículo -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-indigo-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Placa do Veículo</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->vehicle_plate ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Empresa -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Empresa</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->enterprise }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Departamento -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-yellow-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Departamento</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->department }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card ID Crachá -->
                        <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="bg-red-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">ID Crachá</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $employee->code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações -->
        <div class="mt-8 gap-2 flex justify-end">
            <a href="{{ route('employees.index') }}"
               class="inline-flex items-center px-6 py-3 bg-gray-600 border border-transparent rounded-lg font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Voltar
            </a>
            <a href="{{ route('employees.edit', [$employee->id]) }}"
               class="inline-flex items-center px-6 py-3 bg-yellow-500 border border-transparent rounded-lg font-semibold text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
                Editar
            </a>
        </div>
    </div>
@endsection