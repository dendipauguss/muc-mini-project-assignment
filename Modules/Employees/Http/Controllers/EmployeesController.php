<?php

namespace Modules\Employees\Http\Controllers;

use App\Models\hrd\EmployeesModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {
        // Ambil data dari database HRD
        $employees = EmployeesModel::get();


        return view('employees::index', compact('employees'));
    }

    public function create()
    {
        return view('employees::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $employee = DB::connection('mysql_hrd')
            ->table('employees')
            ->where('id', $id)
            ->first();

        return view('employees::show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = EmployeesModel::findOrFail($id);

        return view('employees::edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = EmployeesModel::findOrFail($id);

        $request->validate([
            'fullname' => 'required',
            'status' => 'required'
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        //
    }

    public function toggleStatus($id)
    {
        $employee = EmployeesModel::findOrFail($id);

        // Tentukan status baru
        $employee->status = $employee->status === 'active'
            ? 'inactive'
            : 'active';

        $employee->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
}
