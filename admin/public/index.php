<?php

session_start();



try {

    require_once('../controllers/categorie.php');
    require_once('../controllers/homepage.php');
    require_once('../controllers/admin.php');
    require_once('../controllers/picture.php');
    require_once('../controllers/products.php');
    require_once('../controllers/orders.php');
    require_once('../controllers/users.php');
    require_once('../controllers/add_categorie.php');
    require_once('../controllers/add_Scategorie.php');
    require_once('../controllers/add_picture.php');
    
    if(!isset($_SESSION['id']) || !isset($_SESSION['nickname'])) {
    
        header('location:authentification.php');
    }

    if(isset($_GET['action']) && $_GET['action'] == "signout"){
        session_destroy();
        header('location: authentification.php');
    } 
    

    if( isset($_GET['page'])) {
        $page = strval($_GET['page']);
        if($page == "admin"){
            displayadmins();
        }
        elseif ($page == "accueil") {
            displayHomepage();
        }
        elseif ($page == "categorie") {
            displayCategorie();
        }
        elseif ($page == "picture") {
            displayPicture();
        }
        elseif ($page == "products") {
            displayProduct();
        }
        elseif ($page == "orders") {
            displayOrder();
        }
        elseif ($page == "users") {
            displayUser();
        }
        elseif ($page == "add_categorie") {
            displayAdd_Categorie();
        }
        elseif ($page == "add_Scategorie") {
            displayAdd_SCategorie();
        }
        elseif ($page == "add_picture") {
            displayAdd_Picture();
        }
    } else {
        displayHomepage();
    }
    

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }
