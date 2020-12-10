 <?php Utils::isIdentity()?>
<?php
if(isset($_SESSION['tarjet']) && $_SESSION['tarjet'] =='failed'):
?>
<span class="alert_red">error al validar su informacion</span>
<?php endif;
 Utils::deleteSession('tarjet');
?>
<form action="<?=base_url?>pedidos/MetodoPago" method="post">
    <div class="form-group">
        <label for="tarjeta" >tarjeta</label>
        <input type="text" name="tarjeta" class="form-control" required maxlength="16" />
    </div>
    <div class="form-group">
        <label for="mes">mes de expriracion</label>
        <input type="text" name="mes" class="form-control" required maxlength="2"/>
    </div>
    <div class="form-group">
        <label for="año">año de expiracion</label>
        <input type="text" name="año" class="form-control" required maxlength="2"/>
    </div>
    <div>
        <label for="CVV">CVV</label>
        <input type="text" name="CVV" class="form-control" required maxlength="4"/>
    </div>
    <div class="form-group">
        <label for="nombreTitular">Nombre del titular</label>
        <input type="text" name="nombreTitular" class="form-control" required /> 
    </div>
    
        <button type="submit" class="btn btn-primary">Confirmar pedido</button>
       
    </form>
    