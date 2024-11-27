@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Halaman Absen QR</h1>
        <img src="{{ route('qr.generate') }}" alt="Generated QR Code" />

    </div>
@endsection
