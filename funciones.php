<?php
// Esta función se llama consultar y se encarga de consultar y mostrar las personas de una base de datos.
//
// @return $texto los datos de las personas de una base de datos.
// @param $into un numero de identificar de la persona.


function consultar($u = null, $c = null)
{
    // Declaramos una variable para almacenar la salida de la función.
    $salida = "";
    // Realizamos la conexión a la base de datos.
    $conexion = mysqli_connect('localhost', 'root', '', 'aa');

    // Creamos la consulta SQL para seleccionar todos los registros de la tabla `productos`.
    $sql = "SELECT * FROM productos";

    // Si se ha proporcionado un identificador de persona, lo agregamos a la consulta SQL.
    if ($u != null) {
        $sql .= " WHERE id = $u";
    }

    // Si se ha proporcionado una clave de persona, lo agregamos a la consulta SQL.
    if ($c != null) {
        $sql .= " AND clave = $c";
    }

    // Ejecutamos la consulta SQL y almacenamos el resultado en una variable.
    $resultado = mysqli_query($conexion, $sql);

    // Si la consulta devuelve algún resultado, lo recorremos y almacenamos los datos de cada persona en la variable `salida`.
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= $fila['id'] . " |"; //muestra la fila id
            $salida .= $fila['nombre'] . " |"; //muestra la fila nombre
            $salida .= $fila['clave'] . " |"; //muestra la fila clave
            $salida .= $fila['sitio'] . " |"; //muestra la fila sitio
            $salida .= $fila['invitacion'] . " |"; //muestra la fila invitacion
        }
    }
    else {
        $salida ="eres un error";
    }

    // Cerramos la conexión a la base de datos.
    mysqli_close($conexion);

    // Devolvemos la variable `salida`.
    return $salida;
}


?>