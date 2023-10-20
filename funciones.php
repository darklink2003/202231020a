<?php

/**
 * Esta fucnion ConsultarPersona de encarga de consultar y mostra las personas 
 * de una base de datos.
 * @return $texto los datos de las personas de una base de datos.
 * @param $into un numero de identificar de la persona.
 */
function consultar($u=null)
{
    $salida = ""; //inicializa la variable
    $conexion = mysqli_connect('localhost', 'root', '', 'aa'); //establece la conexion
    $sql = "SELECT * FROM productos"; //ejecuta el sql
    $resultado = mysqli_query($conexion, $sql);

    if ($u!=null) $sql .=" WHERE id='$u'";
    $resultado=$conexion->query($sql);


    while ($fila = mysqli_fetch_assoc($resultado)) { //muestra la base de datos 
        $salida .= $fila['id'] . " |"; //llama a la fila id
        $salida .= $fila['nombre'] . " |"; //llama a la fila nombre
        $salida .= $fila['clave'] . " |"; //llama a la fila clave
        $salida .= $fila['sitio'] . " |"; //llama a la fila sitio
        $salida .= $fila['invitacion'] . " |"; //llama a la fila invitacion
    }
    mysqli_close($conexion); //cierra la conexion 
    return $salida; //retorna la variable 
}


?>