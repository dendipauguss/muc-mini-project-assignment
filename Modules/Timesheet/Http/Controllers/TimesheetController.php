<?php

namespace Modules\Timesheet\Http\Controllers;

use App\Models\activity\TimesheetModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TimesheetController extends Controller
{
    public function index()
    {
        // load employee + serviceused + proposal
        $timesheets = TimesheetModel::with([
            'employees',
            'serviceused.proposal'
        ])->get();

        // hitung total jam
        foreach ($timesheets as $t) {
            $start = strtotime($t->timestart);
            $end = strtotime($t->timefinish);
            $diff = $end - $start;

            $hours = floor($diff / 3600);
            $minutes = floor(($diff % 3600) / 60);

            $t->total_jam = sprintf('%02d:%02d', $hours, $minutes);
        }

        return view('timesheet::index', compact('timesheets'));
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
