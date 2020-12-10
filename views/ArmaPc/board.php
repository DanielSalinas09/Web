

<?php if (isset($_GET['marca'])): ?>
    <h1>Boards <?= $_GET['marca'] ?></h1>  
      
    
<?php while ($pro = $productos[2]->fetch_object()): ?>
<!--contenido --->
<div class = "product">
    <a href="<?=base_url?>productos/ver&id=<?=$pro->id?>">
        <img src = "<?=base_url?>uploads/images/<?=$pro->imagen?>"/>
        <h2><?=$pro->nombre?></h2>
    <a/>
<p> <?=number_format($pro->precio)?> pesos </p>
<a href = "<?= base_url?>ArmaPc/seleccionBoard&id=<?=$pro->id?>&socket=<?=$pro->socket?>"><button type="button" class="btn btn-success">Añadir</button></a>

</div>
<?php endwhile;?>


<?php endif; ?>


<div class="Page navigation example">

    <ul class="pagination">      
<?php for ($i=0; $i < $productos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>ArmaPc/board&marca=<?=$marca?>&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>ArmaPc/board&marca=<?=$marca?>&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$productos[1]-1 &&  ($_GET['page'] !=$productos[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>ArmaPc/board&marca=<?=$marca?>&page=<?=($i + 1)?>"> >> </a> </li>
    <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>
