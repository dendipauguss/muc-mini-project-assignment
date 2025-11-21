@extends('master')

@section('content')
    <div class="container mt-4">
        <h3>Edit Employee</h3>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="fullname" id="fullname" value="{{ $employee->fullname }}" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- pilih status --</option>
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
