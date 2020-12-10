
    <h1>Discos duros mecanicos</h1>  
   <div class="saltar">
       <a href = "<?= base_url?>ArmaPc/discoDuroSolido"><button type="button" class="btn btn-success">saltar</button></a>
   </div>   
    
<?php while ($pro = $productos[2]->fetch_object()): ?>
<!--contenido --->
<div class = "product">
    <a href="<?=base_url?>productos/ver&id=<?=$pro->id?>">
        <img src = "<?=base_url?>uploads/images/<?=$pro->imagen?>"/>
        <h2><?=$pro->nombre?></h2>
    <a/>
<p> <?=number_format($pro->precio)?> pesos </p>
<a href = "<?= base_url?>ArmaPc/seleccionDDMecanico&id=<?=$pro->id?>"><button type="button" class="btn btn-success">Añadir</button></a>

</div>
<?php endwhile;?>

<div class="Page navigation example">

    <ul class="pagination">      
<?php for ($i=0; $i < $productos[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>ArmaPc/discoDuroMecanico&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>ArmaPc/discoDuroMecanico&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$pro[1]-1 &&  ($_GET['page'] !=$productos[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>ArmaPc/discoDuroMecanico&page=<?=$socket?>&page=<?=($i + 1)?>"> >> </a> </li>
    <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>





