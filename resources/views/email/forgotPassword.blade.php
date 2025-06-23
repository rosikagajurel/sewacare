<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password - SewaCare</title>
</head>
<body>
    <h2>Hello!</h2>
    <p>You requested a password reset for your account.</p>

    @if(isset($token))
        <p>Click the link below to reset your password:</p>
        <p><a href="{{ url('/resetpassword/' . $token) }}">Reset Password</a></p>
    @else
        <p style="color:red;">Token not found.</p>
    @endif

    <p>If you did not request this, you can safely ignore this email.</p>

    <p>— SewaCare Team</p>
</body>
</html>
