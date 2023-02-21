<?php

session_start();



try {

    require_once('../controllers/homepage.php');
    require_once('../controllers/admin.php');
    
    if(!isset($_SESSION['id']) || !isset($_SESSION['nickname'])) {
    
        header('location:authentification.php');
    }

    if(isset($_GET['action']) && $_GET['action'] == "signout"){
        session_destroy();
        header('location: ../index.php');
    }

    if( isset($_GET['page'])) {
        $page = strval($_GET['page']);
        if($page == "admin"){
            admins();
        }
        elseif ($page == "accueil"){
            getHomepage();
        }
    } else {
        getHomepage();
    }

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }
