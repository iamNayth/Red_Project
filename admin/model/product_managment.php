<?php

function getProducts() {
    $database = dbConnect();
    $statement = $database->prepare("SELECT prod.*, pic.id, pic.path as pic_path FROM products prod INNER JOIN pictures pic ON pic.id_products = prod.id");
    $statement->execute();
    $products = [];
    while (($row = $statement->fetch())) {
        $product = [
            'id' => $row['id'],
            'ident_product' => $row['ident_product'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'pic_path' => $row['pic_path']
        ];
        $products[] = $product;
    }
    return $products;
}

function addProducts() {
    global $msg;
    global $count;
    $database = dbConnect();
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    || (!isset($_FILES['picture-1']) || empty($_FILES['picture-1']))
    || (!isset($_POST['name_picture-1']) || empty($_POST['name_picture-1']))
    || (!isset($_POST['price']) || empty($_POST['price']))) {       
        $msg= 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);
        $ident_product = time();
        $id_scategories = ($_POST['id_scat']);
        
        
        $sql = "INSERT INTO products (ident_product, name, description, price, id_subcategory) VALUES (:ident_product, :name,:description,:price, :id_subcategory)";
        $stmt= $database->prepare($sql);
        $stmt->bindParam(':ident_product', $ident_product, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':id_subcategory', $id_scategories, PDO::PARAM_INT);
        $stmt->execute();

        //On recupère l'id du produit ajouté précédement
        $lastProductquery = "SELECT id FROM `products` WHERE `ident_product` = :ident_product";
        $lastProductStmt= $database->prepare($lastProductquery);
        $lastProductStmt->bindParam(':ident_product', $ident_product, PDO::PARAM_INT);
        $lastProductStmt->execute();
        $productLastId = $lastProductStmt->fetch();
        
        for ($i = 1; $i <= 5; $i++) {
            if (isset($_FILES['picture-' . $i]) && $_FILES['picture-' . $i]['error'] === 0) {
                $count++;
            }
        }
        
        for ($i = 1; $i <= $count; $i++) {
            if (isset($_FILES['picture-' . $i]) && $_FILES['picture-' . $i]['error'] == 0
            || (isset($_POST['name_picture-'.$i]) || !empty($_POST['name_picture-'.$i]))) {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['picture-'.$i]['size'] <= 1000000) {
                    // Testons si l'extension est autorisée
                    $fileInfo = pathinfo($_FILES['picture-' . $i]['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'jfif', 'webp', 'avif'];
                    
                    if (in_array($extension, $allowedExtensions)) {
                        // On peut valider le fichier et le stocker définitivement
                        $name_picture = strip_tags($_POST['name_picture-' . $i]);
                        $path = '../assets/uploads/' . basename($_FILES['picture-' . $i]['name']);
                        move_uploaded_file($_FILES['picture-' . $i]['tmp_name'], $path);
                        
                        
                        $sth = $database->prepare("INSERT INTO `pictures`(`name`,`path`,`id_products`) VALUES (:name,:path,:id_products)");
                        $sth->bindParam(':name', $name_picture, PDO::PARAM_STR);
                        $sth->bindParam(':path', $path, PDO::PARAM_STR);
                        $sth->bindParam(':id_products', $productLastId['id'], PDO::PARAM_INT);
                        $sth->execute();
                        $msg= "Produit ajouté !";
                    }
                }
            }
        }
        $msg = "L'ajout à bien été effectué.";
    }
return $msg;
} 

function suppProduct($id, $database)
{
    $database = dbConnect();

    $query = 'DELETE FROM products WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}
    
