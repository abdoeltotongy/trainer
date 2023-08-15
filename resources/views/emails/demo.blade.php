<!DOCTYPE html>
<html>

<head>
    <title> QR_code</title>
</head>

<body>
    <p>Your QR_code is: {{ $QR_code }}</p>
    <h1>QR Code Email</h1>
    <p>Here's your QR code:</p>
    {{-- <img src="data:image/png;base64,{{ base64_encode($QR_code) }}" alt="QR Code"> --}}
    <img src="{{ asset('frontend/images/employee.png') }}" alt="QR Code">

</body>

</html>
