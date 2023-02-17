<?php

require_once("model/admin_managment.php");
function admins() {

    require_once('model/connexion.php');
    
    $admins = displayAdmin();
    require_once("templates/admin.php");
}
