<?php
include('../db/conn.php'); 
session_start(); 




$msg = '';
$redirect = false;
$existing_user = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number=$_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

  
    $check_user_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
    
        $msg = "You already have an account!";
        $redirect = true;
        $existing_user = true;
    } else {
    
        $insert_user_sql = "INSERT INTO users (username, email, password,phone_number) VALUES ('$username', '$email', '$password','$phone_number')";
        if ($conn->query($insert_user_sql) === TRUE) {
            $msg = "Account created successfully!";
            $redirect = true;
            $_SESSION['user_id'] = $email;
            $_SESSION['user_name'] = $username;
        } else {
            $msg = "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}

if ($redirect) {
    echo '
    <script>
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000);
    </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 300px;
        }

        .progress {
            height: 5px;
        }
    </style>
</head>

<body>
    <?php if ($redirect) : ?>
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
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"></div>
                </div>
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