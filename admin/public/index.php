<?php

session_start();


try {
    //Controllers
    require_once('../controllers/category.php');
    require_once('../controllers/sub_category.php');
    require_once('../controllers/add_category.php');
    require_once('../controllers/add_Scategory.php');
    require_once('../controllers/edit_category.php');
    require_once('../controllers/edit_Scategory.php');
    require_once('../controllers/delete_Scategory.php');
    require_once('../controllers/delete_category.php');

    require_once('../controllers/homepage.php');
    require_once('../controllers/admin.php');
    require_once('../controllers/picture.php');
    require_once('../controllers/add_picture.php');
    require_once('../controllers/delete_picture.php');
    require_once('../controllers/products.php');
    require_once('../controllers/add_product.php');
    require_once('../controllers/delete_product.php');
    require_once('../controllers/orders.php');
    require_once('../controllers/users.php');
    
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
        //CATEGORIE
        elseif ($page == "category") {
            displayCategory();
        }
        elseif ($page == "edit_category") {
            displayEdit_Category();
        }
        elseif ($page == "validate_edit_category") {
            validate_edit_category();
        }
        elseif ($page == "validate_add_category") {
            validateAddCategory();
        }
        elseif ($page == "add_category") {
            displayAdd_Category();
        }
        elseif ($page == "delete_category") {
            deleteCategory();
        }
        //SUB-CATEGORY
        elseif ($page == "sub_category") {
            displaySub_Category();
        }
        elseif ($page == "add_Scategory") {
            displayAdd_SCategory();
        }
        elseif ($page == "validate_edit_subCategory") {
            validate_edit_subCategory();
        }
        elseif ($page == "delete_Scategory") {
            delete_Scat();
        }
        elseif ($page == "edit_Scategory") {
            displayEdit_SCategory();
        }
        elseif ($page == "validate_add_scategory") {
            validate_add_subCategory();
        }
        //PICTURES
        elseif ($page == "picture") {
            displayPicture();
        }
        elseif ($page == "add_picture") {
            displayAdd_Picture();
        }
        elseif ($page == "delete_picture") {
            deletePictures();
        }
        //PRODUCTS
        elseif ($page == "products") {
            displayProduct();
        }
        elseif ($page == "add_product") {
            displayAdd_Product();
        }
        elseif ($page == "delete_product") {
            deleteProduct();
        }
        //ORDERS
        elseif ($page == "orders") {
            displayOrder();
        }
        //USERS
        elseif ($page == "users") {
            displayUser();
        }
    } else {
        displayHomepage();
    }
    

 } catch (Exception $e) { //S'il y'a une erreur...
    $errorMessage = $e->getMessage();
 
    //require('templates/error.php');
 
 }
