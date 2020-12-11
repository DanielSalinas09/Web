<h1>Registrar Vendedor</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register']=="complete"): ?>


<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Bien hecho!</h4>
  <strong class="alert_green">Registro Completado Correctamente</strong>
  </div>
  


<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=="failed"): ?>
<div class="alert-registro">
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error en el registro</h4>
    <strong class="alert_red">Registro Fallido, Revise los campos</strong>
  </div>
</div>



<?php endif;?>

<div class="form_container">

<?php Utils::deleteSession('register') ?>
<form action="<?=base_url?>admin/save" method="POST" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" placeholder="Nombres"  required>
    <div class="valid-feedback">
        Bien hecho!
      </div>
      <div class="invalid-feedback">
        por favor coloque su nombre.
      </div>
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required >
    <div class="valid-feedback">
        Bien hecho!
      </div>
      <div class="invalid-feedback">
        por favor coloque sus apellidos.
      </div>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" placeholder="name@example.com" required >
    <div class="valid-feedback">
        Bien hecho!
      </div>
      <div class="invalid-feedback">
        por favor coloque su email.
      </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required >
    <div class="valid-feedback">
        Bien hecho!
      </div>
      <div class="invalid-feedback">
        por favor coloque su contraseña.
      </div>
    
  </div>
    <input type="checkbox" checked="true" name="admin" style="display:none;" value="admin">
  <button type="submit" class="btn btn-primary">Registrarse</button>
    
</form>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
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
</div>