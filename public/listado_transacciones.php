<?php
require_once __DIR__ . "/assets/template/header.php";
?>


<section id="listadoTransacciones" class="listadoTransacciones">
            
            <h1>Resumen últimas Transacciones</h1>
            <div>
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>Id Transacción</th>
                            <th>Fecha y Hora</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>2024-08-28 14:23</td>
                            <td>$500.00</td>
                            <td>Depósito</td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>2024-08-28 15:45</td>
                            <td>$200.00</td>
                            <td>Retiro</td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>2024-08-29 09:10</td>
                            <td>$1,000.00</td>
                            <td>Transferencia</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

<?php
    require_once __DIR__ . "/assets/template/footer.php";
?>