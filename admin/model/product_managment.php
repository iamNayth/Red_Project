<?php

function getProducts() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT prod.*, pic.id FROM products prod INNER JOIN pictures pic ON pic.id = prod.id_pictures");
    $statement->execute();
    $products = [];
    while (($row = $statement->fetch())) {
        $product = [
            'id' => $row['id'],
            'ident_product' => $row['ident_product'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
        ];
        $products[] = $product;
    }
    return $products;
}

function addProducts() {
    $msg = "";
    $database = dbConnect();
    
    if ((!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['description']) || empty($_POST['description']))
    || (!isset($_POST['picture-1']) || empty($_POST['picture-1']))
    || (!isset($_POST['price']) || empty($_POST['price']))) {       
        echo 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);
        $ident_product = time();
        $count = 0;

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
                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                    
                    if (in_array($extension, $allowedExtensions)) {
                        // On peut valider le fichier et le stocker définitivement
                        $name_picture = strip_tags($_POST['name_picture'.$i]);
                        $path = '../assets/uploads/' . basename($_FILES['picture']['name']);
                        move_uploaded_file($_FILES['picture-' . $i]['tmp_name'], $path);
                        
                        
                        $sth = $database->prepare("INSERT INTO `pictures`(`name`,`path`,`id_products`) VALUES (:name,:path;:id_products)");
                        $sth->bindParam(':name', $name_picture, PDO::PARAM_STR);
                        $sth->bindParam(':path', $path, PDO::PARAM_STR);
                        $sth->bindParam(':id_products', $ident_product, PDO::PARAM_INT);
                        $sth->execute();
                        return $msg= "L'ajout a bien été effectué !";
                    }
                }
            }
        }
        
        $sql = "INSERT INTO products (ident_product, name, description, price) VALUES (:ident_product, :name,:description,:price)";
        $stmt= $database->prepare($sql);
        $stmt->bindParam(':ident_product', $ident_product, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->execute();



        $msg = "L'ajout à bien été effectué.";
    }
} 
    
