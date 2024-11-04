<?php
session_start();
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    if (!validateCsrfToken($_POST['global_token'])) {
        die("Petición no válida. Token CSRF no coincide.");
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $controller = new AuthController();
    $controller->access($email, $password);
}

class AuthController {
    public function access($email, $password) {
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
            CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Error en CURL: ' . curl_error($curl);
            curl_close($curl);
            return;
        }

        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->data) && is_object($response->data)) {
            $_SESSION['user_data'] = $response->data;
            header("Location: /GitHub/UNIDAD4_CSSPHPDEP/t2/vista.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    }
}
?>
