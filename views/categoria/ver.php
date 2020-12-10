<?php if (isset($_GET['id'])): $id=$_GET['id']?>
    <h1><?= $categoria->nombre ?></h1>  
    <?php if ($productos[2]->num_rows == 0): ?>
        <div class="vacio">
            <p>
            No hay productos para mostrar
            </p>
        </div>
        
        
    <?php else: ?>
        <?php while ($pro = $productos[2]->fetch_object()): ?>
            <div class = "product">
                <a href="<?= base_url ?>productos/ver&id=<?= $pro->id ?>">
                <img src = "<?= base_url ?>uploads/images/<?= $pro->imagen ?>"/>
                </a>
                <h2><?= $pro->nombre ?></h2>
                <?php if($pro->oferta != null):?>
            <p style=" margin-top: -5px; text-decoration:line-through;" > <?= number_format($pro->precio) ?> pesos </p>
              
            <p style=" height: 0px;margin-top: -17px;"><?=  number_format($pro->precio - ($pro->precio * ($pro->oferta/100)))?> pesos </p>
            <?php else:?>
            <p><?=  number_format($pro->precio)?> pesos</p>
            <?php endif;?>
                <div class="alert_red" style="height: 0px;margin-top: -10px;margin-bottom: 6px;"> <?=($pro->stock)<=0 ?"agotado":""?></div>
                <a href = "<?= base_url?>carrito/add&id=<?=$pro->id?>"><button type="button" class="btn btn-success" <?= $pro->oferta ? 'style="margin-top: 32px;"' :"" ?>>comprar</button></a>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>la categoria no existes</h1>
<?php endif;?>

    
    
    
    
    
    
    
<div class="Page navigation example">

    <ul class="pagination">      
<?php for ($i=0; $i < $productos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$productos[1]-1 &&  ($_GET['page'] !=$productos[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>categorias/ver&id=<?=$id?>&page=<?=($i + 1)?>"> >> </a> </li>
    <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>