@extends('master')

@section('content')
    <div class="container mt-4">

        <h3>Data Timesheet</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Karyawan</th>
                    <th>Proposal Number</th>
                    <th>Service Name</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Total Jam</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($timesheets as $t)
                    <tr>
                        <td>{{ $t->date }}</td>

                        {{-- Karyawan dari DB HRD --}}
                        <td>{{ $t->employees?->fullname ?? '-' }}</td>

                        {{-- Proposal terkait serviceused --}}
                        <td>{{ $t->serviceused?->proposal?->number ?? '-' }}</td>

                        {{-- Nama service --}}
                        <td>{{ $t->serviceused?->service_name ?? '-' }}</td>

                        <td>{{ $t->timestart }}</td>
                        <td>{{ $t->timefinish }}</td>
                        <td>{{ $t->total_jam }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection
