<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $productId = $_POST['id'];
    $url = "https://crud.jonathansoto.mx/api/products/" . $productId;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 96|pKSTT9Su8HalXfjBMfb6vtICZWDt139klNWnnaF6'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    // Opcionalmente, redirecciona o muestra un mensaje
    header("Location: ../vista.html");
}
