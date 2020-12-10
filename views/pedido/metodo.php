<?php if(isset($_SESSION['identity'])):?>
<form action="<?=base_url?>pedidos/MetodoPago" method="post">

  

        <select name="metodo" class="form-control">
        <option value="contra entrega">contra entrega</option>
        <option value="pago online">Pago Online</option>
        </select>


        
        
        <button type="submit" class="btn btn-primary">Confirmar pedidos</button>
       
    </form>


<?php else: ?>
    <h1>necesitas estar identificado</h1>
    <p>necesitas estar logeado en la web para realizar tu pedido</p>
<?php endif; ?>


