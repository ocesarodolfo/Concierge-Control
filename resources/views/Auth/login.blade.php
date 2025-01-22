@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-50 to-purple-50">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <!-- Logo ou Título -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Login</h2>
                <p class="text-sm text-gray-600 mt-2">Acesse sua conta para continuar</p>
            </div>

            <!-- Formulário de Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Campo E-mail -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Login / E-mail</label>
                    <input type="text" name="email" id="email"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                           placeholder="Digite seu e-mail"
                           required autofocus>
                    @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Senha -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                           placeholder="Digite sua senha"
                           required>
                    @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botão de Entrar -->
                <div class="mb-6">
                    <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                        Entrar
                    </button>
                </div>

                <!-- Link para Esqueci a Senha -->
                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:text-blue-700 transition duration-200">
                        Esqueceu sua senha?
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection