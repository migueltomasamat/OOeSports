<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Creación de un torneo</title>
</head>
<body>
<h1>Creación de un torneo</h1>
<form action="/torneo" method="post">
    <label for="inputNombre">Nombre del torneo</label>
    <input type="text" name="nombre" id="inputNombre">
    <label for="inputFecha">Fecha del torneo</label>
    <input type="date" name="fecha" id="inputFecha">
    <label for="inputPremio">Premio del torneo</label>
    <input type="number" name="premio_total" step="0.01" id="inputPremio">

    <input type="submit">


</form>
</body>
</html>