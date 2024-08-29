<?php
require_once __DIR__ . "/assets/template/header.php";
?>



<section id="listado-cuentas">
    <h2>Listado de Cuentas</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Titular</th>
                <th>Número de Cuenta</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Pérez</td>
                <td>1234-5678-9012</td>
                <td>$10,000.00</td>
            </tr>
            <tr>
                <td>María García</td>
                <td>9876-5432-1098</td>
                <td>$5,500.00</td>
            </tr>
            <tr>
                <td>Carlos López</td>
                <td>1122-3344-5566</td>
                <td>$3,250.00</td>
            </tr>
        </tbody>
    </table>
</section>

<?php
    require_once __DIR__ . "/assets/template/footer.php";
?>