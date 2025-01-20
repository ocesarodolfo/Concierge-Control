<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('nome') && $request->nome != '') {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('cpf') && $request->cpf != '') {
            $query->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        if ($request->has('cargo') && $request->cargo != '') {
            $query->where('cargo', 'like', '%' . $request->cargo . '%');
        }

        if ($request->has('departamento') && $request->departamento != '') {
            $query->where('departamento', 'like', '%' . $request->departamento . '%');
        }

        if ($request->has('id_cracha') && $request->id_cracha != '') {
            $query->where('id_cracha', 'like', '%' . $request->id_cracha . '%');
        }

        $employees = $query->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:employees',
            'cargo' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'id_cracha' => 'required|string|max:255|unique:employees',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:employees,cpf,' . $employee->id,
            'cargo' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'id_cracha' => 'required|string|max:255|unique:employees,id_cracha,' . $employee->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            if ($employee->foto) {
                Storage::disk('public')->delete($employee->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->foto) {
            Storage::disk('public')->delete($employee->foto);
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}