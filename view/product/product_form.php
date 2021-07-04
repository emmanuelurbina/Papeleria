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
        Producto
      </h2>
      <form class="form" action="?controller=product&action=save" method="post">
        <input type="hidden" id="id" name="id" value="<?= $product->id ?>">
        <div class="group__form">
          <label for="sku" aria-label="descripcion del producto">SKU (Identificador)</label>
          <input type="text" id="sku" name="sku" title="Caja para registrar SKU" autofocus autocomplete="off" value="<?= $product->sku ?>" required>
        </div>
        <div class="group__form">
          <label for="name" aria-label="nombre del producto">Nombre</label>
          <input type="text" id="name" name="name" title="Caja para registrar nombre" autocomplete="off" value="<?= $product->name ?>" required>
        </div>

        <div class="group__form">
          <label for="description" aria-label="descripcion del producto">Descripción</label>
          <input type="text" id="description" name="description" title="Caja para registrar descripcion" autocomplete="off" value="<?= $product->description ?>" required>
        </div>

        <div class="group__form">
          <label for="price" aria-label="Precio del producto">Precio</label>
          <input type="number" step="any" min="0" id="price" name="price" title="Caja para registrar precio" value="<?= $product->price > 0? $product->price:0 ?>" autocomplete="off">
        </div>
        <?php
          if(isset($_REQUEST["message"])) {
            echo "Guardado";
          }
        ?>
        <button type="submit" class="btn btn-primary" title='Boton guardar'>Guardar</button>
      </form>
    </article>
  </section>
</body>

</html>