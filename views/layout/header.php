<!DOCTYPE html>
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
            <!-- header --->
            <header id ="header"> 
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/logo.jpg" alt="cyberShop">
                    <a href="<?= base_url ?><?= controler_default ?>/<?= action_default ?>">
                        CyberShop
                    </a>
                </div>

            </header>


            <!-- menu --->            
                
                <nav id="menu" >
                    <ul class="nav">
                        <li>
                            <a href="<?= base_url ?><?= controler_default ?>/<?= action_default ?>" >inicio</a>
                        </li>  
                        
                        <li><a href="#">Ventas</a></li>
                        <li><a href="#">Subastas</a></li>
                        <li>
                            <a>categorias</a>
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
                  

            

            <!-- lateral --->

        <div id="content">