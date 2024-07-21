<?php
include('../db/conn.php');

include('../includes/header.php');



if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];

    $sql = "SELECT image ,title, content, created_at FROM blogs WHERE blog_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $image = $row["image"];
        $content = $row["content"];
        $created_at = $row["created_at"];
    } else {
        echo "Blog not found";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid blog ID";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blog-container {
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .blog-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .blog-title {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .blog-date {
            color: #6c757d;
        }

        .blog-body {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container blog-container">
        <div class="row">

            <div class="col-12 blog-header">
                <h1 class="blog-title"><?php echo $title; ?></h1>
                <p class="blog-date">Posted on <?php echo date("F j, Y, g:i a", strtotime($created_at)); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="/FinalProjectAaysha/images/<?php echo $image  ?>" alt="Blog Image" class="img-fluid">
            </div>
        </div>
        <div class="row blog-body">
            <div class="col-12 blog-content">
                <?php echo nl2br($content); ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include('../includes/footer.php');
?>