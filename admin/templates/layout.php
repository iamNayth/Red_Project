<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/style.css" rel="stylesheet" />
</head>
  <body class="d-flex">
    <nav class="d-flex flex-column bg-dark h-100 w-25 pt-5 gap-5 ps-5 fs-5 pb-5">
        <h1 class="text-white mb-5">Tableau de bord</h1>
        <a href="" class="text-white">Produits</a>
        <a href="" class="text-white">Catégories</a>
        <a href="" class="text-white">Commandes</a>
        <a href="" class="text-white">Clients</a>
        <a href="" class="text-white">Admin</a>
    </nav>
    <main>
        <?= $content ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>