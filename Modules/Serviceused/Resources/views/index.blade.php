@extends('master')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <h2>Serviceused List</h2>
            </div>
        </div>
        <a href="{{ route('serviceused.create') }}" class="btn btn-primary mb-3">+ Tambah Serviceused</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($serviceuseds->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Proposal Number</th>
                            <th>Nama Service</th>
                            <th>Status</th>
                            <th>Timespent</th>
                            <th width="160">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($serviceuseds as $su)
                            <tr>
                                <td>{{ $su->proposal->number }}</td>
                                <td>{{ $su->service_name }}</td>
                                <td>
                                    <span
                                        class="badge @if ($su->status == 'pending') bg-warning
                                      @elseif($su->status == 'ongoing')bg-info
                                      @else bg-success @endif">
                                        {{ ucfirst($su->status) }}
                                    </span>
                                </td>
                                <td>{{ $su->timespent }}</td>
                                <td>
                                    <a href="{{ route('serviceused.edit', $su->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('serviceused.delete', $su->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                No serviceuseds found.
            </div>
        @endif

    </div>
@endsection
