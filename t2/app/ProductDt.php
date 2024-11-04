<?php
$productId = isset($_GET['id']) ? $_GET['id'] : null;

if ($productId) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $productId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 271|tLoE3pd1hT9B1gtPpqsd2AgpgjbqtwbeEq9NSP1i'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $productData = json_decode($response, true);

    if (isset($productData['data'])) {
        $image = !empty($productData['data']['cover']) ? $productData['data']['cover'] : 'https://via.placeholder.com/150';
        $name = $productData['data']['name'];
        $description = $productData['data']['description'];
    } else {
        $image = "placeholder.jpg"; 
        $name = "Producto no encontrado";
        $description = "El producto solicitado no existe en la base de datos.";
    }
} else {
    echo "ID del producto no proporcionado.";
    exit();
}
?>
