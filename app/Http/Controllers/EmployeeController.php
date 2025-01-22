<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query = Employee::query();

            if ($request->has('filter_type') && $request->has('filter_value') && $request->filter_value != '') {
                $query->where($request->filter_type, 'like', '%' . $request->filter_value . '%');
            }

            $employees = $query->paginate(10);

            return view('employees.index', compact('employees'));
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'document' => 'required|string|max:14|unique:employees',
                'vehicle_plate' => 'nullable|string|max:255',
                'active' => 'nullable|boolean',
                'enterprise' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'code' => 'required|string|max:255|unique:employees',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->all();

            if ($request->hasFile('picture')) {
                $data['picture'] = $request->file('picture')->store('pictures', 'public');
            }

            Employee::create($data);
            return redirect()->route('employees.index')->with('alert', ['class' => 'success', 'message' => 'Funcionário criado com sucesso!']);
        } catch (\Exception $exception) {
            dd($exception);
        }
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
            'name' => 'required|string|max:255',
            'document' => 'required|string|max:14|unique:employees,document,' . $employee->id,
            'vehicle_plate' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'enterprise' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:employees,code,' . $employee->id,
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('picture')) {
            if ($employee->picture) {
                if(!Storage::disk('public')->delete($employee->picture))
                    return redirect()->route('employees.index')->with('alert', ['class' => 'red', 'message' => 'Erro ao excluir foto do usuário']);
            }
            $data['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $employee->update($data);
        return redirect()->route('employees.index')->with('alert', ['class' => 'success', 'message' => 'Funcionário atualizado com sucesso!']);
    }

    public function destroy(Employee $employee)
    {
        if ($employee->picture) {
            if(!Storage::disk('public')->delete($employee->picture)) {
                return redirect()->route('employees.index')->with('alert', ['class' => 'red', 'message' => 'Erro ao excluir foto do usuário']);
            }
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('alert', ['class' => 'success', 'message' => 'Funcionário excluído com sucesso!']);
    }
}