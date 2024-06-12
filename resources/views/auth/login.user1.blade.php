<!-- resources/views/auth/login_user1.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login to Your Account</h2>
    <form>
        @csrf
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="button" onclick="login()">Login</button>
    </form>

    <script>
        function login() {
            // Redirect langsung ke halaman pengguna
            window.location.href = '/pengguna/dashboard';
        }
    </script>
</body>
</html>
