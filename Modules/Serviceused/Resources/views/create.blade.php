@extends('master')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Serviceused</h3>

        <form action="{{ route('serviceused.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Proposal</label>
                <select name="proposal_id" class="form-control" required>
                    <option value="">-- pilih proposal --</option>
                    @foreach ($proposals as $p)
                        <option value="{{ $p->id }}">{{ $p->number }} - {{ $p->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Service</label>
                <input type="text" class="form-control" name="service_name" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('serviceused.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
