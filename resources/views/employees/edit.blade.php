@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Editar Funcionário</h1>

        <!-- Formulário -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-8">
            @csrf
            @method('PUT')

            <!-- Inclui o formulário parcial -->
            @include('employees._form')

            <!-- Botões de ação -->
            <div class="flex justify-between mt-8">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-500 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Atualizar
                </button>
                <a href="{{ route('employees.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-500 border border-transparent rounded-lg font-semibold text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Voltar
                </a>
            </div>
        </form>
    </div>
@endsection