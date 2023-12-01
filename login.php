<!DOCTYPE html>
<html lang="es">

  <head>
      <meta charset="UTF-8">
      <title>Iniciar Sesión</title>
      <link rel="stylesheet" href="estilo.css">
  </head>

  <body>
    <?php
      include("lib/cabecera.html");
    ?>

    <center><div class="formfondo">
      <p class="titul"><strong>Iniciar Sesión</strong></p>
      <form action="validar.php" method="post">
        <label>Email <input type="text" placeholder="Email" name="correo"></label>
        <label>Contraseña <input type="password" placeholder="Contraseña" name="contra"></label>
        <p><input type="submit" value="Ingresar"></p>
        <p><a  href="add.html"><input type="button" value="Registrarse"></a></p>
      </form>
    </div></center>

    <?php
      include("lib/footer.html");
    ?>
  </body>
</html>