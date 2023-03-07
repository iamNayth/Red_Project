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
    || (!isset($_POST['price']) || empty($_POST['price']))) {       
        echo 'Il faut faut remplir tous les champs';
    } else {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $price = strip_tags($_POST['price']);

        if(isset($_FILES['picture']['name']) && count($_FILES['picture']['name']) > 0) {
            // Parcourir chaque fichier téléchargé
            for($i=0; $i<count($_FILES['picture']['name']); $i++) {
                // Obtenir le chemin de destination
                $path = '../assets/uploads/' . basename($_FILES['picture']['name'][$i]);
    
                // Vérifier si le fichier est une image valide
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                $file_extension = pathinfo($path, PATHINFO_EXTENSION);
                if(!in_array(strtolower($file_extension), $valid_extensions)) {
                    echo "Erreur: seules les images de type JPEG, JPG, PNG et GIF sont autorisées.";
                    exit();
                }
    
                // Vérifier si le fichier a été téléchargé avec succès
                if(move_uploaded_file($_FILES['picture']['tmp_name'][$i], $path)) {
                    // Insérer le chemin de l'image dans la table "pictures"
                    $image_path = $path;
                   
                    $sql = "INSERT INTO pictures (product_id, path) VALUES (:product_id,:path)";
                    $stmt= $database->prepare($sql);
                    $stmt->execute([$_POST['product_id'], $image_path]);

                    $sql = "INSERT INTO products (name, description, price) VALUES (:name,:description,:price)";
                    $stmt= $database->prepare($sql);
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
                    $stmt->execute();

                    $msg = 'Le produit à bien été ajouté';
                } else {
                    echo "Erreur lors du téléchargement du fichier.";
                    exit();
                }
            }
        } else {
            echo "Erreur: aucun fichier n'a été téléchargé.";
            exit();
        }
    } 
    
}