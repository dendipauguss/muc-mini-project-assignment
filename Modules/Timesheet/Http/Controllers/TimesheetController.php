<?php

namespace Modules\Timesheet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TimesheetController extends Controller
{
    public function index()
    {
        return view('timesheet::index');
    }

    public function create()
    {
        return view('timesheet::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('timesheet::show');
    }

    public function edit($id)
    {
        return view('timesheet::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
