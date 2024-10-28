<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['usuario'];
    $password = $_POST['contrasena'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;

    

    $result = json_decode($response, true);

    if ($result['code'] === 2) {
        $_SESSION['data']= $result;
        header('Location: vista.html'); 
    } else {
        echo '<script>alert("Usuario o contraseña incorrectos. Intente de nuevo.");</script>';
        echo '<script>window.history.back();</script>'; 
    }
} else {
    header('Location: vista.html'); 
    exit();
}