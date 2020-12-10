<h1>carrito </h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>

        </tr>
        <?php
        foreach ($carrito as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>

            <tr>
                <td><img src = "<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/></td>
                <td><a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a></td>
                <td>$<?= number_format($producto->precio); ?></td>


                <td style="text-align: center;">


                    <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="down-unidades " >-</a>
                    <?= $elemento['unidades']; ?>
                   <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="up-unidades ">+</a>
                </td>



                <td> 
                     <a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>"><button type="button" class="btn btn-danger">eliminar producto</button></a> 
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/delete_all"><button type="button" class="btn btn-danger">vaciar carrito</button></a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h4>Precio Total $<?= number_format($stats['total']) ?></h4>

        <a href="<?= base_url ?>pedidos/metodo"><button type="button" class="btn btn-success">hacer pedido</button></a>

    </div>
<?php else: ?>
    <div class="vacio">
        <p>
            El carrito esta vacio, añade un producto
        </p> 
    </div>
    
<?php endif; ?>
