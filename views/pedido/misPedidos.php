 <?php if($pedidos[2]->num_rows >0 ):?>

<?php if(isset($gestion)): ?>

<h1>gestionar pedidos</h1>

<?php else: ?>
<h1>historial de pedidos</h1>
<?php endif; ?>
 <table>
    <tr>
        <th>N° pedido</th>
        <th>Costo</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($ped= $pedidos[2]->fetch_object()):
  

        ?>
        
    <tr>
        <td><a href="<?=base_url?>pedidos/detalle&id=<?=$ped->id?>"><?=$ped->id?></a></td>
        <td><?= number_format($ped->costo)?></td>
        <td><?=$ped->fecha?></td>

        <td><?=Utils::showEstado($ped->estado)?></td>

    </tr>
        
    <?php endwhile; ?>

</table>

<div class="Page navigation example ">

    <ul class="pagination  " style="top:900px;">      
        
<?php for ($i=0; $i < $pedidos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>pedidos/gestion&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>pedidos/gestion&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$pedidos[1]-1 &&  ($_GET['page'] !=$pedidos[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>pedidos/gestion&page=<?=($i + 1)?>"> >> </a> </li>
 <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>

<?php else:?>
<p>no tienes historial de pedidos</p>
    <?php endif;?>