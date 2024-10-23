<?php
var_dump($_POST);
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'login':
            $email = $_POST["email"];
            $password = $_POST["password"];

            $controller = new Controller;
            $controller->access($email, $password);
            break;
    }
}

class Controller {
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
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->data) && is_object($response->data)) {
            header("Location: vista.html");
        } else {
            header("Location: login.html");
        }
    }
}
?>
