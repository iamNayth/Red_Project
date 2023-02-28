<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/style.css" rel="stylesheet" />
</head>
  <body class="d-flex w-100">
    <nav id="nav-layout" class="navbarr fixed-left d-flex flex-column bg-dark h-100 gap-5 ps-5 pt-5 ps-2 fs-5 pb-5">
        <h1 class="text-white text-center mb-5">Tableau de bord</h1>
        <a href="../public/index.php?page=accueil" class="text-white">Accueil</a>
        <a href="../public/index.php?page=products" class="text-white">Produits</a>
        <a href="../public/index.php?page=picture" class="text-white">Photos</a>
        <a href="../public/index.php?page=categorie" class="text-white">Catégories</a>
        <a href="../public/index.php?page=orders" class="text-white">Commandes</a>
        <a href="../public/index.php?page=users" class="text-white">Clients</a>
        <a href="../public/index.php?page=admin" class="text-white">Admin</a>
        <a href="../public/index.php?action=signout">Se déconnecter</a>
    </nav>
    <main id="main-layout" class="m-5 h-100">
        <?= $content ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>