<?php
require_once __DIR__ . "/assets/template/header.php";
?>


<!-- aqui inicia la pagina de transfrrencias -->
<section id="transferencias">
    <h2>Realizar Transferencia</h2>
    <form class="form-style" id="newTransfer">
        <div class="form-group">
            <label for="cuenta-origen">Cuenta Origen</label>
            <select id="cuenta-origen" name="cuenta-origen" required>
                <option value="">Seleccione su cuenta</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cuenta-destino">Cuenta Destino</label>
            <input type="text" id="cuenta-destino" name="cuenta-destino" placeholder="Número de cuenta destino"
                required>
        </div>

        <div class="form-group">
            <label for="nombre-destinatario">Nombre Destinatario</label>
            <input type="text" id="nombre-destinatario" name="nombre-destinatario" placeholder="Nombre del destinatario" readonly>
        </div>

        <div class="form-group">
            <label for="email-destinatario">Descripcion:</label>
            <input type="descripcion" id="descripcion" name="descripcion" placeholder="Descripcion" required>
        </div>

        <div class="form-group">
            <button type="submit">Enviar Transferencia</button>
        </div>
    </form>
</section>

<script src="assets/js/transfer.js"></script>

<?php
require_once __DIR__ . "/assets/template/footer.php";
?>