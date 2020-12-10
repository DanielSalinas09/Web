<?php if (isset($_POST['search'])): ?>

    <h1>resultados de la busqueda <?= $_POST['search'] ?></h1>

<?php else: ?>
    <!--oferta--->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url ?>assets/img/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            
            <div class="carousel-item">
                <img src="<?= base_url ?>assets/img/banner3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url ?>assets/img/banner5.jpg" class="d-block w-100" alt="...">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="texto-destacado">
        <h1>Algunos de nuestros productos</h1>
    </div>
    

<?php endif; ?>

<?php if ($productos->num_rows != 0): ?>

    <?php while ($pro = $productos->fetch_object()): ?>
        <!--contenido --->
        <div class = "product">
            <a href="<?= base_url ?>productos/ver&id=<?= $pro->id ?>">
                <img src = "<?= base_url ?>uploads/images/<?= $pro->imagen ?>"/>
                <h2><?= $pro->nombre ?></h2>
                <a/>
                <?php if ($pro->oferta != null): ?>
                    <p style=" margin-top: 0px; text-decoration:line-through;" > <?= number_format($pro->precio) ?> pesos </p>

                    <p style=" height: 0px;"> <?= number_format($pro->precio - ($pro->precio * ($pro->oferta / 100))) ?> pesos </p>
                <?php else: ?>
                    <p><?= number_format($pro->precio) ?> pesos</p>
                <?php endif; ?>
                <a href = "<?= base_url ?>carrito/add&id=<?= $pro->id ?>"><button type="button" class="btn btn-success" <?= $pro->oferta ? 'style="margin-top: 27px;"' : "" ?>>comprar</button></a>

        </div>
    <?php endwhile; ?>

<?php else: ?>
    <h2>no hay resultados de la busqueda <?= $_POST['search'] ?> </h2>

<?php endif; ?>
