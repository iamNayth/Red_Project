<?php

session_start();



try {
    //Controllers
    require_once('../controllers/homepage.php');
    require_once('../controllers/sign_in.php');
    require_once('../controllers/login.php');
    require_once('../controllers/categories.php');
    require_once('../controllers/show_products.php');
    require_once('../controllers/details.php');
    
    
    if( isset($_GET['page'])) {
        $page = strval($_GET['page']);

        if($page == "homepage"){
            displayHomepage();
        }
        elseif ($page == "sign-in") {
            displaySignIn();
        }
        elseif ($page == "login") {
            displayLogIn();
        }
        elseif ($page == "categories") {
            displayCategories();
        }
        elseif ($page == "show_products") {
            displayShowProducts();
        }
        elseif ($page == "details") {
            displayDetails();
        }
        elseif ($page == "add_user") {
            validate_add_user();
        }
        elseif ($page == "connect") {
            connect();
        }
        
    } else {
        displayHomepage();
    }
    

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }
