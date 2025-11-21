@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Edit Employee</h3>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $employee->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Posisi</label>
                <input type="text" name="position" value="{{ $employee->position }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
