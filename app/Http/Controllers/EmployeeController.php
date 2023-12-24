<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(3);
        return view("employee.index", ["employees" => $employees]);
    }

    public function create()
    {
        return view("employee.form");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'section' => 'required|max:255'
        ]);
        if ($request->hasFile("image")) {
            $validatedData['image'] = $request->file("image")->store('images', 'public');
        }
        Employee::create($validatedData);

        return redirect()->route('employee.index');
    }

    public function show(Employee $employee)
    {
        return view("employee.show", ["employee" => $employee]);
    }

    public function edit(Employee $employee)
    {
        return view("employee.form", ["employee" => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'section' => 'required']);
        if ($request->hasFile("image")) {
            $validatedData['image'] = $request->file("image")->store('images', 'public');
        }
        $employee->update($validatedData);

        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
