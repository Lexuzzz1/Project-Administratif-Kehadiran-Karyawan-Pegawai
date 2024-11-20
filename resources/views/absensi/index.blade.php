@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Daftar Kehadiran</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Check In</th>
                {{-- <th>Created At</th>
                <th>Updated At</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($attendance as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->employee_id }}</td>
                    <td>{{ $item->check_in }}</td>
                    {{-- <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
