<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$curl = curl_init();

$data = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'slug' => $_POST['slug'],
    'description' => $_POST['description'],
    'features' => $_POST['features'],
];

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => http_build_query($data), 
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Bearer 96|pKSTT9Su8HalXfjBMfb6vtICZWDt139klNWnnaF6'
    ),
));

$response = curl_exec($curl);
if(curl_errno($curl)) {
    echo json_encode(['success' => false, 'message' => 'Curl error: ' . curl_error($curl)]);
    exit;
}

curl_close($curl);

$responseData = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Error en la respuesta de la API', 'response' => $response]);
} else {
    echo json_encode(['success' => true, 'data' => $responseData]);
}
?>
