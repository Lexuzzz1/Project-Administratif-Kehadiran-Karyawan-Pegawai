@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">Generate QR Code</h1>
        <p class="lead text-muted">Masukkan nama Anda untuk menghasilkan QR Code.</p>
    </div>

    <!-- Form to input name -->
    <form action="{{ route('qrCode.generateQRCode') }}" method="POST" class="text-center">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate QR Code</button>
    </form>

    <!-- Display QR Code for the entered name -->
    @isset($qrCode)
        <div class="text-center mt-4">
            <h4>QR Code untuk Nama: {{ $name }}</h4>
            <div class="qr-code-display">
                {!! $qrCode !!}
            </div>
        </div>
    @endisset

    <!-- Feedback for scanning result -->
    <div id="result" class="text-center mt-4">
        <h5 class="text-success" style="display: none;">Presensi berhasil tercatat!</h5>
    </div>
</div>

@endsection

@push('styles')
    <style>
        .qr-code-display {
            margin-top: 20px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
