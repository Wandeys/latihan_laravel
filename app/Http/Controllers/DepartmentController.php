<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('department.index', [
            'title' => 'Department',
            'departments' => Department::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create', [
            'title' => 'Create Department',
            'departments' => Department::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
    ],[
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'department_id.required' => 'Program studi tidak boleh kosong',
        'department_id.exists' => 'Program studi yang dipilih tidak ditemukan',
       
    ]);


     Department::create($validated);
     return to_route('department.index')->withSuccess('Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
                return view('department.edit', [
            'title' => 'Edit Department',
            'departments' => Department::latest()->get(),
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
          $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
    ],[
        'name.required' => 'Nama tidak boleh kosong',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'department_id.required' => 'Program studi tidak boleh kosong',
        'department_id.exists' => 'Program studi yang dipilih tidak ditemukan',
       
    ]);


     $department->update($validated);
     return to_route('department.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
         $department->delete($department);
        return to_route('department.index')->withSuccess('Data berhasil dihapus');
    }
}
