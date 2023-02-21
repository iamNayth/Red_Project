<?php

try {

    require_once('controllers/connexion.php');
    require_once('controllers/homepage.php');
    require_once('controllers/admin.php');
    
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
