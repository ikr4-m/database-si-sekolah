<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php
    require './constant.php';
    require './connection.php';
    session_start();
    if (!empty($_SESSION['si-login'])) {
        header('Location: dashboard.php');
    }
    ?>
</head>

<style>
    .login-box {
        background-color: white;
        width: 400px;
        border-radius: 20px;
        box-shadow: 0px 0px 20px -5px black;
    }

    .login-box h3 {
        margin-bottom: 19px;
    }

    .form input {
        text-align: center !important;
        margin-bottom: 10px;
    }
</style>

<body style="background-color:grey;overflow:hidden;">
    <div class="container d-flex" style="height:100vh">
        <div class="login-box m-auto p-2">
            <h3 class="w-100 text-center text-dark">
                Silahkan Login
            </h3>
            <form class="form" method="POST" action="index.php">
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                <input type="submit" value="Login" class="btn btn-secondary btn-block">
                <?php
                if (!empty($_POST['username'])) {
                    require './connection.php';
                    $password = md5($_POST['password']);
                    $query = mysqli_query($_MYSQLI, "SELECT * FROM tbl_admin WHERE username='$_POST[username]' AND password='$password'");
                    if (mysqli_num_rows($query) > 0) {
                        $_SESSION['si-login'] = true;
                        $_SESSION['si-username'] = $_POST['username'];
                        echo '<script>alert("Login berhasil!");document.location="dashboard.php";</script>';
                    } else {
                        echo '<script>alert("Login gagal!");document.location="index.php";</script>';
                        session_destroy();
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>