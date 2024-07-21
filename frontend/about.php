<?php
require_once '../includes/header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Travel & Blog</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Raleway', sans-serif;
    }
    .about-section {
      padding: 60px 0;
      background: #f8f9fa;
    }
    .about-section h1 {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 40px;
    }
    .about-img {
      max-width: 100%;
      border-radius: 10px;
    }
    .team-member {
      margin-bottom: 30px;
    }
    .team-member img {
      border-radius: 50%;
      max-width: 100%;
    }
    .team-member h4 {
      font-size: 1.25rem;
      font-weight: 600;
      margin-top: 20px;
    }
    .team-member p {
      font-size: 1rem;
      color: #6c757d;
    }
    .team {
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <section class="about-section text-center">
    <div class="container">
      <h1>About Us</h1>
      <p class="lead">Welcome to our travel and blogging website! We are passionate travelers and enthusiastic bloggers who love to explore the world and share our experiences.</p>
      <div class="row mt-5">
        <div class="col-md-4">
          <img src="../images/16.jpg" alt="Travel Image 1" class="about-img">
        </div>
        <div class="col-md-4">
          <img src="../images/12.jpg" alt="Travel Image 2" class="about-img">
        </div>
        <div class="col-md-4">
          <img src="../images/15.jpg" alt="Travel Image 3" class="about-img">
        </div>
      </div>
      <div class="team text-center mt-5">
        <h2>Meet Our Team</h2>
        <div class="row ">
          <div class="col mx-auto team-member">
            <img src="https://via.placeholder.com/200" alt="Team Member 1">
            <h4>Aaysha Malik</h4>
            <p>Student At Algomau University</p>
          </div>
         
        
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once '../includes/footer.php';
?>
