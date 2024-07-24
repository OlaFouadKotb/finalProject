<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification</h2>
    <p>
        Dear {{ $user->full_name }},
        <br><br>
        Please click the following link to verify your email address:
        <br><br>
        <a href="{{ route('verify', $token) }}">Verify Email</a>
        <br><br>
        Thank you!
    </p>
</body>
</html>
