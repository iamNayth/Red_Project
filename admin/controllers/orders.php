<?php

require_once('../model/order_managment.php');
require_once('../model/connexion.php');

function displayOrder() {
    $orders = getOrder();
    require('../templates/orders.php');
}