@extends('master')

@section('content')
    <div class="container mt-4">
        <h3>Data Serviceused</h3>

        <a href="{{ route('serviceused.create') }}" class="btn btn-primary mb-3">+ Tambah Serviceused</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proposal Number</th>
                    <th>Nama Service</th>
                    <th>Status</th>
                    <th>Timespent</th>
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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
