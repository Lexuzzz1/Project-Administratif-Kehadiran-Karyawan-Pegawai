@extends('layouts.master')

@section('web-content')
<div class="container mt-5">
    <h1>QR Code Scanner</h1>

    <!-- Camera Selector -->
    <div class="mb-3">
        <label for="camera-select" class="form-label">Select Camera</label>
        <select id="camera-select" class="form-select">
            <option value="" disabled selected>Detecting cameras...</option>
        </select>
    </div>

    <!-- QR Code Reader -->
    <div id="reader" style="width: 300px; height: 300px; margin: auto; border: 1px solid #ccc;"></div>


    <!-- Include Html5Qrcode Library -->
    <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ensure Html5Qrcode library is loaded
            if (typeof Html5Qrcode === 'undefined') {
                console.error("Html5Qrcode library is not loaded.");
                alert("Html5Qrcode library is not loaded. Please check your network or library inclusion.");
                return;
            }

            const reader = new Html5Qrcode("reader");
            const cameraSelect = document.getElementById("camera-select");
            const resultElement = document.getElementById("result");

            // Fetch Available Cameras
            Html5Qrcode.getCameras().then((devices) => {
                if (devices && devices.length > 0) {
                    cameraSelect.innerHTML = ""; // Clear default options

                    // Add available cameras to the dropdown
                    devices.forEach((device) => {
                        const option = document.createElement("option");
                        option.value = device.id;
                        option.textContent = device.label || `Camera ${cameraSelect.length + 1}`;
                        cameraSelect.appendChild(option);
                    });

                    // Automatically select the first camera
                    cameraSelect.value = devices[0].id;
                    cameraSelect.dispatchEvent(new Event("change")); // Trigger scanning
                } else {
                    alert("No cameras detected. Please connect a camera.");
                }
            }).catch((err) => {
                console.error("Camera detection failed:", err);
                alert("Failed to detect cameras. Please check device permissions.");
            });

            // Start Scanning on Camera Change
            cameraSelect.addEventListener("change", function () {
                const cameraId = cameraSelect.value;

                // Stop any existing scanner before starting a new one
                if (reader.isScanning) {
                    reader.stop().catch(err => console.error("Failed to stop scanner:", err));
                }

                reader.start(
                    cameraId,
                    {
                        fps: 10, // Frames per second
                        qrbox: { width: 250, height: 250 }, // Scanning box size
                    },
                    (decodedText) => {
                        console.log("Scanned text:", decodedText);

                        // Send the decoded text to the backend
                        window.location.href = (`/qr-scanner/${decodedText}`);
                            
                    },
                    (errorMessage) => {
                        // Handle scan errors
                        console.warn("QR Code scan error:", errorMessage);
                    }
                ).catch(err => {
                    console.error("Failed to start scanner:", err);
                    alert("Failed to start the camera. Please check your device settings.");
                });
            });
        });
    </script>
</div>
@endsection
