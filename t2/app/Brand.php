<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializa cURL para hacer la petición a la API de marcas
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 271|tLoE3pd1hT9B1gtPpqsd2AgpgjbqtwbeEq9NSP1i',
    ),
));

$response = curl_exec($curl);
curl_close($curl);

// Decodifica la respuesta JSON de la API y obtiene la lista de marcas
$marcas = json_decode($response)->data ?? [];
?>
