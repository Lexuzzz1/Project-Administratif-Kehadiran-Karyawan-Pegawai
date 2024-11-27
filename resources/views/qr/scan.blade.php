@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">Generate QR Code Absensi</h1>
        <p class="lead text-muted">Masukkan nama untuk menghasilkan QR Code absensi Anda</p>
    </div>

    <!-- Form untuk memasukkan data untuk QR Code -->
    <form action="{{ route('qrCode.generateQrCode') }}" method="POST" class="shadow-lg p-4 rounded-lg bg-white">
        @csrf

        <!-- Input Field -->
        <div class="form-group mb-4">
            <label for="data" class="font-weight-bold">Masukkan Nama untuk QR Code</label>
            <input type="text" class="form-control" id="data" name="data" required placeholder="Nama Lengkap" 
                   aria-describedby="dataHelp">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block py-2 mt-3">
            <i class="fas fa-qrcode"></i> Generate QR Code
        </button>
    </form>

    <!-- Display Generated QR Code -->
    @if(isset($qrCode))
        <div class="mt-5 text-center">
            <h4>QR Code Anda:</h4>
            <div class="qr-code-display">
                {!! $qrCode !!}
            </div>
        </div>
    @endif

</div>

@endsection

@push('styles')
    <style>
        /* Custom Styles */
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .qr-code-display {
            margin-top: 20px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Custom JS (if needed)
    </script>
@endpush
