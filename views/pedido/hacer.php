<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Modificar pedido</a>
    </p>
    <h3>Direccion para el envio:</h3>
    <br/>

    <form action="<?= base_url ?>pedidos/add" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="departamento" >departamento</label>
           
            <select id="departamento" name="departamento">
            </select>
            <div class="valid-feedback">
                Bien hecho!
            </div>
            <div class="invalid-feedback">
                por favor coloque su departamento.
            </div>
        </div>
        <div class="form-group">
            <label for="ciudad">ciudad</label>
         
            <select id="ciudad" name="ciudad">
            </select>
            <div class="valid-feedback">
                Bien hecho!
            </div>
            <div class="invalid-feedback">
                por favor coloque su ciudad.
            </div>
        </div>
        <div class="form-group">
            <label for="direccion">direccion</label>
            <input type="text" name="direccion" class="form-control" required />
            <div class="valid-feedback">
                Bien hecho!
            </div>
            <div class="invalid-feedback">
                por favor coloque su direccion.
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Confirmar pedido</button>

    </form>
    <script>

        (function () {
            'use strict';
            window.addEventListener('load', function () {

                var forms = document.getElementsByClassName('needs-validation');

                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>





<?php else: ?>
    <h1>necesitas estar identificado</h1>
    <p>necesitas estar logeado en la web para realizar tu pedido</p>
<?php endif; ?>

