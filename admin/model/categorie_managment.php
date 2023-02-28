<?php 

function getCategories() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM categories");
    $statement->execute();
    $categories = [];
    while (($row = $statement->fetch())) {
        $categorie = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'img_path' => $row['img_path']
        ];
        $categories[] = $categorie;
    }
    return $categories;
}

function getS_Categories() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM subcategories");
    $statement->execute();
    $s_categories = [];
    while (($row = $statement->fetch())) {
        $scategorie = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            //'id_categorie' => $row['id_categorie'],
            
        ];
        $s_categories[] = $scategorie;
    }
    return $s_categories;
}

function addCategories() {
    $msg = "";
    $database = dbConnect();
    
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))) {       
        echo 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['picture']['size'] <= 1000000) {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['picture']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                
                if (in_array($extension, $allowedExtensions)) {
                    // On peut valider le fichier et le stocker définitivement
                    $path = '../assets/uploads/' . basename($_FILES['picture']['name']);
                    move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                    
                    
                    $sth = $database->prepare("INSERT INTO `categories`(`name`,`description`,`img_path`) VALUES (:name,:description,:img_path)");
                    $sth->bindParam(':name', $name, PDO::PARAM_STR);
                    $sth->bindParam(':description', $description, PDO::PARAM_STR);
                    $sth->bindParam(':img_path', $path, PDO::PARAM_STR);
                    $sth->execute();
                    return $msg= "L'ajout a bien été effectué !";
                }
            }
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

function suppCategorie($id, $database)
{
    $database = dbConnect();

    $query = 'DELETE FROM categories WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $database = dbConnect();
    suppCategorie($id, $database);  
}
