<?php
require_once '../includes/header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/signupform.css" />
</head>

<body>

    <div class="container signup-container">
        <div class="signup-form">
            <h2 class="text-center">User SignUp</h2>
            <form action="./signup.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </div>
            </form>
            <div class="text-center">Already have an account? <a href="./loginform.php">Log in</a></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
require_once '../includes/footer.php';
?>