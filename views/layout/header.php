<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subastas.com</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="./public/js/menu.js" defer></script>
</head>

<body>
    <header>
        
        <div class="logo"><img src="/public/assets/img/logo.PNG" alt=""></div>
        
        <ul class="menu_items">
            <li>
                <a href="./index.html">Inicio</a>
                <div class="Linea"></div>
            </li>
            <li><a href="#">Categorias</a></li>
            <li><a href="./subastas.html">Subastas</a></li>
            <li><a href="./ventas.html">Ventas</a></li>
            <li> <a href="./login.html">Login</a></li>
            <li><a href="./Registrar.html">Registrar</a></li>

            <li><a href="./carrito.html"><i class="fas fa-shopping-bag"></i></a></li>
        </ul>
        <div class="menu_bar"><i class="fas fa-bars"></i></div>

    </header>
    <main>
        <section>
            <div class="banner">
                <img src="./public/assets/img/laptop-banner.png" alt="banner shop">
            </div>
        </section>
        <section class="products">



<!-- <!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url ?>assets/bootstrap/css/bootstrap.css" />
        <link rel="shortcut icon" href="<?= base_url ?>assets/img/logo.jpg">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css" />
        <link rel="stylesheet" href="<?= base_url ?>assets/css/fonts.css"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <title>cyberShop</title>
    </head>
    <body>
        <div id="container">
            header 
            <header id ="header"> 
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/logo.jpg" alt="cyberShop">
                    <a href="<?= base_url ?><?= controler_default ?>/<?= action_default ?>">
                        CyberShop
                    </a>
                </div>

            </header>


            menu    
                
                <nav id="menu" >
                    <ul class="nav">
                        <li>
                            <a href="<?= base_url ?><?= controler_default ?>/<?= action_default ?>" >inicio</a>
                        </li>  
                        <li class="submenu">
                            <a>PC <span class="caret icon-arrow-down6"></span></a> 
                            <ul>
                                <li><a href="<?= base_url ?>categorias/ver&id=1&page=1" >Pc gama de entrada</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=2&page=1" >Pc gama media</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=3&page=1" >Pc gama alta</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url ?>ArmaPc/index">Arma tu pc</a></li>
                        <li>
                            <a>Productos</a>
                            <ul>
                                <li><a href="<?= base_url ?>categorias/ver&id=5&page=1" >Procesadores</a></li>
                                <li>
                                    <a>Discos duros</a>
                                <ul>
                                    <li ><a href="<?= base_url ?>categorias/ver&id=15&page=1">Mecanico</a></li>
                                    <li ><a href="<?= base_url ?>categorias/ver&id=16&page=1">Estado solido</a></li>
                                </ul>
                                </li>
                                <li><a href="<?= base_url ?>categorias/ver&id=6&page=1" >Boards</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=9&page=1" >Monitores</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=7&page=1" >Memorias Ram</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=8&page=1" >Tarjeta grafica</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=10&page=1" >Teclados</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=17&page=1" >Mouse</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=18&page=1" >Chazis</a></li>
                                <li><a href="<?= base_url ?>categorias/ver&id=11&page=1" >Fuente de poder</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url ?>categorias/ver&id=4&page=1">Laptos</a></li>

                        <li> 
                            <form action="<?=base_url?>productos/index" class="form-inline my-2 my-lg-0" style="padding: 10px; margin-left:600px;" method="post">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscador" aria-label="Search" name="search">
                                <input class="btn btn btn-primary my-2 my-sm-0" type="submit" value="Buscar">
                                
                            </form>
                   
                        </li>
                    </ul>        
                </nav>
                  

            

         lateral 

        <div id="content"> -->