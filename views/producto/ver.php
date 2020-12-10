<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>  


    <div class="detail-product">
        <div id="image">
            <img src = "<?= base_url ?>uploads/images/<?= $product->imagen ?>"/>
            
            </div>
            
            <div id="data">
                <p class="description"><?= $product->descripcion ?></p>
                <?php if($product->stock>0):?>
                <p>Unidades Disponibles: 
                     <?=$product->stock?></p>
                <?php else:?>
                
                <h3 class="alert_red">Producto agotado</h3>
                <?php endif;?>
               <?php if($product->oferta != null):?>
                <p style="text-decoration:line-through;" > <?= number_format($product->precio) ?> pesos </p>
              
            <p><?=  number_format($product->precio - ($product->precio * ($product->oferta/100)))?> pesos </p>
            <?php else:?>
            <p><?=  number_format($product->precio)?> pesos</p>
            <?php endif;?>
                <a href = "<?= base_url?>carrito/add&id=<?=$product->id?>" class = "button">comprar</a>
            </div>




        </div>



    <?php else: ?>
        <h1>el producto no existe no existes</h1>
    <?php endif; ?>


