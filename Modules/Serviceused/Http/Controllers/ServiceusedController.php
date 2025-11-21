<?php

namespace Modules\Serviceused\Http\Controllers;

use App\Models\marketing\ServiceusedModel;
use App\Models\marketing\ProposalModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ServiceusedController extends Controller
{
    public function index()
    {
        $serviceuseds = ServiceusedModel::with('proposal', 'timesheet')->get();

        // hitung timespent per serviceused
        foreach ($serviceuseds as $su) {

            $totalSeconds = 0;

            foreach ($su->timesheet as $t) {
                $start = strtotime($t->timestart);
                $end = strtotime($t->timefinish);

                $totalSeconds += ($end - $start);
            }

            // konversi detik ke hh:mm
            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);

            $su->timespent = sprintf('%02d:%02d', $hours, $minutes);
        }

        return view('serviceused::index', compact('serviceuseds'));
    }

    public function create()
    {
        $proposals = ProposalModel::all(); // untuk dropdown

        return view('serviceused::create', compact('proposals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required',
            'service_name' => 'required',
            'status' => 'required',
        ]);

        ServiceusedModel::create([
            'proposal_id' => $request->proposal_id,
            'service_name' => $request->service_name,
            'status' => $request->status,
        ]);

        return redirect()->route('serviceused.index')
            ->with('success', 'Serviceused berhasil ditambahkan!');
    }

    public function show($id)
    {
        return view('serviceused::show');
    }

    public function edit($id)
    {
        $serviceused = ServiceusedModel::findOrFail($id);
        $proposals = ProposalModel::all();

        return view('serviceused::edit', compact('serviceused', 'proposals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proposal_id' => 'required',
            'service_name' => 'required',
            'status' => 'required'
        ]);

        $serviceused = ServiceusedModel::findOrFail($id);
        $serviceused->update($request->all());

        return redirect()->route('serviceused.index')
            ->with('success', 'Serviceused berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $su = ServiceusedModel::findOrFail($id);
        $su->delete();

        return redirect()->route('serviceused.index')
            ->with('success', 'Serviceused berhasil dihapus!');
    }
}
