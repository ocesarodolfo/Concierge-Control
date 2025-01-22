<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Importe o modelo Employee
use Illuminate\Support\Facades\DB; // Para usar consultas SQL personalizadas

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::select(['id', 'active'])->get();

        // Total de Funcionários
        $totalEmployees = $employees->count('id');

        // Novos Funcionários (Último Mês)
        $newEmployeesLastMonth = Employee::where('created_at', '>=', now()->subMonth())->count('id');

        $activeEmployees = $employees->where('active', 1)->count('id');
        $inactiveEmployees = $employees->where('active', 0)->count('id');

        $employeesByEnterprizes = Employee::select('enterprise', DB::raw('count(id) as total'))
            ->groupBy('enterprise')
            ->get();

        // Funcionários Recentes (últimos 5 cadastrados)
        $recentEmployees = Employee::orderBy('created_at', 'desc')->take(5)->get();

        // Preparar dados para o gráfico
        $enterprizes = $employeesByEnterprizes->pluck('enterprise');
        $employeeCounts = $employeesByEnterprizes->pluck('total');

        return view('dashboard.index', [
            'totalEmployees' => $totalEmployees,
            'newEmployeesLastMonth' => $newEmployeesLastMonth,
            'activeEmployees' => $activeEmployees,
            'inactiveEmployees' => $inactiveEmployees,
            'departments' => $enterprizes,
            'employeeCounts' => $employeeCounts,
            'recentEmployees' => $recentEmployees,
        ]);
    }
}