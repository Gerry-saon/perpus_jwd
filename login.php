<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/login.css">
    <a href="https://developer.mozilla.org/docs/Web/CSS/background-image"></a>
</head>

<body>
    <div
        style="color: white; position: absolute; left: 510px; top:120px; font-size: 30px; background-color: #7a5010; border-radius: 4px;">
        <marquee>ADMIN PERPUSTAKAAN</marquee>
    </div>
    <div class="container">
        <h2>FORM Login </h2>
        <form method="POST" action="cek_login.php">
            <label>Username</label>
            <input type="text" name="user"></br>
            <label>Password</label>
            <input type="password" name="password"></br>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>