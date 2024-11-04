<?php


if (isset($_POST['name'], $_POST['slug'], $_POST['description'], $_POST['features']) && isset($_FILES['cover'])) {
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $features = $_POST['features'];
  $image = $_FILES['cover'];


  if ($image['error'] === UPLOAD_ERR_OK) {
    $imageTmpPath = $image['tmp_name'];
    $imageName = $image['name'];
    $imageType = $image['type'];
  } else {
    die("Error al cargar la imagen.");
  }

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
      'name' => $name,
      'slug' => $slug,
      'description' => $description,
      'features' => $features,
      'cover' => new CURLFile($imageTmpPath, $imageType, $imageName)
    ),
    CURLOPT_HTTPHEADER => array(
      'Authorization: Bearer 271|tLoE3pd1hT9B1gtPpqsd2AgpgjbqtwbeEq9NSP1i'
    ),
  ));

  $response = curl_exec($curl);
  $error = curl_error($curl);
  curl_close($curl);

  if ($error) {
    echo "cURL Error: " . $error;
  } else {
    header("Location: ../vista.php");
    exit();
  }
} else {
  echo "Error: Faltan datos en el formulario.";
}
