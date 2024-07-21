<?php
include('./conn.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: loginform.php');
    exit();
}

$msg = '';
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target_dir = "C:/xampp/htdocs/FinalProjectAaysha/images/";
    $target_file = $target_dir . basename($image); 
    $user_email = $_SESSION['user_id'];

    // Check if directory exists and is writable
    if (!is_dir($target_dir) || !is_writable($target_dir)) {
        $msg = "Upload directory does not exist or is not writable";
    } else {
        $stmt = $conn->prepare("INSERT INTO blogs (title, content, image, user_email, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $title, $content, $image, $user_email);

        if ($stmt->execute()) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $msg = "Blog uploaded successfully";
                $success = true;
            } else {
                $msg = "Failed to upload image";
            }
        } else {
            $msg = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if (isset($msg) && !empty($msg)) : ?>
        <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
            <?php echo $msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
                window.location.href = '../frontend/home.php';
            }, 3000);
        </script>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
