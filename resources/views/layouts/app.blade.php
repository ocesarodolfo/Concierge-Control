<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Portaria</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="sticky top-0 w-full bg-gray-800 text-white z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{ url('/') }}" class="text-xl font-semibold">Sistema de Portaria</a>
            <div class="flex items-center space-x-4">
                @if(auth()->check())
                    <div class="relative">
                        <button id="dropdownProfileToggle" class="flex items-center focus:outline-none">
                            <img src="https://readymadeui.com/profile_6.webp" class="w-8 h-8 rounded-full mr-2">
                            <span class="hidden md:block">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdownProfileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                <a href="{{ route('employees.index') }}" class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <!-- Ícone de funcionários (silhueta de pessoas) -->
                                        <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14 8a3 3 0 100-6 3 3 0 000 6zM7 11a5 5 0 00-5 5v2h10v-2a5 5 0 00-5-5zM14 11a5 5 0 015 5v2h-4v-2a1 1 0 00-1-1h-2a1 1 0 00-1 1v2h-4v-2a5 5 0 015-5z"></path>
                                    </svg>
                                    Funcionários
                                </a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                <a href="{{ route('dashboard') }}" class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                <a href="{{ route('logout') }}" class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

@if(session('alert'))
    <div id="notification" class="fixed top-6 z-[99] right-4 bg-{{ session('alert')['class'] }}-100 border border-{{ session('alert')['class'] }}-400 text-{{ session('alert')['class'] }}-700 px-4 py-3 rounded-lg shadow-lg" onclick="this.remove()">
        {{ session('alert')['message'] }}
    </div>
@endif

<!-- Conteúdo Principal -->
<div class="container mx-auto px-4 min-h-screen">
    @yield('content')
</div>

<!-- Conteúdo Principal -->
<div class="footer w-100 h-50 bg-slate-950 text-center text-white p-5 text-sm mt-3">
    <img src="" alt="">
    <p>Copyright © {{ date('Y') }}. Todos os direitos reservados</p>
    <p>Departamento de Tecnologia</p>
</div>

<!-- Scripts -->
<script>
    // Função para abrir e fechar o dropdown
    document.getElementById('dropdownProfileToggle').addEventListener('click', function() {
        const dropdownProfileMenu = document.getElementById('dropdownProfileMenu');
        dropdownProfileMenu.classList.toggle('hidden');
    });

    // Fechar dropdown ao clicar fora
    window.addEventListener('click', function(event) {
        const dropdownProfileToggle = document.getElementById('dropdownProfileToggle');
        const dropdownProfileMenu = document.getElementById('dropdownProfileMenu');
        if (!dropdownProfileToggle.contains(event.target) && !dropdownProfileMenu.contains(event.target)) {
            dropdownProfileMenu.classList.add('hidden');
        }
    });
</script>
</body>
</html>