<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Me va a traer todos los registros y me los mostrara en la vista Departments/Index
        $departments = Department::all();
        return Inertia::render('Departments/Index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //al momento de darle crear me direccionara a la carpeta Departments/Index
        return Inertia::render('Departments/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //En caso de que se valide el campo requerido se guardara la informacion
        $request->validate(['name' => 'required|max:100']);
        $department = new Department($request->input());
        $department->save();
        return redirect('departments');
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
        //me enviara a la vista de la carpeta Departments/Edit
        return Inertia::render('Departments/Edit',['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
            //En caso de que se valide el campo requerido se guardara la informacion
            $request->validate(['name' => 'required|max:100']);
            $department->update($request->all());
            return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //me eliminara los registros y me direccionara a la ruta departments
        $department->delete();
        return redirect('departments');

    }
}
