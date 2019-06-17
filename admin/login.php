<?php include_once '../sistem/koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Admin</title>
</head>
<body>
    <?php if ($_SESSION['pesan']): ?>
        <?= $_SESSION['pesan'] ?>
    <?php endif; ?>
    <form action="sistem/aksi_login.php" method="post">
        <input type="text" name="username" id="" placeholder="username" required>
        <input type="password" name="password" id="" placeholder="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>