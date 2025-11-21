@extends('master')

@section('content')
    <div class="container mt-4">
        <h3>Edit Serviceused</h3>

        <form action="{{ route('serviceused.update', $serviceused->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Proposal</label>
                <select name="proposal_id" class="form-control" required>
                    @foreach ($proposals as $p)
                        <option value="{{ $p->id }}" {{ $serviceused->proposal_id == $p->id ? 'selected' : '' }}>
                            {{ $p->number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Service</label>
                <input type="text" class="form-control" name="service_name" value="{{ $serviceused->service_name }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $serviceused->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="ongoing" {{ $serviceused->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="done" {{ $serviceused->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('serviceused.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
@endsection
