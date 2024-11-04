<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$marcas = json_decode($response)->data ?? [];
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
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

    .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
  }
</style>

<body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <div class="sidebar d-flex flex-column p-3 bg-dark">
    <h2 class="text-white">Sidebar</h2>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active">Home</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Dashboard</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Orders</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Products</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Customers</a>
      </li>
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

    <div class="row mt-4"></div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="app/newProduct.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" required>
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Palabras claves</label>
              <input type="text" class="form-control" id="slug" name="slug" placeholder="Palabras clave" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Descripcion</label>
              <textarea class="form-control" id="description" name="description" placeholder="Descripcion del producto"
                required></textarea>
            </div>
            <div class="mb-3">
              <label for="features" class="form-label">Caracteristicas</label>
              <textarea class="form-control" id="features" name="features" placeholder="Caracteristicas del producto"
                required></textarea>
            </div>
            <div class="mb-3">
              <label for="brandSelect" class="form-label">Marca</label>
              <select class="form-control" id="brandSelect" name="brand" required>
                <?php if (isset($marcas) && count($marcas)): ?>
                  <?php foreach ($marcas as $marca): ?>
                    <option value="<?= htmlspecialchars($marca->id) ?>">
                      <?= htmlspecialchars($marca->name) ?>
                    </option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="">No hay marcas disponibles</option>
                <?php endif; ?>
              </select>
            </div>


            <div class="mb-3">
              <label for="cover" class="form-label">Imagen</label>
              <input type="file" class="form-control" id="cover" name="cover" accept="cover/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Editar Producto -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            <input type="hidden" id="editId" name="id">
            <div class="mb-3">
              <label for="nameEdit" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nameEdit" name="name" required>
            </div>
            <div class="mb-3">
              <label for="slugEdit" class="form-label">Palabras claves</label>
              <input type="text" class="form-control" id="slugEdit" name="slug" required>
            </div>
            <div class="mb-3">
              <label for="descriptionEdit" class="form-label">Descripción</label>
              <textarea class="form-control" id="descriptionEdit" name="description" required></textarea>
            </div>
            <div class="mb-3">
              <label for="featuresEdit" class="form-label">Características</label>
              <textarea class="form-control" id="featuresEdit" name="features" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="submitEditForm()">Actualizar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      fetch('app/Products.php')
        .then(response => response.json())
        .then(data => {
          const productContainer = document.querySelector('.row.mt-4');

          data.data.forEach(product => {
            const productCard = `
                  <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                      <img src="${product.cover}" class="card-img-top" alt="${product.name}">
                      <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.slug || 'No slug available.'}</p>
                        <p class="card-text">${product.description || 'No description available.'}</p>
                        <p class="card-text">${product.features || 'No features available.'}</p>
                          <a href="product.php?id=${product.id}" class="btn btn-primary">Detalles</a>
                         <button type="button" class="btn btn-info ms-auto" onclick="openEditModal(${product.id}, '${product.name}', '${product.slug}', '${product.description}', '${product.features}')" data-bs-toggle="modal">
                            Editar
                        </button>
                          <form id="deleteForm-${product.id}" action="app/removeProduct.php" method="POST" style="display: inline;">
                              <input type="hidden" name="id" value="${product.id}">
                              <button type="button" class="btn btn-danger ms-auto" onclick="remove(${product.id})">
                                  Eliminar
                              </button>
                          </form>
                      </div>
                    </div>
                  </div>
                  `;
            productContainer.insertAdjacentHTML('beforeend', productCard);
          });
        })
        .catch(error => console.error('Error fetching products:', error));
    });

    function openEditModal(id, name, slug, description, features) {
      document.getElementById('editId').value = id;
      document.getElementById('nameEdit').value = name;
      document.getElementById('slugEdit').value = slug;
      document.getElementById('descriptionEdit').value = description;
      document.getElementById('featuresEdit').value = features;

      const editModal = new bootstrap.Modal(document.getElementById('editModal'));
      editModal.show();
    }

    function submitEditForm() {
      const id = document.getElementById('editId').value;
      const name = document.getElementById('nameEdit').value;
      const slug = document.getElementById('slugEdit').value;
      const description = document.getElementById('descriptionEdit').value;
      const features = document.getElementById('featuresEdit').value;

      const data = new URLSearchParams({
        id: id,
        name: name,
        slug: slug,
        description: description,
        features: features,
      });

      fetch(`app/updateProduct.php`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: data.toString(),
        })
        .then(response => {
          return response.text().then(text => {
            console.log('Raw response:', text);
            return JSON.parse(text);
          });
        })
        .then(data => {
          console.log('Success:', data);
          location.reload();
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    }

    function remove(id) {
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            document.getElementById(`deleteForm-${id}`).submit();
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    }
  </script>

</body>

</html>