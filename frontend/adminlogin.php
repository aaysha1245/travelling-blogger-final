<?php
session_start();

include('../db/conn.php');
include('../includes/header.php');

$msg = '';
$loginFailed = false;

if (isset($_SESSION['user_id'])) {
    $msg = "You are already logged in!";
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000);
    </script>';
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['email'];
                $_SESSION['user_name'] = $user['username'];

                $msg = " Admin Logged in successfully!";
                echo '
                <script>
                    setTimeout(function() {
                        window.location.href = "adminhome.php";
                    }, 2000);
                </script>';
            } else {
                $msg = "Invalid email or password1!";
                $loginFailed = true;
                echo '
                <script>
                    setTimeout(function() {
                        window.location.href = "adminloginform.php";
                    }, 2000);
                </script>';
            }
        } else {
            $msg = "Invalid email or password2!";
            $loginFailed = true;
            echo '
            <script>
                setTimeout(function() {
                    window.location.href = "adminloginform.php";
                }, 2000);
            </script>';
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Login Form</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/loginform.css" rel="stylesheet" />
    <style>
        .toast {
            position: fixed;
            top: 60px;
            right: 20px;
            min-width: 300px;
        }

        .progress {
            height: 5px;
        }
    </style>
</head>

<body>
    <?php if (!empty($msg)) : ?>
        <div class="toast" id="toastMsg" data-delay="3000">
            <div class="toast-header">
                <strong class="mr-auto text-primary">Notification</strong>
                <small>Just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo $msg; ?>
                <?php if ($loginFailed) : ?>
                    <div class="progress mt-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
</body>

</html>