<?php

include_once "database.php";

$db = new Database();

$resultado = $db->seleccionar("select * from post");

/*
while ($row = pg_fetch_row($resultado)) {
    echo "id: $row[0] titulo: $row[1] descripcion: $row[2]";
    echo "<br />\n";
}
*/

include_once "vistas/principal.php";

?>