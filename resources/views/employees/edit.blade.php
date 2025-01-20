@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Funcionário</h1>

        <!-- Formulário -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Inclui o formulário parcial -->
            @include('employees._form')

            <!-- Botões de ação -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Atualizar
                </button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </form>
    </div>
@endsection