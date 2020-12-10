<aside id="lateral">
    <div id="login" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito(); ?>
            <li>
                <a href="<?= base_url ?>carrito/index"><button type="button" class="btn btn-outline-primary" >Productos (  <?= $stats['count'] ?>  )</button></a>
            </li>

            <li>
                <a href="<?= base_url ?>carrito/index" ><button type="button" class="btn btn-outline-primary" >Total  $<?= number_format($stats['total']) ?></button></a>
            </li>
            <li>
                <a href="<?= base_url ?>carrito/index"> <button type="button" class="btn btn-outline-primary" >ver carrito</button></a>
            </li>
        </ul>
    </div>

    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Login</h3>
            <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] = 'Identificacion fallida!!'): ?>
                <div class="alert-login">
                    <div class="alert alert-danger" role="alert">
                        <p class="alert_red">Error al iniciar sesión</p>
                    </div>
                </div>

                <?php
            endif;
            Utils::deleteSession("error_login");
            ?>
            <form action="<?= base_url ?>cliente/login" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="email"  >Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="valid-feedback">
                        Bien hecho!
                    </div>
                    <div class="invalid-feedback">
                        por favor verifique su Email.
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" >Password </label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="valid-feedback">
                        Bien hecho!
                    </div>
                    <div class="invalid-feedback">
                        por favor verifique su contraseña.
                    </div>
                </div>
                <div class="enviar">
                    <button class="btn btn-primary"type="submit">Enviar</button>
                </div>
                
            </form>


            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
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
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>

        <?php endif; ?>
        <ul>                      

            <?php if (isset($_SESSION['admin']) && isset($_SESSION['identity'])): ?>
                <li>
                    <a href="<?= base_url ?>categorias/index&page=1" ><button type="button" class="btn btn-outline-primary">gestionar categorias</button></a>
                </li>
                <li>
                    <a href="<?= base_url ?>productos/gestion&page=1"><button type="button" class="btn btn-outline-primary">gestionar productos</button></a>
                </li>
                <li>
                    <a href="<?= base_url ?>pedidos/gestion&page=1"><button type="button" class="btn btn-outline-primary">gestionar pedidos</button></a>
                </li> 
                
                <li>
                    <a href="<?= base_url ?>admin/destacados"> <button type="button" class="btn btn-outline-primary" >Usuarios Destacados</button></a>
                </li>
                <li>
                    <a href="<?= base_url ?>cliente/logout"><button type="button" class="btn btn-outline-primary">Cerrar sesión</button></a>
                </li>   


            <?php elseif (isset($_SESSION['identity'])): ?>
                <li><a href="<?= base_url ?>pedidos/misPedidos&page=1"><button type="button" class="btn btn-outline-primary">Mis pedidos</button></a>
                </li>
                <li>
                    <a href="<?= base_url ?>cliente/logout" ><button type="button" class="btn btn-outline-primary">Cerrar session</button></a>
                </li>

            <?php else: ?>
                <li>
                    <a href="<?= base_url ?>cliente/registro"><button type="button" class="btn btn-outline-primary">Registrate Usuario</button></a>
                </li>
                <li>
                     <a href="<?= base_url ?>admin/registroAdmin"> <button type="button" class="btn btn-outline-primary" >Registro de Vendedor</button></a>
                </li>

            <?php endif; ?>

        </ul>
    </div>
</aside>
</div>
<div id="central">


