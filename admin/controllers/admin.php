<?php
require_once('model/connexion.php');
require_once("model/admin_managment.php");
function admins() {
    //$admins = displayAdmin();
    //msg=var_dump($admins);
    require("templates/admin.php");
}