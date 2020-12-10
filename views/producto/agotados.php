<h1>Productos Agotados</h1>
<?php

if ($productos[2]->num_rows > 0):
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>precio</th>
            <th>stock</th>
            <th>Acciones</th>

        </tr>
        <?php while ($pro = $productos[2]->fetch_object()): ?>
            <tr>

                <td><?= $pro->id; ?></td>
                <td><?= $pro->nombre; ?></td>
                <td><?= $pro->precio; ?></td>
        <?php if ($pro->stock <= 0): ?>
                    <td class="alert_red">Agotado</td>
                <?php else: ?>
                    <td><?= $pro->stock; ?></td>
                <?php endif; ?>

                <td>
                    <a href="<?= base_url ?>productos/editar&id=<?= $pro->id ?>" class="button button-gestion ">editar</a>
                    <a href="<?= base_url ?>productos/eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red">eliminar</a>
                </td>

            </tr>

    <?php endwhile; ?>
    </table>

    <div class="Page navigation example ">

        <ul class="pagination  " style="top:900px;">      

    <?php for ($i = 0; $i < $productos[1]; $i++): ?>


        <?php if ($i == 0 && (isset($_GET['page'])) && ($_GET['page'] != 1)): ?>
                    <li class="page-item"><a  class="page-link" href="<?= base_url ?>productos/gestion&page=<?= ($_GET['page'] - 1) ?>"> << </a></li>
                <?php endif; ?>



                <li class="page-item"><a  class="page-link" href="<?= base_url ?>productos/gestion&page=<?= ($i + 1) ?>"><?= ($i + 1) ?></a></li>



        <?php if (($i == $productos[1] - 1 && ($_GET['page'] != $productos[1]))): ?>
                    <li class="page-item"> <a class="page-link"  href="<?= base_url ?>productos/gestion&page=<?= ($i + 1) ?>"> >> </a> </li>
                <?php endif; ?>



    <?php endfor; ?>

        </ul>
    </div>

    <?php
else:
    ?>
    <p>no hay productos agotados</p>
<?php endif; ?>
