<?php

require_once '../includes/header.php';
require_once './carsouel.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Blogs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blogs.css" rel="stylesheet" />
    <style>
        .comments-section {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding-left: 10px;
            padding-right: 10px;
        }

        .add-comment-section {
            position: sticky;
            bottom: 0;
            background: #fff;
        }

        .comment {
            border-bottom: 1px solid #ddd;
        }

        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="blogs-container">
            <div class="row">
                <?php
                include('../db/conn.php');
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $sql = "SELECT blog_id, image, user_email, title, content, created_at FROM blogs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $fullPath = $row["image"];



                        echo '
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img class="card-img-top" src="/FinalProjectAaysha/images/' . $fullPath . '" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($row["title"]) . '</h5>
                                    <p class="card-text">' . htmlspecialchars(substr($row["content"], 0, 100)) . '...</p>
                                    <p class="card-text"><small class="text-muted">Posted on ' . htmlspecialchars($row["created_at"]) . '</small></p>
                                    <a href="view_blog.php?blog_id=' . htmlspecialchars($row["blog_id"]) . '" class="btn btn-primary">Read More</a>
                                    <button class="btn btn-secondary" onclick="toggleComments(' . htmlspecialchars($row["blog_id"]) . ')">View Comments</button>
                                    <form action="delete_blog.php" method="POST" class="mt-3">
                                        <input type="hidden" name="blog_id" value="' . htmlspecialchars($row["blog_id"]) . '">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <div id="comments-' . htmlspecialchars($row["blog_id"]) . '" class="comments-section mt-3" style="display: none;">
                                        <div class="comments-list">';

                        $comment_sql = "SELECT useremail, comment, created_at FROM comments WHERE blog_id = " . intval($row["blog_id"]);
                        $comment_result = $conn->query($comment_sql);

                        if ($comment_result->num_rows > 0) {
                            while ($comment_row = $comment_result->fetch_assoc()) {
                                echo '
                                <div class="comment mb-2">
                                    <p class="mb-1"><strong>' . htmlspecialchars($comment_row["useremail"]) . '</strong> said:</p>
                                    <p class="mb-1">' . htmlspecialchars($comment_row["comment"]) . '</p>
                                    <p class="text-muted"><small>Posted on ' . htmlspecialchars($comment_row["created_at"]) . '</small></p>
                                </div>';
                            }
                        } else {
                            echo '<p class="text-muted">No comments yet.</p>';
                        }

                        echo '
                                        </div>
                                        <div class="add-comment-section">
                                            <form action="add_comment.php" method="POST" class="mt-3">
                                                <input type="hidden" name="blog_id" value="' . htmlspecialchars($row["blog_id"]) . '">
                                                <div class="form-group">
                                                    <label for="comment">Add a comment:</label>
                                                    <textarea class="form-control" name="comment" rows="2" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No blogs found.</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleComments(blog_id) {
            var commentsSection = document.getElementById('comments-' + blog_id);
            if (commentsSection.style.display === 'none') {
                commentsSection.style.display = 'block';
            } else {
                commentsSection.style.display = 'none';
            }
        }
    </script>
</body>

</html>

<?php
require_once '../includes/footer.php';
?>