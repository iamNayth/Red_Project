<?php

function getUser() 
{
    $database = dbConnect();
    $statement = $database->prepare("SELECT * FROM users");
    $statement->execute();
    $users = [];
    while (($row = $statement->fetch())) {
        $user = [
            'id' => $row['id'],
            'gender' => $row['gender'],
            'first_name' => $row['first_name'],
            'name' => $row['name'],
            'email' => $row['email'],
        ];
        $users[] = $user;
    }
    return $users;

}

function addUser() {
    $database = dbConnect();
    
    if ((!isset($_POST['first_name']) || empty($_POST['first_name']))
    || (!isset($_POST['name']) || empty($_POST['name']))
    || (!isset($_POST['password']) || empty($_POST['password']))
    || (!isset($_POST['email']) || empty($_POST['email'])))   {       
        echo 'Il faut faut remplir tous les champs';
    } else {
        $first_name = strip_tags($_POST['first_name']);
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $database->prepare("INSERT INTO `users`(`first_name`,`name`,`email`, `password`) VALUES (:first_name,:name,:email,:password)");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }
}

function logIn() {
    $database = dbConnect();

    if (isset($_POST['email']) & isset($_POST['password'])){
        try {
            $sth = $database->prepare("SELECT * FROM users WHERE email=:email");
            $sth->bindParam(':email', $_POST['email']);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $hash = $row['password'];
            if (password_verify($_POST['password'], $hash)){
                $_SESSION['id']   = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['billing_address'] = $row['billing_address'];
                $_SESSION['delivery_address'] = $row['delivery_address'];
                $_SESSION['phone_number'] = $row['phone_number'];
                header('Location: index.php');
                
            }else{
                echo "Mauvais mot de passe.";
                
            }
        } catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
    }else{
        echo "oula !";
    }
}