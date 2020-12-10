<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>

    <h1>Editar producto <?=$pro->nombre;?></h1>
    
        <?php $url_action= base_url."productos/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>crear nuevo producto</h1>
  <?php $url_action= base_url."productos/save"; ?>
<?php endif; ?>


<div class="form_container">

    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre:'';?>" class="form-control"  >
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <textarea name='descripcion' class="form-control"><?=isset($pro) && is_object($pro) ? $pro->descripcion:'';?></textarea>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" name="precio" required value="<?=isset($pro) && is_object($pro) ? $pro->precio:'';?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock:'';?>" class="form-control">
    </div>

        <label for="categoria">categoria</label>
        <?php
        $categorias = Utils::showCategorias();
        ?>
        <select name="categoria" class="form-control form-control-sm">
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id==$pro->categoria_id ? 'selected':'';?> >
                    <?= $cat->nombre ?>
                </option>                

            <?php endwhile; ?>  
        </select>

            <div class="form-group">
                <label for="nombre">Imagen</label>
                <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
                <?Php endif;?>
               <input type="file" name="imagen" class="form-control-file">
            </div>
    
        
        
            <label>elije la marca del componente</label>
            <select name="marca" class="form-control form-control-sm">
                <option value="AMD">AMD</option>
                <option value="Intel">Intel</option>
                <option value="NULL">no aplica</option>
            </select>
            
            <label>elije el socket del componente</label>
            <select name="socket" class="form-control form-control-sm">
                <option value="DDR4">DDR4</option>
                <option value="DDR3">DDR3</option>
                <option value="NULL">no aplica</option>
            </select>           
            <?php if($url_action != base_url."productos/save"):?>
            agregar oferta <input type="checkbox" name="oferta" id="oferta"/>
            <br>
                    <div id="inputOferta"></div>
                             
            <?php endif;  ?>
            
                
            
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
