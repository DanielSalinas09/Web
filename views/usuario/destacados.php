
<h1>Usuarios Destacados</h1>

<h5>clientes Frecuentes</h5>

<table>
    <th>id</th>
    <th>nombre</th>
    <th>email</th>
    <th>numero de compras</th>

    <?php while ($des = $destacados['compradoresFrecuentes']->fetch_object()): ?>
        <tr>
            <td><?= $des->id ?></td>
            <td><?= $des->nombre . " " . $des->apellidos ?></td>
            <td><?= $des->email ?></td>
            <td><?= $des->compras ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<br>

<h5>Mayor compra</h5>


<table>
    <th>id</th>
    <th>nombre</th>
    <th>email</th>
    <th>valor de compra</th>

    <?php while ($des = $destacados['mayorPedido']->fetch_object()): ?>
        <tr>
            <td><?= $des->id ?></td>
            <td><?= $des->nombre . " " . $des->apellidos ?></td>
            <td><?= $des->email ?></td>
            <td><?= number_format($des->mayorCompra) ?></td>
        </tr>
    <?php endwhile; ?>
</table>