@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">QR Code Absensi Anda</h1>
    </div>

    <!-- QR Code Display -->
    <div class="qr-code-display text-center">
        <h4>QR Code Anda:</h4>
        <div class="mt-4">
            {!! $qrCode !!}
        </div>
    </div>

    <!-- QR Code Actions -->
    <div class="text-center mt-5">
        <a href="javascript:void(0)" class="btn btn-success mb-3" id="download-qr">
            <i class="fas fa-download"></i> Download QR Code
        </a>
    </div>
</div>

@endsection

@push('styles')
    <style>
        .qr-code-display {
            background-color: #f7f7f7;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .btn-success, .btn-info {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .btn-info:hover {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
    </style>
@endpush

