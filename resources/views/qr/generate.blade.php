@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">QR Code Absensi Anda</h1>
    </div>

    <div id="qr-code-container" class="qr-code-display text-center">
        <p>Scan QR Code ini untuk mencatat presensi :</p>

        <div class="mt-4">
            {!! $qrCode !!}
        </div>

        <p class="text-muted mt-3">ID Karyawan: {{ $idKaryawan }}</p>
        <p class="text-muted mt-3">Nama: {{ $name }}</p>

        <div id="countdown" class="text-danger mt-4">
            Waktu tersisa: <span id="timer">02:00</span> menit
        </div>
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

        #countdown {
            font-size: 20px;
            font-weight: bold;
            transition: all 1ms ease; 
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Set countdown time (in seconds)
        let timeRemaining = 2 * 60; // 2 minutes in seconds
        const countdownElement = document.getElementById("timer");
        const qrCodeContainer = document.getElementById("qr-code-container");

        // Function to update the countdown
        function updateCountdown() {
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;

            // Create a string to display the remaining time
            const timeString = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            countdownElement.textContent = timeString;

            if (timeRemaining <= 0) {
                // Time's up, hide the QR code and stop the countdown
                qrCodeContainer.style.display = "none";
                clearInterval(countdownInterval);
            } else {
                timeRemaining--;
                console.log(timeRemaining);
            }
        }
        const countdownInterval = setInterval(updateCountdown, 1000);

        updateCountdown();
    </script>
@endpush
