<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .sidebar {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding-top: 20px;
        width: 200px;
    }

    .sidebar a {
        color: #000000;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #d7d6ec;
    }

    .main-content {
        margin-left: 200px;
        padding: 20px;
    }

    @media (max-width: 992px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }
    }
</style>

<body>
    <?php include 'app/ProductDt.php'; ?>

    <div class="sidebar d-flex flex-column p-3 bg-dark">
        <h2 class="text-white">Sidebar</h2>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
            <li><a href="#" class="nav-link text-white">Dashboard</a></li>
            <li><a href="#" class="nav-link text-white">Orders</a></li>
            <li><a href="#" class="nav-link text-white">Products</a></li>
            <li><a href="#" class="nav-link text-white">Customers</a></li>
        </ul>
    </div>

     <div class="main-content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar scroll</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>

          <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Añadir
          </button>

          <form class="d-flex ms-3">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="main-content">
        <div class="container mt-5">
            <div class="card">
                <img src="<?php echo htmlspecialchars($image); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($name); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($name); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($description); ?></p>
                    <a href="vista.php" class="btn btn-primary">Volver a productos</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
