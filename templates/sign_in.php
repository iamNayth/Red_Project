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
    <link href="../assets/style_sign-in.css" rel="stylesheet" />
</head>
  <body>
      <section id="sign-in">
         <img src="../admin/assets/icons/logo-info.svg" id="logo_sign">
         <img src="../assets/img/inscription-bg.png" id="illustration">
          <div class="container-fluid h-100">
              <div class="row h-100">
                  <div class="col d-flex align-items-center" style="margin-left: 50%">
                      <div class="form-bloc z-2">
                        <form action="#">
                          <div class="container-fluid h-100 p-3">
                            <div class="row gy-3">
                                <div class="col-12 d-flex align-items-center gap-3 mb-5">
                                    <img src="../assets/icons/return-down-back.svg">
                                    <h1 class="tilt color1 fs-2">NOUVEAU CLIENT ? PAR ICI.</h1>
                                </div>
                                <div class="col-12 d-flex flex-column align-items-center">
                                  <input name="surname" type="text" placeholder="Prénom"><br>
                                  <input name="name" type="text" placeholder="Nom"><br>
                                  <input name="mail" type="text" placeholder="Adresse e-mail"><br>
                                  <input name="password" type="password" placeholder="Mot de passe"><br>
                                </div>
                                <div class="col-12 d-flex flex-column align-items-center justify-content-center gap-3 ps-5 pe-5">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label opacity-50" for="flexCheckDefault">J'accepte de recevoir les meilleurs plan et la newsletter par mail.</label>
                                  </div>
                                  <p class="text-center mont">En créant un compte vous acceptez les <strong>Conditions générales d'utilisation</strong> , les <strong>Conditions générales de ventes</strong> et la <strong>Politique de Confidentialité</strong> de <strong>Soltech</strong> et affirmez avoir plus de 16 ans.</p>
                                </div>
                                <div class="col-12 d-flex flex-column align-items-center justify-content-center gap-3">
                                  <button class="button1 montbold">M'inscrire</button>
                                  <button class="button2 montbold">J'ai déjà un compte</button>
                                </div>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
             
          </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>


