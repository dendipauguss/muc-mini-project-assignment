@extends('master')

@section('content')
    <div class="container mt-4">

        <h3>Tambah Proposal</h3>

        <form action="{{ route('proposal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Number</label>
                <input type="text" class="form-control" name="number" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label>Year</label>
                <input type="number" class="form-control" name="year" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select class="form-control" name="status" required>
                    <option value="pending">Pending</option>
                    <option value="agreed">Agreed</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('proposal.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
@endsection
