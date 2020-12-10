<h1>Gestion de productos</h1>

<a href="<?=base_url?>productos/crear"><button type="button" class="btn btn-success">crear producto</button></a>


<a href="<?=base_url?>productos/agotado&page=1" > <button type="button" class="btn btn-outline-primary" style="border: 2px solid black; float: right; color: black;"> Productos Agotados (<?= $agotados->agotados ?>) </button></a>


     <?php if(isset($_SESSION['editar']) && $_SESSION['editar']=='complete'):?>    
      <strong class="alert_green">El producto se ha editado correctamente</strong>
    <?php elseif(isset($_SESSION['editar']) && $_SESSION['editar']!='complete'): ?>
        <strong class="alert_red">error al editar el producto</strong>     
         <?php Utils::deleteSession('editar') ; ?>  
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='complete'):?>    
      <strong class="alert_green">El producto se ha creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=='failed'): ?>
        <strong class="alert_red">El producto NO se ha creado correctamente</strong>     
    <?php endif;?>
        <?php Utils::deleteSession('editar') ; ?> 
        <?php Utils::deleteSession('producto') ; ?>
        
     <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='complete'):?>    
      <strong class="alert_green">El producto se ha eliminado correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=='failed'): ?>
        <strong class="alert_red">El producto no se elimino correctamente</strong>     
    <?php endif;?>
        <?php Utils::deleteSession('delete') ; ?>
        
    


<table border="1">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>precio</th>
        <th>stock</th>
        <th>Acciones</th>
        
    </tr>
    <?php 

    while ($pro = $productos[2]->fetch_object()): ?>
    <tr>
        
        <td><?=$pro->id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->precio;?></td>
        <?php if($pro->stock <= 0 ):?>
        <td class="alert_red">Agotado</td>
        <?php else:?>
        <td><?=$pro->stock;?></td>
        <?php endif;?>
        
        <td>
            <a href="<?=base_url?>productos/editar&id=<?=$pro->id?>" class="button button-gestion ">editar</a>
            <a href="<?=base_url?>productos/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">eliminar</a>
        </td>
        
    </tr>
    
    <?php endwhile; ?>
</table>
        
<div class="Page navigation example ">

    <ul class="pagination  " style="top:1031px;">      
        
<?php for ($i=0; $i < $productos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>productos/gestion&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>productos/gestion&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$productos[1]-1 &&  ($_GET['page'] !=$productos[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>productos/gestion&page=<?=($i + 1)?>"> >> </a> </li>
 <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>
