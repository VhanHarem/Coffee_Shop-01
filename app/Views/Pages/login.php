<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="/login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <br>
            <button type="submit">Login</button>
            <button>Cancel</button>
        </form>
    </div>
    <div class="Signup-container">
        <h1>Sign up</h1>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="confirmpass">Confirm Password:</label>
            <input type="password" id="confirmpass" name="confirmpass" required>
            <br>
            <button type="submit">Sign up</button>
            <button>Cancel</button>
        </form>
    </div>
</body>
</html>