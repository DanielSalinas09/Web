
<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido ha sido Confirmado</h1>
<div class=" pedido alert alert-success" >
    <p>tu pedido ha sido guardado con exito   </p>
</div>
    

    <br>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido:</h3>

        Numero de Pedido: <?= $pedido->id ?>
        <br>
        Total a pagar: <?= number_format($pedido->costo) ?>
        <br>
        Metodo de pago: <?= $pedido->MetodoPago ?>
        <br>
        Productos: 
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()): ?>

                <tr>
                    <td><img src = "<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/></td>
                    <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a></td>
                    <td>$<?= number_format($producto->precio); ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>





                <!--    
                    <ul>
                        <li>
                            //<?= $producto->nombre ?> - $<?= number_format($producto->precio) ?> - x<?= $producto->unidades ?>
                        </li>
                    </ul>-->
            <?php endwhile; ?>
        </table> 
    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'failed'): $i = 0; ?>
    <h1>Lista de errores</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">numero error</th>
                <th scope="co5">Descripcion</th>
            </tr>
        </thead>
        <?php
        while (!empty($_SESSION['pedido'][$i])):
            $err = $_SESSION['pedido'][$i];
            ?>
            <tr>
                <th><?= $i+1 ?></td> 
                <td><?= $err ?></td>
            </tr>
            <?php $i++;
        endwhile;
        ?>

    </table>
    <a href="http://localhost/proyecto-poo/carrito/index"> <button type="button" class="btn btn-outline-primary">Volver al carrito </button></a>
<?php else: ?>
    <p>Tu pedido no ha podido procesarse </p>
<?php endif; ?>
