<?php

    include 'header.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Room</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--        <link rel="stylesheet" href="/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
  <script src="/bootstrap.css"></script>
</head>

<body>

<section id="portfolio" class="py-5">
    <div class="container">
        <h2 class="mb-0">Nos Chambres</h2>
        <h3 class="fw-light fs-5">Projets perso et pro</h3>

        <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=3" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Réserver </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#infoProjet1">Go somewhere</a>

                        <div class="offcanvas offcanvas-bottom h-100" tabindex="1" id="infoProjet1" aria-labelledby="titleProjet1">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="titleProjet1">Projet 1</h5>
                                <button class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">

                                <!-- Caroussel -->

                                <div id="carouselProject1" class="carousel slide show h-100" data-bs-ride="carousel" data-bs-touch="true">
                                    <div class="carousel-inner h-100">
                                        <div class="carousel-item h-100 active" data-bs-interval="10000">
                                            <img src="https://picsum.photos/1920/1080?random=1" class="d-block w-100" alt="...">
                                        </div>

                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Slide1</h5>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                                Quasi blanditiis earum cumque aspernatur doloremque omnis!
                                            </p>
                                        </div>

                                        <div class="carousel-item">
                                            <img src="https://picsum.photos/1920/1080?random=2" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://picsum.photos/1920/1080?random=3" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=7" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=5" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <br>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="https://picsum.photos/300/150/?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Projet 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>