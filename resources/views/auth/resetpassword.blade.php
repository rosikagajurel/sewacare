<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="POST" action="{{ route('auth.resetpassword.submit') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>New Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
