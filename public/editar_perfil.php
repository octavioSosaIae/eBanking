<?php
require_once __DIR__ . "/assets/template/header.php";
?>



<section id="editar-perfil">
    <h2>Editar Perfil del Usuario</h2>
    <form class="form-style">
        <div class="form-group">
            <label for="nombre-completo">Nombre Completo</label>
            <input type="text" id="nombre-completo" name="nombre-completo" placeholder="Nombre Completo" required>
        </div>

        <div class="form-group">
            <label for="nombre-usuario">Nombre de Usuario</label>
            <input type="text" id="nombre-usuario" name="nombre-usuario" placeholder="Nombre de Usuario" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
        </div>

        <div class="form-group">
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>
</section>
<br>
<section id="restablecer-contrasena">
    <h2>Restablecer Contraseña</h2>
    <form class="form-style">
        <div class="form-group">
            <label for="contrasena-actual">Contraseña Actual</label>
            <input type="password" id="contrasena-actual" name="contrasena-actual" placeholder="Contraseña Actual" required>
        </div>

        <div class="form-group">
            <label for="nueva-contrasena">Nueva Contraseña</label>
            <input type="password" id="nueva-contrasena" name="nueva-contrasena" placeholder="Nueva Contraseña" required>
        </div>

        <div class="form-group">
            <label for="confirmar-contrasena">Confirmar Nueva Contraseña</label>
            <input type="password" id="confirmar-contrasena" name="confirmar-contrasena" placeholder="Confirmar Nueva Contraseña" required>
        </div>

        <div class="form-group">
            <button type="submit">Restablecer Contraseña</button>
        </div>
    </form>
</section>


<?php
    require_once __DIR__ . "/assets/template/footer.php";
?>