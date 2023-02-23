<?php

session_start();



try {

    require_once('../controllers/categorie.php');
    require_once('../controllers/homepage.php');
    require_once('../controllers/admin.php');
    require_once('../controllers/picture.php');
    require_once('../controllers/add_categorie.php');
    require_once('../controllers/add_picture.php');
    
    if(!isset($_SESSION['id']) || !isset($_SESSION['nickname'])) {
    
        header('location:authentification.php');
    }

    if(isset($_GET['action']) && $_GET['action'] == "signout"){
        session_destroy();
        header('location: authentification.php');
    }

    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'addPicture') {
            addPicture();
            header('location:../templates/picture.php');
        }
    }

    if( isset($_GET['page'])) {
        $page = strval($_GET['page']);
        if($page == "admin"){
            admins();
        }
        elseif ($page == "accueil") {
            getHomepage();
        }
        elseif ($page == "categorie") {
            getCategorie();
        }
        elseif ($page == "picture") {
            getPicture();
        }
        elseif ($page == "add_categorie") {
            getAdd_Categorie();
        }
        elseif ($page == "add_picture") {
            getAdd_Picture();
        }
    } else {
        getHomepage();
    }
    

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }
