<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_name'])) {
    header('Location: loginform.php');
    exit();
}
require_once '../includes/header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/addblog.css" rel="stylesheet" />
</head>

<body>
    <div class="container  ">
        <div class="row justify-content-center">
            <div class="col ">
                <div class="form-container">
                    <h2 class="text-center">Add New Blog</h2>

                    <form action="../db/addblogdatabase.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <button type="submit" class="btn-primary ">Submit Blog</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
require_once '../includes/footer.php';
?>