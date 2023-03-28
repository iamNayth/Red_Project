<?php

function getPictures() {
    $database = dbConnect();

    $statement = $database->prepare("SELECT * FROM pictures");
    $statement->execute();
    $pictures = [];
    while (($row = $statement->fetch())) {
        $images = [
            'id' => $row['id'],
            'name' => $row['name'],
            'path' => $row['path'],
        ];
        $pictures[] = $images;
    }
    return $pictures;
}

function addPicture() {
        $database = dbConnect();
        
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0
        ||  (isset($_POST['name']) || !empty($_POST['name'])))   {  {
            $name = strip_tags($_POST['name']);
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['picture']['size'] <= 1000000) {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['picture']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                $path = '../assets/uploads/' . basename($_FILES['picture']['name']);
                if (in_array($extension, $allowedExtensions)) {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                    echo "L'envoi a bien été effectué !";

                    $query = 'INSERT INTO pictures(name, path) VALUES (:name, :path)';
                    $req = $database->prepare($query);
                    $req->bindValue(':name', $name, PDO::PARAM_STR);
                    $req->bindValue(':path', $path, PDO::PARAM_STR);
                    $req->execute();
                    
                }
            }
        }
        }

}

function suppPicture($id, $database) {
    $database = dbConnect();

    $query = 'DELETE FROM pictures WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}