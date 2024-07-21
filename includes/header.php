<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_name = isset($_SESSION['user_id']) ? $_SESSION['user_name'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header with User Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .navbar {
            position: relative;
            z-index: 1;
            border-bottom: 4px solid darkgray;
            
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            right: 0;
            background-color: whitesmoke;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            opacity: 0.95;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: grey;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: darkgrey;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            border: none;
        }

        .openbtn:hover {
            background-color: black;
        }

        .sidebar-open {
            background-color: grey;
            border-radius: 8px;
        }

        .sidebar-open:hover {
            cursor: pointer;
            background-color: lightgrey;
            box-shadow: 0px 0px 4px black;


        }

        .user-icon img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 2px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D3D3D3;">
        <a class="navbar-brand" href="home.php"><b>Travelling Blogger</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1 mt-2 sidebar-open">
                    <a onclick="openNav()">
                        <div id="userContainer" class="d-flex align-items-center">
                            <div id="userIcon" class="user-icon ml-1">
                                <img src="../images/user.png" alt="User">
                            </div>
                            <div id="userName" style="margin-right:6px;">
                                <?php echo htmlspecialchars($user_name); ?>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="mySidebar" class="sidebar" style="background-color: #FAF9F6;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <hr>
        <a href="./signupform.php">User SignUp</a>
        <hr>
        <a href="../frontend/loginform.php">User Login</a>
        <hr>
        <a href="../frontend/logout.php">Logout</a>
        <hr>
        <a href="../frontend/addblog.php">Add Your Blog</a>
        <hr>
        <a href="../frontend/AdminLoginForm.php">Admin Login</a>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "20%";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }
    </script>
</body>

</html>