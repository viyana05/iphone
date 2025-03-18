<?php

// membuat user dan pass default
$adminUsername = "viyana";
$adminPassword = "smkisfibjm";

// pengecekkan apakah ada data yang dikirim menggunakan method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; //mengambil nilai dari inputan user dan disimpan ke $username
    $password = $_POST["password"]; //mengambil nilai dari inputan pass dan disimpan ke $password

    if ($username === $adminUsername && $password === $adminPassword) {
        // ketika user dan pass benar halaman akan berpindah kehalaman beranda    
        header("Location: beranda.php");
        exit();
    } else {
        // pesan ketika user atau pass salah 
        $errorMsg = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            background-color: gray;
            /* Menambahkan warna background gray */
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: url('img/logo-iphone.jpeg') no-repeat center center;
            background-size: cover;
            margin-bottom: 10px;
        }

        .welcome-text {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container {
            width: 200px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 6px;
            font-size: 14px;
        }

        button {
            width: 40%;
            padding: 6px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            display: block;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            color: black;
        }

        button {
            width: 50%;
            display: block;
            margin: 10px 0 0 auto;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            color: black;
            cursor: pointer;
            text-align: center;
        }

        button:hover {
            opacity: 0.8;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="logo"></div>
    <div class="welcome-text">Selamat Datang di Iphone SMK ISFI </div>
    <div class="login-container">
        <form method="POST" action="">
            <!-- input untuk memasukkan user -->
            <input type="text" name="username" placeholder="Username" required>
            <!-- input untuk pass -->
            <input type="password" name="password" placeholder="Password" required>
            <!-- button untuk mengirim user dan pass yg telah diisi diatas -->
            <button type="submit">Login</button>
        </form>

        <!-- peringatan untuk user atau pass salah -->
        <?php if (isset($errorMsg)) {
            echo "<p class='error'>$errorMsg</p>";
        } ?>
    </div>
</body>

</html>