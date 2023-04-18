<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Righteous&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet" />
</head>
  <body>
    <header>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-4 d-flex align-items-center">
                    <img src="../admin/assets/icons/Logo.svg" class="h-75">
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <img src="../admin/assets/icons/logotype.svg" class="h-50">
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end gap-3">
                    <span class="mont color1 fs-5"> Bienvenue  <strong><?php (isset($_SESSION['first_name'])) ? print($_SESSION['first_name']) : ''; ?></strong></span>
                    <a href=""><img src="../admin/assets/icons/cart.svg"></a>
                    <a href="../public/index.php?page=login"><img src="../admin/assets/icons/user.svg" id="profile-picture"></img></a>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-4"></div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <ul class="d-flex justify-content-between w-100 h-100 align-items-center montbold  fs-6 color1">
                        <a href="../public/index.php?page=homepage" class="color1"><li>ARTICLES</li></a>
                        <a href="../public/index.php?page=homepage" class="color1"><li>ACCUEIL</li></a>
                        <a href="../public/index.php?page=categories" class="color1"><li>CATEGORIE</li></a>
                    </ul>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <div class="input-group mb-3 w-75 position-relative">
                        <input type="text" class="form-control bg-body-secondary rounded-pill mont h-75" placeholder="Rechercher" aria-label="Research" aria-describedby="button-addon2">
                        <button class="position-absolute bg-transparent border-0 m-0 p-0" style="top: -5px; right: 10px"><img src="../admin/assets/icons/search.svg"></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <img src="../admin/assets/icons/footer_background.svg" class="position-absolute h-75" style="bottom: 0; left: 10em">
        <img src="../admin/assets/icons/logotype-white.svg" class="position-absolute" style="bottom: 1em; right: 1em">

        <div class="container h-100 pt-5">
            <div class="row h-100">
                <div class="col-3 d-flex flex-column text-light mont">
                    <span class="montbold fs-6">A PROPOS</span><br>
                    <a>On recrute</a>
                    <a>Qui sommes-nous</a>
                    <a>Conditions des offres en cours</a>
                    <a>Conditions générales de vente</a>
                    <a>Conditions générales d'utilisation</a>
                    <a>Mentions légales</a>
                    <a>Cookies</a>
                    <a>Politique de confidentialité</a>
                </div>
                <div class="col-3 d-flex flex-column text-light mont">
                    <span class="montbold fs-6">SERVICE</span><br>
                    <a>Offres du moment</a>
                    <a>Appelez nos experts</a>
                    <a>Garantis hors pair</a>
                </div>
                <div class="col-3 d-flex flex-column text-light mont">
                    <span class="montbold fs-6">AIDE</span><br>
                    <a>Nous contacter</a>
                    <a>Faq</a>
                    <a>Devenir vendeur Soltech</a>
                    <a>Modes et frais de livraison</a>
                    <a>Avis et témoignages</a>
                </div>
                <div class="col-3 d-flex flex-column text-light mont">
                    <span class="montbold fs-6">MOYENS DE PAIEMENTS</span><br>
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col"><img src="../admin/assets/icons/paiement/American_Express 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/Apple_pay 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/cb 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/mastercard 1.svg" class="img-fluid"></div>
                        </div>
                        <div class="row">
                            <div class="col"><img src="../admin/assets/icons/paiement/Oney 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/Paypal 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/visa 1.svg" class="img-fluid"></div>
                            <div class="col"><img src="../admin/assets/icons/paiement/Younited 1.svg" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>