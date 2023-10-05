<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index',
            ['departments' => $departments]
        );
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $department = new Department($request->all());
        $department->save();
        return redirect()->route('admin.departments.index');
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit',
            ['department' => $department]
        );
    }

    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);
        $department->fill($request->all());
        $department->save();
        return redirect()->route('admin.departments.index');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('admin.departments.index');
    }
}
