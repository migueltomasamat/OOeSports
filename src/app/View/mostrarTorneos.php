<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Torneos</title>
</head>
<body>
<h1>Listado de Torneos</h1>
<table style="border: blue solid 1px">
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>fecha</th>
        <th>premio total</th>
    </tr>
    <tbody>
    <?php

    foreach ($torneos as $torneo){
        echo "<tr>
            <td>".$torneo->getId()."</td>
            <td>".$torneo->getNombre()."</td>
            <td>".$torneo->getFecha()->format('d-m-Y')."</td>
            <td>".$torneo->getPremioTotal()."</td>
            </tr>";
    }
    ?>
    </tbody>

</table>
</body>
</html>