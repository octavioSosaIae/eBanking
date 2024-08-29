<?php
require_once __DIR__ . "/assets/template/header.php";
?>


<!-- aqui inicia la pagina de transfrrencias -->
        <section id="transferencias">
            <h2>Realizar Transferencia</h2>
            <form class="transfer-form">
                <div class="form-group">
                    <label for="cuenta-origen">Cuenta Origen</label>
                    <select id="cuenta-origen" name="cuenta-origen" required>
                        <option value="">Seleccione su cuenta</option>
                        <option value="cuenta-1">Cuenta "Ahorro 1" - $xxxx</option>
                        <option value="cuenta-2">Cuenta "Ahorro 2" - $xxxx</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="cuenta-destino">Cuenta Destino</label>
                    <input type="text" id="cuenta-destino" name="cuenta-destino" placeholder="Número de cuenta destino" required>
                </div>
        
                <div class="form-group">
                    <label for="nombre-destinatario">Nombre Destinatario</label>
                    <input type="text" id="nombre-destinatario" name="nombre-destinatario" placeholder="Nombre del destinatario" required>
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
        <?php
        require_once __DIR__ . "/assets/template/footer.php";
        ?>