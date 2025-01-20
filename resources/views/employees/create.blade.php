@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Adicionar Funcionário</h1>
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('employees._form')
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar</button>
        </form>
    </div>
@endsection