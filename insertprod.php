<!DOCTYPE html>
<html lang="es">

  <head>
    <link rel="stylesheet" href="estilo.css" media="screen" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Añadir producto</title>
  </head>

  <body>
    <?php
      include("lib/cabecera.html");
    ?>

    <center><div class="formfondo">
      <form action="producto.php" method="post">
        <p class="titul"><strong>Insertar Producto</strong></p>
        <p>Nombre<input type="text" placeholder="Nombre" name="nombreprod"></p>
        <p>Precio: $<input type="text" placeholder="0000.00" name="precio"></p>
        <p>Código: <input type="text" placeholder="00000000" name="codigo"></p>
        <p>Imagen: <input type="text" placeholder="imagen.jpg" name="imagen"></p>
        <p><input type="submit" value="Añadir"></p>
      </form>
    </div></center>

    <?php
      include("lib/footer.html");
    ?>
  </body>
</html>