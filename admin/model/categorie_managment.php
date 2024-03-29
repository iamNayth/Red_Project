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

    $statement = $database->prepare("SELECT sc.*, c.name as cat_name FROM subcategories sc INNER JOIN categories c ON c.id = sc.id_categories");
    $statement->execute();
    $s_categories = [];
    while (($row = $statement->fetch())) {
        $scategorie = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'id_categories' => $row['id_categories'],
            'cat_name' => $row['cat_name']
        ];
        $s_categories[] = $scategorie;
    }
    return $s_categories;
}
function getSubCatByCatId($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM subcategories WHERE id_categories = :id_cat");
    $statement -> bindValue(':id_cat', $id, PDO::PARAM_INT);
    $statement->execute();
    $subCatById = $statement -> fetchAll();
    return $subCatById;
}

function addCategories() {
    $msg = "";
    $database = dbConnect();
    
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))) {       
        $msg = 'Il faut faut remplir tous les champs';
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
                    $path = '../admin/assets/uploads/' . basename($_FILES['picture']['name']);
                    move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                    
                    $msg = "S'arrete au deplacement";
                    
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
    $msg ="";
    if(isset($_POST['addSCategorie'])){
        if ((!isset($_POST['name']) || empty($_POST['name']))
        || (!isset($_POST['description']) || empty($_POST['description'])))   {       
            $msg = 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $id_categories = ($_POST['id_cat']);

        $sth = $database->prepare("INSERT INTO `subcategories`(`name`,`description`,`id_categories`) VALUES (:name,:description,:id_categories)");
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':description', $description, PDO::PARAM_STR);
        $sth->bindParam(':id_categories', $id_categories, PDO::PARAM_STR);
        $sth->execute();
        $msg= "Sous-catégorie ajoutée !";
        }
    } 
    return $msg;   
}

function suppCat($id, $database)
{
    $database = dbConnect();

    $query = 'DELETE FROM categories WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}
function suppSubCat($id, $database)
{
    $database = dbConnect();

    $query = 'DELETE FROM subcategories WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}

function recupCategoryId($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM categories WHERE id = :id");
    $statement ->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $categorie = $statement-> fetch(PDO::FETCH_ASSOC);
    return $categorie;
}
function recupSubCategoryId($id) {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM subcategories WHERE id = :id");
    $statement ->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $subcategorie = $statement-> fetch(PDO::FETCH_ASSOC);
    return $subcategorie;
}

function editCategory($id) {
    $database = dbConnect();
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))) {     
        echo 'Aucune entrée';
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
                    
                    
                    $sth = $database->prepare("UPDATE categories SET name = :name, description = :description, img_path = :img_path WHERE id= :id");
                    $sth->bindParam(':name', $name, PDO::PARAM_STR);
                    $sth->bindParam(':description', $description, PDO::PARAM_STR);
                    $sth->bindParam(':img_path', $path, PDO::PARAM_STR);
                    $sth->bindParam(':id', $id, PDO::PARAM_INT);
                    $sth->execute();
                    return $msg= "La modification a bien été effectué !";
                }
            }
        }
    }
}
function editSubCategory($id) {
    $database = dbConnect();
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))) {     
        echo 'Aucune entrée';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $id_categories = ($_POST['id_cat']);

        $sth = $database->prepare("UPDATE subcategories SET name = :name, description = :description, id_categories = :id_categories WHERE id= :id");
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':description', $description, PDO::PARAM_STR);
        $sth->bindParam(':id_categories', $id_categories, PDO::PARAM_INT);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $msg= "Sous-catégorie modifié !";
    }
}


