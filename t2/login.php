<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: white;
        }

        .almacen {
            background-color: white;
        }

        .image {
            height: 200px;
            width: 200px;
        }
    </style>
</head>

<body>
    <?php
    include 'app/config.php';
    $token = generateCsrfToken();
    ?>
    <div class="container">
        <div class="almacen row shadow m-5 justify-content-center ">
            <div class="col-5 col-xs-4">
                <img src="fondo.jpg" class="rounded mx-auto d-block img-fluid m-5" alt="...">
            </div>
            <div class="col-5 col-xs-8">
                <img src="logo.jpg" class="image rounded mx-auto d-block" alt="...">
                <form method="POST" action="app/AuthController.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                    <input type="hidden" value="login" name="action">
                    <input type="hidden" name="global_token" value="<?php echo $token; ?>">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>