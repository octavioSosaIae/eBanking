<?php

require_once 'app/core/validateData.php';

$validateData = new ValidateData;

$datos = [
    "nombre" => "Jorge",
    "edad" => "35",
    "correo" => "jorgeselect@gmail.com",
    "Descripcion" => "Tomas SELECT * FROM IAE"
];

echo '<pre>';
var_dump($datos);
echo '</pre>';

$sanitizeData = $validateData->sanitizeData($datos);

echo '<pre>';
var_dump($sanitizeData);
echo '</pre>';
