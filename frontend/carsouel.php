<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel with Text</title>
 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet" />
</head>

<body>

    <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../images/IMG_9.jpeg" alt="First slide">
                    <div class="carousel-caption-left-bottom">
                    "The world is a book and those who do not <br> travel read only one page." <br>– <i>Augustine of Hippo</i>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/IMG_5.jpeg" alt="Second slide">
                    <div class="carousel-caption-left-bottom">
                    "Traveling – it leaves you speechless, then <br> turns you into a storyteller."<br><i> – Ibn Battuta</i>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/IMG_7.jpeg" alt="Third slide">
                    <div class="carousel-caption-left-bottom">
                    "We travel not to escape life, but for life<br> not to escape us."<br><i> – Anonymous</i>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            document.querySelector('.carousel-container').classList.add('fade-in');
        });
    </script>
</body>

</html>