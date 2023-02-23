<?php 

function displayCategories() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM categories");
    $statement->execute();
    $categories = [];
    while (($row = $statement->fetch())) {
        $categorie = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
        ];
        $categories[] = $categorie;
    }
    return $categories;
}

function displayS_Categories() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM subcategories");
    $statement->execute();
    $s_categories = [];
    while (($row = $statement->fetch())) {
        $scategorie = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
        ];
        $s_categories[] = $scategorie;
    }
    return $s_categories;
}

function addCategories()
{
    $database = dbConnect();
    

    if(isset($_POST['addCategorie'])){
        if ((!isset($_POST['name']) || empty($_POST['name']))
        || (!isset($_POST['description']) || empty($_POST['description'])))   {       
            echo 'Il faut faut remplir tous les champs';
    } else {
        $msg="";
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        

        $sth = $database->prepare("INSERT INTO `categories`(`name`,`description`) VALUES (:name,:description)");
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':description', $description, PDO::PARAM_STR);
        $sth->execute();
        $msg="Votre catégorie à bien été ajoutée !";
        }
    }    
}
function addS_Categories()
{
    $database = dbConnect();

    if(isset($_POST['addSCategorie'])){
        if ((!isset($_POST['name']) || empty($_POST['name']))
        || (!isset($_POST['description']) || empty($_POST['description'])))   {       
            echo 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);

        $sth = $database->prepare("INSERT INTO `subcategories`(`name`,`description`) VALUES (:name,:description)");
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':description', $description, PDO::PARAM_STR);
        $sth->execute();
        }
    }    
}

function addCatPicture() {

    $database = dbConnect();

    $picName=strip_tags($_POST['picName']);
            if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['picture']['size'] <= 1000000) {
                    // Testons si l'extension est autorisée
                    $fileInfo = pathinfo($_FILES['picture']['picName']);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                    $path = '../assets/uploads/' . basename($_FILES['picture']['picName']);
                    if (in_array($extension, $allowedExtensions)) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                        echo "L'envoi a bien été effectué !";

                        $query = 'INSERT INTO pictures(name, path) VALUES (:name, :path)';
                        $req = $database->prepare($query);
                        $req->bindValue(':name', $picName, PDO::PARAM_STR);
                        $req->bindValue(':path', $path, PDO::PARAM_STR);
                        $req->execute();
                        
                    }
                }
            }

}