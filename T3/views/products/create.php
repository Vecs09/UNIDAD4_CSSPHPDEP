<?php

include "../../app/config.php";

include_once "../../app/ProductsController.php";
include_once "../../app/BrandsController.php";

$brandsController = new BrandsController();

$productsController = new ProductsController();

$productos = array_reverse($productsController->get());

$marcas = $brandsController->get();



?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php" ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- [ Pre-loader ] End -->
  <?php include "../layouts/sidebar.php" ?>
  <?php include "../layouts/navbar.php" ?>

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Add New Product</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Añadir nuevo producto</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <form method="POST" action="../app/ProductsController.php" enctype="multipart/form-data">
        <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <h5>Descripcion del Producto</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" name="name" class="form-control" placeholder="Nombre del producto" />
                </div>

                <div class="mb-3">
                  <label class="form-label">Palabras clave</label>
                  <input type="text" name="slug" class="form-control" placeholder="Palabras clave (grande, chico, color, etc)" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Marca</label>
                  <select class="form-select" name="brand_id">
                    <?php if (isset($marcas) && count($marcas)): ?>
                      <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca->id ?>">
                          <?= $marca->name ?>
                        </option>
                      <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
                <div class="mb-0">
                  <label class="form-label">Descripcion</label>
                  <textarea class="form-control" name="description" placeholder="Descripcion del producto"></textarea>
                </div>

                <div class="mb-0">
                  <label class="form-label">Caracteristicas</label>
                  <textarea class="form-control" name="features" placeholder="Caracteristicas del producto"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <h5>Imagen del Producto</h5>
              </div>
              <div class="card-body">
                <div class="mb-0">
                  <input type="file" class="form-control" id="cover" name="cover" accept="cover/*" required>                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body text-end btn-page">
                  <button type="submit" class="btn btn-primary mb-0">Publicar Producto</button>
                  <button class="btn btn-outline-secondary mb-0">Cancelar</button>
                  <input type="hidden" name="action" value="crear_producto">
                </div>
              </div>
            </div>
            <!-- [ sample-page ] end -->
          </div>
      </form>
      <!-- [ Main Content ] end -->
    </div>
  </div>

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>