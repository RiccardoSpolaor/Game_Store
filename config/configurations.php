<?php

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die("Non autorizzato");
}

include_once '..\lib\cart.php';

ob_start();
session_start();


$dns = 'pgsql:host=ec2-54-217-216-149.eu-west-1.compute.amazonaws.com;port=5432;dbname=dckhpsi2teki9g;user=xfhnwuvgzmwzwj;password=e85237cc7ffa88f77d8519f58908826c27396da6e2944fd1339cd04064d3655d;sslmode=require;';

?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html" charset="UTF-8">

    <title> Negozio Giochi Online </title>

    <link rel="stylesheet" type = "text/css" href="../web/css/style.css" />

    <script type="text/javascript">
        window.onload = function cartItems() {
            var cart_items = null;
            cart_items = <?php
            $cart= new Cart();
            if (isset ($_SESSION['cart']))
                $cart = $_SESSION['cart'];
            if ($cart->getTotalItems()!=0) {
                echo $cart -> getTotalItems();
            }
            ?>;
            if (cart_items != null) {
                document.getElementById('cart_items').innerHTML = cart_items;
            }
        }
    </script>

</head>

</html>
