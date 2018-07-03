<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>estilos/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url();?>estilos/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url();?>estilos/css/style.css" rel="stylesheet">
</head>

<body>

<!-- Start your project here-->
<script type="text/javascript" src="<?php echo base_url();?>estilos/js/mdb.min.js"></script>

<!--Navbar-->
<nav class=" container navbar navbar-expand-lg navbar-dark info-color-dark">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="<?php echo base_url(); ?> ">Inicio</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>producto/">Productos</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>producto/insert">Ingresar Producto</a>
                    <!--  <a class="dropdown-item" href="<?php echo base_url(); ?>login">Usuarios</a> -->
                </div>

            <li class="nav-item">
              <!--  <a class="nav-link" href="<?php base_url(); ?>login/logout">salir</a> -->
            </li>

            <!-- Dropdown -->


        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->

</nav>
