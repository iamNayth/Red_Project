<?php 
session_start();

require_once('../model/connexion.php');

$database = dbConnect();

if (isset($_POST['submit'])){
    if (isset($_POST['nickname']) & isset($_POST['password'])){
        try {
            $sth = $database->prepare("SELECT * FROM admin WHERE nickname=:nickname");
            $sth->bindParam(':nickname', $_POST['nickname']);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $hash = $row['password'];
            if (password_verify($_POST['password'], $hash)){
                echo "prout";
                $_SESSION['id']   = $row['id'];
                $_SESSION['nickname'] = $row['nickname'];
                header('Location: index.php');
                
            }else{
                echo "Mauvais mot de passe.";
                echo password_hash('1234', PASSWORD_DEFAULT);
                
            }
        } catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }else{
        echo "oula !";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/style.css" rel="stylesheet" />
</head>
    <body>
    <main id="main-authent" class="h-100 bg-dark">
        <div class="d-flex align-items-center justify-centent-center flex-column">
            <h1 class="mb-5 mt-5 text-white">Se connecter</h1>
            <form action="" method="post">
                <input class="form-control"type="text" name="nickname" placeholder="Nickname"><br>
                <input class="form-control"type="password" name="password" placeholder="Mot de passe"><br>
                <div class=" d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary text-center" type="submit" name="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>