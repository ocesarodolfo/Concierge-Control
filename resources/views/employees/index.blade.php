@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <!-- Formulário de Filtro -->
        <form action="{{ route('employees.index') }}" method="GET" class="mb-6 bg-white p-4 pb-0 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-4">Lista de Funcionários</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Select para escolher o tipo de filtro -->
                <select name="filter_type" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="name" {{ request('filter_type') == 'name' ? 'selected' : '' }}>Nome</option>
                    <option value="document" {{ request('filter_type') == 'document' ? 'selected' : '' }}>Documento</option>
                    <option value="enterprise" {{ request('filter_type') == 'enterprise' ? 'selected' : '' }}>Empresa</option>
                    <option value="department" {{ request('filter_type') == 'department' ? 'selected' : '' }}>Departamento</option>
                    <option value="code" {{ request('filter_type') == 'code' ? 'selected' : '' }}>Crachá</option>
                </select>

                <!-- Campo de pesquisa -->
                <input type="text" name="filter_value" class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Digite para pesquisar" value="{{ request('filter_value') }}">

                <!-- Botão de filtrar -->
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">Filtrar</button>
            </div>

        <!-- Botão Adicionar Funcionário -->
            <div class="flex justify-end">
                <a href="{{ route('employees.create') }}" class="w-auto sm:w-100 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 my-2 inline-block">Novo Funcionário</a>
            </div>
        </form>

        <!-- Cards de Funcionários -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($employees as $employee)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <!-- Foto do Funcionário -->
                    <div class="p-4 flex justify-center">
                        @if($employee->picture)
                            <img src="{{ asset('storage/' . $employee->picture) }}" alt="Foto do Funcionário" class="object-cover rounded-lg" width="150px" height="150px">
                        @endif
                    </div>

                    <!-- Informações do Funcionário -->
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 flex items-center space-x-2">
                            <div class="d-inline w-4 h-4 bg-{{ $employee->active ? 'green' : 'red' }}-400 rounded-full animate-pulse me-2"></div> {{ $employee->name }}
                        </h2>
                        <p class="text-sm text-gray-600 mt-2"><strong>Documento:</strong> {{ $employee->document }}</p>
                        <p class="text-sm text-gray-600"><strong>Empresa:</strong> {{ $employee->enterprise }}</p>
                        <p class="text-sm text-gray-600"><strong>Departamento:</strong> {{ $employee->department }}</p>
                        <p class="text-sm text-gray-600"><strong>Crachá:</strong> {{ $employee->code }}</p>
                    </div>

                    <!-- Ações (Dropdown) -->
                    <div class="p-4 bg-gray-50 flex justify-end">
                        <div class="actions relative inline-block text-left">
                            <!-- Botão do Dropdown -->
                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" id="menu-button-{{ $employee->id }}" aria-expanded="true" aria-haspopup="true">
                                Ações
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Menu do Dropdown -->
                            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{ $employee->id }}" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 17l6 6 10-10"></path>
                                        </svg>
                                        Ver
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Editar
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" role="none" onsubmit="return confirm('Você tem certeza que deseja excluir esse usuário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButtons = document.querySelectorAll('.actions.relative button');

            dropdownButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const dropdownMenu = this.nextElementSibling;
                        dropdownMenu.classList.toggle('hidden');
                });
            });

            document.addEventListener('click', function () {
                dropdownButtons.forEach(button => {
                    const dropdownMenu = button.nextElementSibling;
                    if(dropdownMenu)
                    dropdownMenu.classList.add('hidden');
                });
            });
        });
    </script>
@endsection