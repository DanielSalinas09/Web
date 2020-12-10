<h1>Gestionar categorias</h1>


<div class="crear-gestion">
    <a href="<?=base_url?>categorias/crear"><button type="button" class="btn btn-success">crear categoria </button></a>
</div>

    

<table border="1">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        
    </tr>
    <?php while($cat = $categorias[2]->fetch_object()):?>
    <tr>
        
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
        
    </tr>
    
    <?php endwhile; ?>
</table>

<div class="Page navigation example ">

    <ul class="pagination  " style="top:900px;">      
        
<?php for ($i=0; $i < $categorias[1]; $i++): ?>

           
    <?php if($i==0 && (isset($_GET['page'])) && ($_GET['page'] !=1)): ?>
        <li class="page-item"><a  class="page-link" href="<?=base_url?>categorias/index&page=<?=($_GET['page'] - 1)?>"> << </a></li>
    <?php endif;?>
        
        
        
<li class="page-item"><a  class="page-link" href="<?=base_url?>categorias/index&page=<?=($i + 1)?>"><?=($i + 1)?></a></li>



 <?php if(($i==$categorias[1]-1 &&  ($_GET['page'] !=$categorias[1]))): ?>
      <li class="page-item"> <a class="page-link"  href="<?=base_url?>categorias/index&page=<?=($i + 1)?>"> >> </a> </li>
 <?php endif;?>



<?php endfor;?>
       
    </ul>
 </div>
