<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title> Notificación Alarma </title>

  </head>
  <body>

    <p> ¡Hola!, te informamos que se ha detectado movimiento en tu casa, precisamente en {{ $locate }} </p> <br>
    <p> Más detalles :</p> <br><br>

    <hr>

    <ul>
      <li> No Registro: {{ $id }} </li>
      <li> Ubicación: {{ $locate }} </li>
      <li> Fecha: {{ $created_at }} </li>
    </ul>

  </body>
</html>
