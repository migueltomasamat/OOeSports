<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Torneo</title>
</head>
<body>
<h1>Información del Torneo <?=$torneo->getNombre()?></h1>
<table style="border: blue solid 1px">
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>fecha</th>
        <th>premio total</th>
    </tr>
    <tbody>
        <tr>
            <td><?=$torneo->getId()?></td>
            <td><?=$torneo->getNombre()?></td>
            <td><?=$torneo->getFecha()->format('d-m-Y')?></td>
            <td><?=$torneo->getPremioTotal()?></td>
            </tr>
    </tbody>

</table>
</body>
</html>