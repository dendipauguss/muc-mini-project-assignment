<?php

namespace Modules\Proposal\Http\Controllers;

use App\Models\marketing\ProposalModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = ProposalModel::get();


        return view('proposal::index', compact('proposals'));
    }

    public function create()
    {
        return view('proposal::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'description' => 'required',
            'year' => 'required|integer',
            'status' => 'required'
        ]);

        ProposalModel::create($request->all());

        return redirect()->route('proposal.index')
            ->with('success', 'Proposal berhasil dibuat!');
    }

    public function show($id)
    {
        return view('proposal::show');
    }

    public function edit($id)
    {
        return view('proposal::edit');
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
