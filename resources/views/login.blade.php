<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="login-container">    
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="form-email">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-password">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="register">
                <p>Don't have an account? <a href="/register">Register here</a></p>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>