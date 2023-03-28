<?php

session_start();



try {
    //Controllers
    require_once('../controllers/homepage.php');
    require_once('../controllers/sign_in.php');
    
    // if(!isset($_SESSION['id']) || !isset($_SESSION['nickname'])) {
    
    //     header('location:authentification.php');
    // }
    
    if( isset($_GET['page'])) {
        $page = strval($_GET['page']);

        if($page == "homepage"){
            displayHomepage();
        }
        elseif ($page == "sign-in") {
            displaySignIn();
        }

    } else {
        displayHomepage();
    }
    

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }