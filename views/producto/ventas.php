<?php if (isset($_POST['search'])): ?>

<h1>resultados de la busqueda <?= $_POST['search'] ?></h1>

<?php else: ?>
<!--oferta--->
<div class="texto-destacado">
    <h1>Ventas</h1>
</div>


<?php endif; ?>

<?php if ($productos->num_rows != 0): ?>

    <!--contenido --->
<div class="container-product">
    
<?php while ($pro = $productos->fetch_object()): ?>
    
    <div class = "product">
        <a href="<?= base_url ?>productos/ver&id=<?= $pro->id ?>">
            <img src = "<?= base_url ?>uploads/images/<?= $pro->imagen ?>"/>
            <h2><?= $pro->nombre ?></h2>
        </a>
            <?php if ($pro->oferta != null): ?>
                <p style=" margin-top: 0px; text-decoration:line-through;" > <?= number_format($pro->precio) ?> pesos </p>

                <p style=" height: 0px;"> <?= number_format($pro->precio - ($pro->precio * ($pro->oferta / 100))) ?> pesos </p>
            <?php else: ?>
                <p><?= number_format($pro->precio) ?> pesos</p>
            <?php endif; ?>
            <a href = "<?= base_url ?>carrito/add&id=<?= $pro->id ?>"><button type="button" class="btn btn-success" <?= $pro->oferta ? 'style="margin-top: 27px;"' : "" ?>>comprar</button></a>

    </div>
<?php endwhile; ?>
</div>

<?php else: ?>
<h2>no hay resultados de la busqueda <?= $_POST['search'] ?> </h2>

<?php endif; ?>
