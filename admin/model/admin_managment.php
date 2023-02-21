<?php


function displayAdmin() 
{
    $database = dbConnect();
    $statement = $database->prepare("SELECT * FROM admin");
    $statement->execute();
    $admins = [];
    while (($row = $statement->fetch())) {
        $admin = [
            'id' => $row['id'],
            'nickname' => $row['nickname'],
            'email' => $row['email'],
        ];
        $admins[] = $admin;
    }
    return $admins;

}

function addAdmin()
{
    $database = dbConnect();

    if(isset($_POST['addAdmin'])){
        if ((!isset($_POST['nickname']) || empty($_POST['nickname']))
        || (!isset($_POST['password']) || empty($_POST['password']))
        || (!isset($_POST['email']) || empty($_POST['email'])))   {       
            echo 'Il faut faut remplir tous les champs';
    } else {
        $nickname = strip_tags($_POST['nickname']);
        $email = strip_tags($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sth = $database->prepare("INSERT INTO `admin`(`nickname`,`email`, `password`) VALUES (:nickname,:email,:password)");
        $sth->bindParam(':nickname', $nickname, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->execute();
        $msg="Votre nouvel admin à bien été ajouté.";
        }
    }    
}

function suppAdmin($id, $database)
{
    $database = dbConnect();

    $query = 'DELETE FROM admin WHERE id=:id'; 
    $req = $database->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $database = dbConnect();
    suppAdmin($id, $database);  
}
