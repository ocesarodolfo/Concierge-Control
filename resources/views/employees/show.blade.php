@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalhes do Funcionário</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $employee->nome }}</p>
                <p><strong>CPF:</strong> {{ $employee->cpf }}</p>
                <p><strong>Cargo:</strong> {{ $employee->cargo }}</p>
                <p><strong>Departamento:</strong> {{ $employee->departamento }}</p>
                <p><strong>ID Crachá:</strong> {{ $employee->id_cracha }}</p>
                @if($employee->foto)
                    <p><strong>Foto:</strong></p>
                    <img src="{{ asset('storage/' . $employee->foto) }}" alt="Foto do Funcionário" width="150">
                @endif
            </div>
        </div>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection