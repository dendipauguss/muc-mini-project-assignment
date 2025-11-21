@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Employee List</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Employees</span>
                    <!-- <a href="{{ url('employees/create') }}" class="btn btn-primary btn-sm">Add New Employee</a> -->
                </div>
                <div class="card-body">
                    @if ($employees->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead align="center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width: 20%">Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->fullname ?? '-' }}</td>
                                            <td class="d-flex">
                                                {{-- {{ $employee->status ?? '-' }} --}}
                                                @if ($employee->status == 'active')
                                                    <span class="badge bg-success me-3">Active</span>
                                                @else
                                                    <span class="badge bg-secondary me-2">Inactive</span>
                                                @endif
                                                <form action="{{ route('employees.toggle-status', $employee->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @if ($employee->status == 'active')
                                                        <button class="badge bg-secondary border-0">Ubah ke
                                                            Inactive</button>
                                                    @else
                                                        <button class="badge bg-success border-0">Ubah ke Active</button>
                                                    @endif
                                                </form>
                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-warning btn-sm">Edit Status</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No employees found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
