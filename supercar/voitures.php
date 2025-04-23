<?php
    // details base de donnée
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supercar";

    // créer la connexion
    $con = mysqli_connect($host, $username, $password, $dbname);

    // assurer que la connexion à été établie 
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

   
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Voitures</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Supercar1.css">
</head>
<form action="recherche.php" method="GET">
    <input type="text" name="mot_cle" placeholder="Rechercher...">
    <button type="submit">Rechercher</button>
</form>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
       <div class="container"><a class="navbar-brand d-flex align-items-center"><strong>Greencar</strong></a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="voitures.php">Voitures</a></li>
                    <li class="nav-item"><a class="nav-link" href="demande_essai.php">Demande d'essai</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul><a class="btn btn-primary shadow" role="button" href="connexion.php">Connexion</a>
            </div>
        </div>
    </nav>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top: 12px;padding-top: 44px;">
                    <h2 class="fw-bold" style="margin-top: -46px;">Voitures</h2>
                </div>
                <div class="content">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Ferrari488.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Ferrari</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">488 fast sport</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="ferrari-f8.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Ferrari</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">F8</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Mercedesbenzecoupe.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Mercedes</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">AMG GT coupe</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Mercedesbenz.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Mercedes</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">AMG GTR</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"></div>
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="AstonV12.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Aston Martin</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">V12 vintage S</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Aston-martin-dbs.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Aston martin</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">DBS superlegerra</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Lamborghini gallardo.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lamborghini</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">Gallardo</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="LamborghiniAventa.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lamborghini</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">Aventador SVJ</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="Porchetaycan.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Porsche</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">Taycan turbo S</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="PorscheGT3.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Porsche</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">GT3</label></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>