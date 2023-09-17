<?php
session_start();

include "koneksi/koneksi.php";


// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE 'id' = $id");

    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    $id = $_COOKIE['ui'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);

    if ($row["peran"] == 'siswa') {
        header("Location: tb_siswa/index.php");
        exit;
    } else if ($row["peran"] == 'guru') {
        header("Location: tb_guru/index.php");
        exit;
    } else if ($row["peran"] == 'karyawan') {
        header("Location: tb_karyawan/index.php");
        exit;
    } else {
        header("Location: logout.php");
        exit;
    }
}



if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' ");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek pw
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //(belum) buat if untuk admin dan user biasa agar diarahkan pada fitur berbeda

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {
                // coockie
                setcookie('ui', $row['id'], time() + 7200);
                setcookie('key', hash('sha256', $row['username']), time() + 7200);

            }

            if ($row["peran"] == 'siswa') {
                header("Location: tb_siswa/index.php");
                exit;
            } else if ($row["peran"] == 'guru') {
                header("Location: tb_guru/index.php");
                exit;
            } else if ($row["peran"] == 'karyawan') {
                header("Location: tb_karyawan/index.php");
                exit;
            }
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form Tabel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <meta name="description" content="">
    <meta name="author" content="Febry Anto, Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">





    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
        body {
            background: url(static/`iBUKI3.png);
            background-size: 100%;
            color: white;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto ">
        
        <?php if (isset($error)): ?>
            <p style="color: red; font-style: italic;">username/password salah!</p>
        <?php endif; ?>
        <form action="" method="POST" class="position-absolute top-50 start-50 w-25 translate-middle">
            <img class="mb-4" src="tb_siswa/static/4-removebg-preview.png" alt="" width="120" height="120">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" name="username" placeholder="name123">
                <label for="username" class="text-dark">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password" class="text-dark">Password</label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="remember-me" checked hidden>
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-light">© 2023</p>
        </form>
    </main>





</body>

</html>