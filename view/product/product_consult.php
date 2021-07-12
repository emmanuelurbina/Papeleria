<!DOCTYPE html>
<html lang="es-mx">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
  <section class="main">
    <article class="main__form">
      <h2 class="form__title">
        Consulta Productos
      </h2>
      <form class="form" action="?controller=product&action=search_product" method="post">
        <div class="group__form">
          <label for="sku" aria-label="SKU del producto">Codigo SKU</label>
          <input type="text" id="sku" name="sku" title="" required>
        </div>
        <button class="btn btn-primary">Buscar</button>
      </form>
    </article>
    <?php if (isset($response)) : ?>

      <?php if ($response) : ?>
        <article class="product_detail">
          <div class="card">
            <div class="card__content">
              Nombre: <a href="?controller=product&action=show&id=<?= $response->id ?>"><?= $response->name ?></a>
              <br>
              Precio: $ <?= round($response->price, 2) ?>
            </div>
          </div>
        </article>
      <?php endif; ?>

      <?php if (!$response) : ?>
        <div class="card">
          <div class="card__content">
            <h5>SKU [# <?= $sku ?> ] no existe</h5>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>
</body>

</html>