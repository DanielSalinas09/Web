<h1>detalle del pedido</h1>
<?php if (isset($pedido)): ?>
    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Cambiar el estado del pedido</h3>
        <form action="<?= base_url ?>pedidos/estado" method="POST">
            <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id">
            <select name="estado">
                <option value="confirmado" <?= $pedido->estado == 'confirm' ? 'selected' : '' ?>>pendiente</option>
                <option value="listo para enviar"  <?= $pedido->estado == 'listo para enviar' ? 'selected' : '' ?> >listo para enviar</option>
                <option value="enviado"  <?= $pedido->estado == 'enviado' ? 'selected' : '' ?> >enviado</option>

            </select>
            <input type="submit" value="cambiar de estado">
        </form>

    <?php
    endif;

    ?>
   

    <h3>  datos del envio </h3>


    Departamento: <?= $pedido->departamento ?>
    <br>
    ciudad: <?= $pedido->municipio ?>
    <br>
    direccion: <?= $pedido->direccion ?>
    <br>
    <h3>Datos del pedido:</h3>
    Estado: <?= Utils::showEstado($pedido->estado) ?>
    <br>
    Metodo de pago: <?= $pedido->MetodoPago ?>
    <br>
    Numero de Pedido: <?= $pedido->id ?>
    <br>
    Total a pagar: <?= number_format($pedido->costo) ?>
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

    <?php endwhile; ?>
    </table> 
<?php endif; ?>