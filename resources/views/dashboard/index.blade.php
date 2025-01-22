@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

        <!-- Cards de Métricas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total de Funcionários -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total de Funcionários</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalEmployees }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Novos Funcionários (Último Mês) -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Novos Funcionários (Último Mês)</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $newEmployeesLastMonth }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Funcionários Ativos -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Funcionários Ativos</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $activeEmployees }}</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Funcionários Inativos -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Funcionários Inativos</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $inactiveEmployees }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de Funcionários por Departamento -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Funcionários por Departamento</h2>
            <canvas id="departmentChart" class="mx-auto w-full lg:w-1/2 h-auto"></canvas>
        </div>

        <!-- Tabela de Funcionários Recentes -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Funcionários Recentes</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Nome</th>
                        <th class="px-4 py-2 text-left">Departamento</th>
                        <th class="px-4 py-2 text-left">Data de Cadastro</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentEmployees as $employee)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-300">
                            <td class="px-4 py-2">{{ $employee->name }}</td>
                            <td class="px-4 py-2">{{ $employee->department }}</td>
                            <td class="px-4 py-2">{{ $employee->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Incluindo Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Configuração do gráfico
        const employees = @json($employeeCounts); // Array de quantidades de funcionários
        const departments = @json($departments); // Array de departamentos
        const datasets = employees.map((count, index) => ({
            barThickness: 40,
            label: departments[index],
            data: [count],
            backgroundColor: [
                'rgba(59, 130, 246, 0.2)',
                'rgba(34, 197, 94, 0.2)',
                'rgba(249, 115, 22, 0.2)',
                'rgba(168, 85, 247, 0.2)',
                'rgba(239, 68, 68, 0.2)'
            ][index % 5], // Cor de fundo dinâmica
            borderColor: [
                'rgba(59, 130, 246, 1)',
                'rgba(34, 197, 94, 1)',
                'rgba(249, 115, 22, 1)',
                'rgba(168, 85, 247, 1)',
                'rgba(239, 68, 68, 1)'
            ][index % 5],
            borderWidth: 1,
        }));

        const ctx = document.getElementById('departmentChart').getContext('2d');
        const departmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Funcionários'],
                datasets: datasets
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                },
            }
        });
    </script>
@endsection