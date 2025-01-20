@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Funcionários</h1>

        <!-- Formulário de Filtro -->
        <form action="{{ route('employees.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ request('nome') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ request('cpf') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="{{ request('cargo') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="departamento" class="form-control" placeholder="Departamento" value="{{ request('departamento') }}">
                </div>
                <div class="col-md-2">
                    <input type="text" name="id_cracha" class="form-control" placeholder="ID Crachá" value="{{ request('id_cracha') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Adicionar Funcionário</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>ID Crachá</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->nome }}</td>
                    <td>{{ $employee->cpf }}</td>
                    <td>{{ $employee->cargo }}</td>
                    <td>{{ $employee->departamento }}</td>
                    <td>{{ $employee->id_cracha }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection